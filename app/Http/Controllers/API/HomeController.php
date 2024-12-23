<?php

namespace App\Http\Controllers\ApI;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\SettingResource;
use App\Http\Resources\CompanyStructureResource;
use App\Models\CompanyStructureEmployee;
use App\Models\CompanyStructure;
use App\Models\Employee;
use App\Models\User;
use App\Models\Plan;
use App\Models\Utility;
use App\Models\Salary_setting;
use App\Models\AttendanceEmployee;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;
use Validator;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Api\V1\Employee
 */
class HomeController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $employee = Employee::where('user_id',auth()->id())->first();

        $companySetting     = company_setting()->toArray(request());
        $start_from         = \Carbon\carbon::parse($companySetting['start_time'])->subMinutes($companySetting['grace_period_before'])->format('H:i');
        $start_to           = \Carbon\carbon::parse($companySetting['start_time'])->addMinutes($companySetting['grace_period'])->format('H:i');
        $endTime            = \Carbon\carbon::parse($companySetting['end_time'])->format('H:i');
        $currentTime        = \Carbon\carbon::now()->format('H:i');
        $dailyAttendance    = AttendanceEmployee::where('employee_id', auth()->user()->employee->id)->whereDate('date',\Carbon\carbon::today())->first();
        $setting            = Salary_setting::where('created_by',\Auth::user()->creatorId())->first() ?? [];
        $workdaysArr        = explode(',',$setting->week_vacations);
        $todayName          = Carbon::today()->format('l');
        $holidays           = [];
        $employeevacation   = [];
        $attendStatus       = 0;

        $check = false;
        if(in_array($todayName,$workdaysArr)){
            $attendStatus = 7;
        }elseif(in_array(date('Y-m-d'),$holidays)){
            $attendStatus = 8;
        }elseif($employeevacation){
            $attendStatus = 6;
        }elseif(!$dailyAttendance && $currentTime < $start_from){
            $attendStatus = 0;
        }elseif(!$dailyAttendance && $currentTime >= $start_from && $currentTime <= $start_to){
            $attendStatus = 1;
        }elseif(!$dailyAttendance && $currentTime > $start_to){
            $attendStatus = 2;
        }elseif(!$dailyAttendance && $currentTime >= $endTime){
            $attendStatus = 5;
        }elseif($dailyAttendance && $dailyAttendance->clock_in && !$dailyAttendance->clock_out && $currentTime < $endTime){
            $attendStatus = 3;
        }elseif($dailyAttendance && $dailyAttendance->clock_in && !$dailyAttendance->clock_out && $currentTime >= $endTime){
            $attendStatus = 4;
            $check        = true;
        }elseif(!$dailyAttendance && $currentTime > $endTime){
            $attendStatus = 5;
        }elseif($dailyAttendance && $dailyAttendance->clock_in && $dailyAttendance->clock_out){
            if($dailyAttendance->date == date('Y-m-d')){
                $attendStatus = 5;
                $check        = true;
            }
        }

        return $this->success([
            'delay_count'                        => $employee->sumDateWithSecondes(),
            'vacation_count'                     => 0,
            'attend_count'                       => $employee->workdays($employee->id),
            'absent_count'                       => $employee->absenceCount()->count(),
            'pending_permission_requests_count'  => 0,
            'accepted_permission_requests_count' => 0,
            'refused_permission_requests_count'  => 0,
            'recent_activity'                    => [],
            'attend_start_time'                  => $start_from,
            'attend_end_time'                    => $endTime,
            'attend_status'                      => $attendStatus,
            'attend_mechanism'                   => 1
        ], '');
    }

    public function tree($id)
    {
        $segment           = null;
        $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
        $parentTree        = CompanyStructure::where('id',$id)->first();
        $structure_tree    = CompanyStructure::with('children')->where('parent',$id)->where('created_by', '=', \Auth::user()->creatorId())->get();
        $CompanyStructures = CompanyStructureResource::collection($structure_tree);
        return $this->success($CompanyStructures,'');
    }

    public function create_request(Request $request){
        request()->validate([
            'name'                => 'required',
            'company_name'        => 'required',
            'number_of_employees' => 'required',
            'email'               => 'required|email|unique:users',
            'phone'               => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'password'            => 'required|min:6'
        ]);

        $user = User::create(
        [
            'name'                => $request['name'],
            'company_name'        => $request['company_name'],
            'phone'               => $request['phone'],
            'number_of_employees' => $request['number_of_employees'],
            'email'               => $request['email'],
            'password'            => Hash::make($request['password']),
            'type'                => 'company',
            'request_type'        => 'request',
            'plan'                => $plan = Plan::where('price', '<=', 0)->first()->id,
            'lang'                => !empty($default_language) ? $default_language->value : '',
            'created_by'          => 1,
        ]);

        $user->assignRole('Company');

        $input               = $request->all();
        $input['created_by'] = $user->id;
        Salary_setting::create($input);

        Utility::jobStage($user->id);
        $role_r = Role::findById(2);

        return $this->success('','Your Demo Request Received Successfully');
    }
}
