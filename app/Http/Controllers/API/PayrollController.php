<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\PayrollResource;
use App\Mail\sendemail;
use Validator;
use App\Models\User;
use App\Models\FCMToken;
use App\Models\Employee;
use App\Models\Meeting;
use App\Models\AttendanceMovement;
use App\Models\PaySlip;
use App\Traits\ApiResponser;

class PayrollController extends Controller
{
    use ApiResponser;

    public function index(Request $request){ 
        if($request->type == 'current')
        {
            $CurrentAttendanceMovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->get();
        }else{
            $CurrentAttendanceMovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNotNull('status')->get();
        }

        $dates = [];
        foreach($CurrentAttendanceMovement as $movement){
            array_push($dates,\Carbon\Carbon::parse($movement->end_movement_date)->format('Y-m'));
        }

        $employee    = Employee::where('user_id',\Auth::user()->id)->first();
        $payslip     = PaySlip::select(
            [
                'employees.id',
                'employees.employee_id',
                'employees.name',
                'employees.residence_number',
                'employees.Join_date_gregorian',
                'employees.jobtitle_id',
                'payslip_types.name as payroll_type',
                'pay_slips.allowance',
                'pay_slips.commission',
                'pay_slips.loan',
                'pay_slips.saturation_deduction',
                'pay_slips.other_payment',
                'pay_slips.overtime',
                'pay_slips.absence',
                'pay_slips.basic_salary',
                'pay_slips.net_payble',
                'pay_slips.id as pay_slip_id',
                'pay_slips.status',
                'employees.user_id',
            ]
        )->leftjoin(
            'employees',
            function ($join) use ($dates) {
                $join->on('employees.id', '=', 'pay_slips.employee_id');
                $join->leftjoin('payslip_types', 'payslip_types.id', '=', 'employees.salary_type');
            }
        )->whereIn('pay_slips.salary_month',$dates)->where('employees.id', $employee->id)->get();

        return PayrollResource::collection($payslip);
    }

}