<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $settings;

    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'password',
        'type',
        'request_type',
        'avatar',
        'lat',
        'lng',
        'commercial_registration_no',
        'tax_number',
        'insurance_number',
        'lang',
        'plan',
        'number_of_employees',
        'user_status',
        'company_slate_readed',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function currentLanguage()
    {
        return $this->lang;
    }

    public function creatorId()
    {
        if($this->type == 'company' || $this->type == 'super admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        }
    }


    public function employeeIdFormat($number)
    {
        $settings = Utility::settings();

        return $settings["employee_prefix"] . sprintf("%05d", $number);
    }

    public function getBranch($branch_id)
    {
        $branch = Branch::where('id', '=', $branch_id)->first();

        return $branch;
    }

    public function getLeaveType($leave_type)
    {
        $leavetype = LeaveType::where('id', '=', $leave_type)->first();

        return $leavetype;
    }

    public function getEmployee($employee)
    {
        $employee = Employee::where('id', '=', $employee)->first();

        return $employee;
    }

    public function getDepartment($department_id)
    {
        $department = Department::where('id', '=', $department_id)->first();

        return $department;
    }

    public function getDesignation($designation_id)
    {
        $designation = Designation::where('id', '=', $designation_id)->first();

        return $designation;
    }

    public function getUser($user)
    {
        $user = User::where('id', '=', $user)->first();

        return $user;
    }

    public function userEmployee()
    {

        $userEmployee = User::select('id')->where('created_by', '=', Auth::user()->creatorId())->where('type', '=', 'employee')->get();

        return $userEmployee;
    }

    public function getUSerEmployee($id)
    {
        $employee = Employee::where('user_id', '=', $id)->first();

        return $employee;
    }

    public function priceFormat($price)
    {
        $settings = Utility::settings();
        return (($settings['site_currency_symbol_position'] == "pre") ? $settings['site_currency_symbol'] : '') .'  '.number_format($price, 2) . (($settings['site_currency_symbol_position'] == "post") ? $settings['site_currency_symbol'] : '');
    }

    public function currencySymbol()
    {
        $settings = Utility::settings();

        return $settings['site_currency_symbol'];
    }

    public function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }

    public function timeFormat($time)
    {
        $settings = Utility::settings();

        return date($settings['site_time_format'], strtotime($time));
    }

    public function getPlan()
    {
        return $this->belongsTo(Plan::class,   'plan');
    }


    public function assignPlan($planID)
    {
        $plan = Plan::find($planID);
        if($plan)
        {
            $this->plan = $plan->id;
            if($plan->duration == 'month')
            {
                $this->plan_expire_date = Carbon::now()->addMonths(1)->isoFormat('YYYY-MM-DD');
            }
            elseif($plan->duration == 'year')
            {
                $this->plan_expire_date = Carbon::now()->addYears(1)->isoFormat('YYYY-MM-DD');
            }
            else
            {
                $this->plan_expire_date = null;
            }
            $this->save();

            $users     = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '!=', 'super admin')->where('type', '!=', 'company')->where('type', '!=', 'employee')->get();
            $employees = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', 'employee')->get();

            if($plan->max_users == -1)
            {
                foreach($users as $user)
                {
                    $user->is_active = 1;
                    $user->save();
                }
            }
            else
            {
                $userCount = 0;
                foreach($users as $user)
                {
                    $userCount++;
                    if($userCount <= $plan->max_users)
                    {
                        $user->is_active = 1;
                        $user->save();
                    }
                    else
                    {
                        $user->is_active = 0;
                        $user->save();
                    }
                }
            }

            if($plan->max_employees == -1)
            {
                foreach($employees as $employee)
                {
                    $employee->is_active = 1;
                    $employee->save();
                }
            }
            else
            {

                $employeeCount = 0;
                foreach($employees as $employee)
                {
                    $employeeCount++;
                    if($employeeCount <= $plan->max_employees)
                    {
                        $employee->is_active = 1;
                        $employee->save();
                    }
                    else
                    {
                        $employee->is_active = 0;
                        $employee->save();
                    }
                }
            }

            return ['is_success' => true];
        }
        else
        {
            return [
                'is_success' => false,
                'error' => 'Plan is deleted.',
            ];
        }
    }

    public function countUsers()
    {
        return User::where('type', '!=', 'super admin')->where('type', '!=', 'company')->where('type', '!=', 'employee')->where('created_by', '=', $this->creatorId())->count();
    }

    public function countEmployees()
    {
        return Employee::where('created_by', '=', $this->creatorId())->count();
    }

    public function countCompany()
    {
        return User::where('type', '=', 'company')->where('created_by', '=', $this->creatorId())->count();
    }

    public function countOrder()
    {
        return Order::count();
    }

    public function countplan()
    {
        return Plan::count();
    }

    public function countPaidCompany()
    {
        return User::where('type', '=', 'company')->whereNotIn('plan', [0,1,])->where('created_by', '=', \Auth::user()->id)->count();
    }

    public function planPrice()
    {
        $user = \Auth::user();
        if($user->type == 'super admin')
        {
            $userId = $user->id;
        }
        else
        {
            $userId = $user->created_by;
        }

        return \DB::table('settings')->where('created_by', '=', $userId)->get()->pluck('value', 'name');
    }

    public function currentPlan()
    {
        return $this->hasOne('App\Models\Plan', 'id', 'plan');
    }

    public function unread()
    {
        return Message::where('from', '=', $this->id)->where('is_read', '=', 0)->count();
    }

    public function employee()
    {
        return $this->hasOne('App\Models\Employee', 'user_id', 'id');
    }

    public function fcm() {
        return $this->hasOne(FCMToken::class, 'employee_id');
    }

    public static function findByLoginID($loginId, $with = [])
    {
        return self::with($with)->where('email', $loginId)->first();
    }

    public static function findByDeviceID($deviceId)
    {
        return self::where('device_id', $deviceId)->first();
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
