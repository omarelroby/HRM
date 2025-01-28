<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
    protected $guarded = ['id'];

    // protected $fillable = [
    //     'user_id',
    //     'sync_attendance_employee_id',
    //     'name',
    //     'name_ar',
    //     'dob',
    //     'nationality_id',
    //     'gender',
    //     'phone',
    //     'email',
    //     'password',
    //     'employee_id',
    //     'department_id',
    //     'designation_id',
    //     'company_doj',
    //     'documents',
    //     'tax_payer_id',
    //     'salary_type',
    //     'nationality_type',
    //     'social_status',
    //     'commencement_date',
    //     'contract_number',
    //     'driving_license',
    //     'driving_license_number',
    //     'religion',
    //     'out_of_saudia',
    //     'employer_phone',
    //     'residence_number',
    //     'place_of_issuance_of_ID_residence',
    //     'iqama_issuance_date_Hijri',
    //     'iqama_issuance_date_gregorian',
    //     'iqama_issuance_expirydate_Hijri',
    //     'iqama_issuance_expirydate_gregorian',
    //     'iqama_attachment',
    //     'passport_number',
    //     'place_of_issuance_of_passport',
    //     'passport_issuance_date_gregorian',
    //     'passport_issuance_expirydate_gregorian',
    //     'passport_attachment',
    //     'building_number',
    //     'street_name',
    //     'region',
    //     'city',
    //     'country',
    //     'postal_code',
    //     'address',
    //     'mother_city',
    //     'mother_country',
    //     'emergency_contact_name',
    //     'emergency_contact_relationship',
    //     'emergency_contact_address',
    //     'emergency_contact_phone',
    //     'custom_field_corona',
    //     'custom_field_notes',
    //     'Join_date_gregorian',
    //     'Join_date_hijri',
    //     'jobtitle_id',
    //     'work_time',
    //     'labor_hire_company',
    //     'category_id',
    //     'branch_id',
    //     'work_unit',
    //     'class',
    //     'direct_manager',
    //     'permission',
    //     'uploading_record_permission',
    //     'contract_type',
    //     'contract_duration',
    //     'employee_on_probation',
    //     'probation_periods_duration',
    //     'probation_periods_status',
    //     'salary',
    //     'payment_type',
    //     'employee_account_type',
    //     'salary_card_number',
    //     'bank_id',
    //     'IBAN_number',
    //     "bank_name",
    //     'account_holder_name',
    //     'account_holder_name_ar',
    //     'branch_location',
    //     'branch_location_ar',
    //     'account_number',
    //     'swift_code',
    //     'sort_code',
    //     'bank_country',
    //     'bank_identifier_code',
    //     'insurance_number',
    //     'policy_number',
    //     'insurance_startdate',
    //     'category',
    //     'cost',
    //     'availability_health_insurance_council',
    //     'health_insurance_council_startdate',
    //     'insurance_document',
    //     'annual_leave_entitlement',
    //     'expiry_date',
    //     'created_by',
    // ];

    public function documents()
    {
        return $this->hasMany('App\Models\EmployeeDocument', 'employee_id', 'employee_id')->get();
    }

    public function sub_dep()
    {
        return $this->belongsTo(SubDepartment::class, 'sub_dep_id', 'id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
    public function salary_type()
    {
        return $this->hasOne('App\Models\PayslipType', 'id', 'salary_type')->pluck('name')->first();
    }

    public function get_net_salary()
    {
        $employee = Employee::where('id', $this->id)->first();
        $employee_salary = $employee->salary ?? 0;

        // Fetch all related data in one go
        $allowances = Allowance::where('employee_id', $this->id)->get();
        $commissions = Commission::where('employee_id', $this->id)->get();
        $loans = Loan::where('employee_id', $this->id)->get();
        $saturation_deductions = SaturationDeduction::where('employee_id', $this->id)->get();
        $other_payments = OtherPayment::where('employee_id', $this->id)->get();
        $over_times = Overtime::where('employee_id', $this->id)->get();

        // Calculate totals
        $total_allowance = $allowances->sum('amount');
        $total_commission = $commissions->sum(function($commission) use ($employee_salary, $total_allowance) {
            return $commission->type == '$' ? $commission->amount : ($employee_salary + $total_allowance) * ($commission->amount / 100);
        });
        $total_loan = $loans->sum('amount');
        $total_saturation_deduction = $saturation_deductions->sum('amount');
        $total_other_payment = $other_payments->sum('amount');
        $total_over_time = $over_times->sum(function($over_time) {
            return $over_time->number_of_days * $over_time->hours * $over_time->rate;
        });

        // Insurance calculation
        $insurance_percentage = $employee->nationality_type == 1
            ? Salary_setting::value('saudi_employee_insurance_percentage')
            : Salary_setting::value('Nonsaudi_employee_insurance_percentage');
        $total_insurance = ($employee_salary + $total_allowance) * ($insurance_percentage / 100);

        // Net Salary Calculation
        $net_salary = $employee_salary + $total_allowance + $total_commission + $total_other_payment + $total_over_time
            - $total_loan - $total_saturation_deduction - $total_insurance;
//        dd($net_salary);
        return $net_salary;
    }
    public function get_totalsalary()
    {
        $employee        = Employee::where('id', '=', $this->id)->first();
        $employee_salary = (!empty($employee->salary) ? $employee->salary : 0);

        $allowances      = Allowance::where('employee_id', '=', $this->id)->sum('amount');
//        $total_allowance = 0;
//        foreach ($allowances as $allowance) {
//            $total_allowance = $allowance->amount + $total_allowance;
//        }

        $totalSalary      = $employee_salary + $allowances;

        return $totalSalary;
    }

    public static function allowance($id)
    {
        //allowance
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $allowances         = Allowance::where('employee_id', '=', $id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();
        $total_allowance    = 0;
        foreach ($allowances as $allowance) {
            $total_allowance = $allowance->amount + $total_allowance;
        }

        $allowance_json = json_encode($allowances);

        return $allowance_json;
    }

    public static function insurance($id,$type)
    {
        $employee        = Employee::where('id', '=', $id)->first();
        $employee_salary = (!empty($employee->salary) ? $employee->salary : 0);

        //Insurances
        $allinsurances                = Allowance::where('employee_id', '=', $id)->get();
        $total_allowance_insurance    = 0;
        foreach ($allinsurances as $insurance)
        {
            if($insurance->allowance_options->insurance_active == 1)
            {
                $total_allowance_insurance = $insurance->amount + $total_allowance_insurance;
            }
        }

        $employee_insurance_percentage = $employee->nationality_type == 1 ? Salary_setting::where('created_by',\Auth::user()->id)->value('saudi_employee_insurance_percentage') : Salary_setting::where('created_by',\Auth::user()->id)->value('Nonsaudi_employee_insurance_percentage');
        $company_insurance_percentage  = $employee->nationality_type == 1 ? Salary_setting::where('created_by',\Auth::user()->id)->value('saudi_company_insurance_percentage')  : Salary_setting::where('created_by',\Auth::user()->id)->value('Nonsaudi_company_insurance_percentage');
        $total_employee_insurance      = $total_allowance_insurance + $employee_salary;
        $final_employee_insurance      = $total_employee_insurance * ( ($type == 'employee' ? $employee_insurance_percentage : $company_insurance_percentage)  / 100);

        return $final_employee_insurance;
    }

    public static function medical_insurance($id,$type)
    {
        $employee                   = Employee::where('id', '=', $id)->first();
        $employee_medical_insurance = $employee->nationality_type == 1 ? Salary_setting::where('created_by',\Auth::user()->creatorId())->value('saudi_employee_medical_insurance') : Salary_setting::where('created_by',\Auth::user()->creatorId())->value('Nonsaudi_employee_medical_insurance');
        $company_medical_insurance  = $employee->nationality_type == 1 ? Salary_setting::where('created_by',\Auth::user()->creatorId())->value('saudi_company_medical_insurance')  : Salary_setting::where('created_by',\Auth::user()->creatorId())->value('Nonsaudi_company_medical_insurance');

        return $type == 'company' ?  $company_medical_insurance : $employee_medical_insurance;
    }

    public static function commission($id)
    {
        //commission
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $employee         = Employee::where('id', '=', $id)->first();
        $commissions      = Commission::where('employee_id', '=', $id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();
        $total_commission = 0;
        $totalSalary      = $employee->get_totalsalary();
        foreach ($commissions as $commission) {
//            $commission->amount = $commission->type == '$' ? $commission->amount :  $commission->amount ;
            $total_commission = $commission->amount + $total_commission;
        }
        $commission_json = json_encode($commissions);

        return $commission_json;
    }

    public static function get_total_commission($id)
    {
        $employee       = Employee::where('id', '=', $id)->first();

        //commission
        $commissions      = Commission::where('employee_id', '=', $id)->get();
        $total_commission = 0;
        $totalSalary      = $employee->get_totalsalary();
        foreach ($commissions as $commission) {
//            $commission->amount = $commission->type == '$' ? $commission->amount :  $totalSalary * ($commission->amount) / 100 ;
            $total_commission = $commission->amount + $total_commission;
        }
        return $total_commission;
    }

    public static function loan($id)
    {
        //Loan
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $loans      = Loan::where('employee_id', '=', $id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();
        $total_loan = 0;
        foreach ($loans as $loan) {
            $total_loan = $loan->amount + $total_loan;
        }
        $loan_json = json_encode($loans);

        return $loan_json;
    }

    public static function saturation_deduction($id)
    {
        //Saturation Deduction
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $saturation_deductions      = SaturationDeduction::where('employee_id', '=', $id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();
        $total_saturation_deduction = 0;
        foreach ($saturation_deductions as $saturation_deduction) {
            $total_saturation_deduction = $saturation_deduction->amount + $total_saturation_deduction;
        }
        $saturation_deduction_json = json_encode($saturation_deductions);

        return $saturation_deduction_json;
    }

    public static function other_payment($id)
    {
        //OtherPayment
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $other_payments      = OtherPayment::where('employee_id', '=', $id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();
        $total_other_payment = 0;
        foreach ($other_payments as $other_payment) {
            $total_other_payment = $other_payment->amount + $total_other_payment;
        }
        $other_payment_json = json_encode($other_payments);

        return $other_payment_json;
    }

    public static function overtime($id)
    {
        //Overtime
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $over_times      = Overtime::where('employee_id', '=', $id)
        ->when($attendancemovement, function ($q)  use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();

        $total_over_time = 0;
        foreach ($over_times as $over_time) {
            $total_work      = $over_time->number_of_days * $over_time->hours;
            $amount          = $total_work * $over_time->rate;
            $total_over_time = $amount + $total_over_time;
        }
        $over_time_json = json_encode($over_times);

        return $over_time_json;
    }

    public static function workdays($id)
    {
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $employee           = Employee::find($id);
        if($attendancemovement)
        {
            $start_movement_date    = \Carbon\Carbon::parse($attendancemovement->start_movement_date)->format('Y-m-d');
            $start_movement_date    = $start_movement_date < date("Y-m-d",strtotime($employee->Join_date_gregorian)) ? date("Y-m-d",strtotime($employee->Join_date_gregorian)) : $start_movement_date;
            $end_movement_date      = \Carbon\Carbon::parse($attendancemovement->end_movement_date);
            $diffInDays             = $end_movement_date->diffInDays($start_movement_date)+1;
            $absences               = Absence::where('employee_id',$id)->where('type','!=','V')->whereBetween('start_date',[$start_movement_date,$end_movement_date])->sum('number_of_days');
            $workdays               = $diffInDays - $absences;
            return $workdays;
        }
    }

    public static function absence($id)
    {
        //absence
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $absences  = Absence::where('employee_id', '=', $id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(start_date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();
        $absences  = json_encode($absences);
        return $absences;
    }

    public function absenceCount()
    {
        //absence
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $absences           = Absence::where('employee_id', '=', $this->id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(start_date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->get();
        return $absences;
    }


    public static function employee_id()
    {
        $employee = Employee::latest()->first();
        return !empty($employee) ? $employee->id + 1 : 1;
    }

    public function branch()
    {
        return $this->hasOne('App\Models\Branch', 'id', 'branch_id');
    }

    public function phone()
    {
        return $this->hasOne('App\Models\Employee', 'id', 'phone');
    }

    public function department()
    {
        return $this->hasOne('App\Models\Department', 'id', 'department_id');
    }
    public function departments()
    {
        return $this->belongsTo('App\Models\Department',   'department_id');
    }

    public function designation()
    {
        return $this->belongsTo('App\Models\Designation',  'designation_id');
    }

    public function salaryType()
    {
        return $this->hasOne('App\Models\PayslipType', 'id', 'salary_type');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function paySlip()
    {
        return $this->hasOne('App\Models\PaySlip', 'id', 'employee_id');
    }

    public function present_status($employee_id, $data)
    {
        return AttendanceEmployee::where('employee_id', $employee_id)->where('date', $data)->first();
    }

    public static function employee_name($name)
    {
        $employee = Employee::where('id', $name)->first();
        if (!empty($employee)) {
            return $employee->name;
        }
    }

    public static function login_user($name)
    {
        $user = User::where('id', $name)->first();
        return $user->name;
    }

    public static function employee_salary($salary)
    {
        $employee = Employee::where("salary", $salary)->first();
        if ($employee->salary == '0' || $employee->salary == '0.0') {
            return "-";
        } else {
            return $employee->salary;
        }
    }

    public function nationality()
    {
        return $this->hasOne('App\Models\Nationality', 'id', 'nationality_id');
    }

    public function jobtitle()
    {
        return $this->hasOne('App\Models\Jobtitle', 'id', 'jobtitle_id');
    }

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function empAllowance()
    {
        return $this->hasMany('App\Models\Allowance');
    }

    public function getSalaryPerDay($id){
       $basicSalary  = Employee::where('id',$id)->value('salary');
       $SalaryPerDay = 0 ;
       if($basicSalary){
           $SalaryPerDay = ($basicSalary * 12) / 365 ;
       }
       return $SalaryPerDay;
    }

    public function getSalaryPerHour($id){
        $salaryPerHour = $this->getSalaryPerDay($id) / 8;
        return $salaryPerHour * Utility::salary_setting()->overtime_rate;
    }

    private function convertTimeToMinutes(string $time): int
    {
        $timesplit=explode(':',$time);
        $min=($timesplit[0]*60)+($timesplit[1])+($timesplit[2]>30?1:0);
        return $min ;
    }

    public function getEmployeeDelays($start, $end){
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $employee_delays    = AttendanceEmployee::where('employee_id',$this->id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->pluck('late')->toArray();

        $delays = array_filter($employee_delays, function($v) use($start,$end) {
            $v  =  self::convertTimeToMinutes($v);
            if($end){
                if($v >= $start && $v <= $end){
                    return $v;
                }
            }else{
                if($v >= $start){
                    return $v;
                }
            }
        }, ARRAY_FILTER_USE_BOTH);

        return count($delays);
    }

    public function sumDateWithSecondes()
    {
        return AttendanceEmployee::select([ DB::raw('SEC_TO_TIME(TIME_TO_SEC( SUM( `late` ))) as late_sum')])
        ->where('employee_id',$this->id)
        ->first()->late_sum;
    }

    public function getEmployeeOverTimes($start, $end){
        $attendancemovement   = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        $employee_overtimes   = AttendanceEmployee::where('employee_id',$this->id)
        ->when($attendancemovement, function ($q) use($attendancemovement) {
            return $q->whereBetween(DB::raw('DATE(date)'), [$attendancemovement->start_movement_date, $attendancemovement->end_movement_date]);
        })->pluck('overtime')->toArray();
        $overtimes = array_filter($employee_overtimes, function($v) use($start,$end) {
            $v  = $v ? $v : '00:00:00';
            $v  =  self::convertTimeToMinutes($v);
            if($end){
                if($v >= $start && $v <= $end){
                    return $v;
                }
            }else{
                if($v >= $start){
                    return $v;
                }
            }
        }, ARRAY_FILTER_USE_BOTH);

        return count($overtimes);
    }

    public function attendance(){
        return $this->hasMany('App\Models\AttendanceEmployee');
    }

    public function haveAttendanceToday()
    {
        return $this->attendance()->whereDate('date', date('Y-m-d'))->first();
    }
}
