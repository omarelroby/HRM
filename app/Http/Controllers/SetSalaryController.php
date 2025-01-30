<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use App\Models\AllowanceOption;
use App\Models\Commission;
use App\Models\DeductionOption;
use App\Models\Department;
use App\Models\Employee;
use App\Models\AttendanceMovement;
use App\Models\Loan;
use App\Models\LoanOption;
use App\Models\OtherPayment;
use App\Models\Overtime;
use App\Models\Absence;
use App\Models\PayslipType;
use App\Models\Salary_setting;
use App\Models\SaturationDeduction;
use App\Models\AttendanceEmployee;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class SetSalaryController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Set Salary'))
        {
            if(\Auth::user()->type == 'employee')
            {

                $department = Department::findOrFail(Auth::user()->employee->department_id);
                if ($department) {
                    // Check if the employee is a department manager
                    if (\Auth::user()->employee->department_id == $department->id && \Auth::user()->employee->sub_dep_id == 0) {
                        // Show all employees in the department
                        $employeesIds = $department->employeess->pluck('id');
                         $employees = Employee::whereIn('id', $employeesIds)->get();


                    }
                    // Check if the employee is a sub-department manager
                    elseif (\Auth::user()->employee->section_id == 0) {
                        // Show only employees in the sub-department
                        $employeesIds = Employee::where('sub_dep_id', \Auth::user()->employee->sub_dep_id)->pluck('id');
                         $employees = Employee::whereIn('id', $employeesIds)->get();
                    }
                    else{
                         $employees = Employee::where('id',\Auth::user()->employee->id)->get();
                    }
                }
                return view('dashboard.setsalary.index', compact( 'employees') );
            }
            else
            {
                $employees = Employee::where(
                    [
                        'created_by' => \Auth::user()->creatorId(),
                    ]
                )->get();
                return view('dashboard.setsalary.index', compact( 'employees') );
            }

            }


        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit($id)
    {
        if(\Auth::user()->can('Edit Set Salary'))
        {

            $payslip_type      = PayslipType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $allowance_options = AllowanceOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $loan_options      = LoanOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $deduction_options = DeductionOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            if(\Auth::user()->type == 'employee')
            {
                $currentEmployee      = Employee::where('user_id', '=', \Auth::user()->id)->first();
                $allowances           = Allowance::where('employee_id', $currentEmployee->id)->get();
                $commissions          = Commission::where('employee_id', $currentEmployee->id)->get();
                $loans                = Loan::where('employee_id', $currentEmployee->id)->get();
                $saturationdeductions = SaturationDeduction::where('employee_id', $currentEmployee->id)->get();
                $otherpayments        = OtherPayment::where('employee_id', $currentEmployee->id)->get();
                $overtimes            = Overtime::where('employee_id', $currentEmployee->id)->get();
                $employee             = Employee::where('user_id', '=', \Auth::user()->id)->first();
//                $employee->net_salary=  $allowances->sum('amount')+$employee->salary ;
                return view('setsalary.employee_salary', compact('employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));

            }
            else
            {
                $allowances           = Allowance::where('employee_id', $id)->get();
                $commissions          = Commission::where('employee_id', $id)->get();
                $loans                = Loan::where('employee_id', $id)->get();
                $saturationdeductions = SaturationDeduction::where('employee_id', $id)->get();
                $otherpayments        = OtherPayment::where('employee_id', $id)->get();
                $overtimes            = Overtime::where('employee_id', $id)->get();
                $employee             = Employee::find($id);

//                dd($allowances->sum('amount')+$employee->salary);

                return view('setsalary.edit', compact('employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show($id)
    {

        $payslip_type      = PayslipType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $allowance_options = AllowanceOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $loan_options      = LoanOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $deduction_options = DeductionOption::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        if(\Auth::user()->type == 'employee')
        {
            $total_sick_amount=0;

            $currentEmployee      = Employee::where('user_id', '=', \Auth::user()->id)->first();
            $allowances           = Allowance::where('employee_id', $currentEmployee->id)->get();
            $commissions          = Commission::where('employee_id', $currentEmployee->id)->get();
            $loans                = Loan::where('employee_id', $currentEmployee->id)->get();
            $saturationdeductions = SaturationDeduction::where('employee_id', $currentEmployee->id)->get();
            $otherpayments        = OtherPayment::where('employee_id', $currentEmployee->id)->get();
            $overtimes            = Overtime::where('employee_id', $currentEmployee->id)->get();
            $employee             = Employee::where('user_id', '=', \Auth::user()->id)->first();
            $absences             = Absence::where('employee_id', $currentEmployee->id)->get();
            $setting=Salary_setting::where('created_by',auth()->user()->created_by)->first();
            $total_sick=Absence::where('employee_id',$id)->where('type','S')->get()->sum('number_of_days');
            $total_sick_amount=Absence::where('employee_id',$id)->where('type','S')->get()->sum('discount_amount');
            $abs_with_permission=Absence::where('employee_id',$id)->where('type','A')->get()->sum('number_of_days');
            $abs_without_permission=Absence::where('employee_id',$id)->where('type','X')->get()->sum('number_of_days');
            $insurance_amount=($employee->salary*$setting->saudi_employee_insurance_percentage)/100;
            $employee->net_salary =  ($allowances->sum('amount')+$employee->salary+$overtimes->sum('amount')+$commissions->sum('amount')+$otherpayments->sum('amount'))-($loans->sum('amount')+$insurance_amount+$absences->sum('discount_amount')+$saturationdeductions->sum('amount'));
            $abs_without_permission_amount=0;
            $abs_with_permission_amount=0;

            if($abs_with_permission>0) {
                if ($abs_with_permission >= $setting->annual_vacations) {
                    // If absence with permission exceeds annual vacation balance
                    $abs_with_permission_amount = ($employee->salary * $setting->absence_with_permission_discount) / 100;

                    $employee->net_salary -= $abs_with_permission_amount;
                } else {
                    // If absence with permission is within annual vacation balance

                    $abs_with_permission_amount = 0;
                }
            }
            if($abs_without_permission>0)
            {
                if ($abs_without_permission > $setting->annual_vacations) {
                    // If absence without permission exceeds annual vacation balance
                    $abs_without_permission_amount = ($employee->salary * $setting->absence_without_permission_discount) / 100;
                    $employee->net_salary -= $abs_without_permission_amount;

                } else {

                    $abs_without_permission_amount = 0;
                }
            }
            $employee->save();

            return view('dashboard.setsalary.employee_salary', compact('abs_without_permission_amount','abs_with_permission_amount','abs_with_permission','abs_without_permission','total_sick_amount','total_sick','absences', 'employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));

        }
        else
        {


            $total_sick_amount=0;
            $allowances           = Allowance::where('employee_id', $id)->get();
            $commissions          = Commission::where('employee_id', $id)->get();
            $loans                = Loan::where('employee_id', $id)->get();
            $saturationdeductions = SaturationDeduction::where('employee_id', $id)->get();
            $otherpayments        = OtherPayment::where('employee_id', $id)->get();
            $overtimes            = Overtime::where('employee_id', $id)->get();
            $employee             = Employee::find($id);
            $absences             = Absence::where('employee_id', $id)->get();
            $setting=Salary_setting::where('created_by',auth()->user()->id)->first();
            $total_sick=Absence::where('employee_id',$id)->where('type','S')->get()->sum('number_of_days');
            $total_sick_amount=Absence::where('employee_id',$id)->where('type','S')->get()->sum('discount_amount');
            $abs_with_permission=Absence::where('employee_id',$id)->where('type','A')->get()->sum('number_of_days');
            $abs_without_permission=Absence::where('employee_id',$id)->where('type','X')->get()->sum('number_of_days');

            $insurance_amount=($employee->salary*$setting->saudi_employee_insurance_percentage)/100;
            $employee->net_salary =  ($allowances->sum('amount')+$employee->salary+$overtimes->sum('amount')+$commissions->sum('amount')+$otherpayments->sum('amount'))-($loans->sum('amount')+$insurance_amount+$absences->sum('discount_amount')+$saturationdeductions->sum('amount'));
            $abs_without_permission_amount=0;
            $abs_with_permission_amount=0;

            if($abs_with_permission>0) {
                if ($abs_with_permission >= $setting->annual_vacations) {
                    // If absence with permission exceeds annual vacation balance
                    $abs_with_permission_amount = ($employee->salary * $setting->absence_with_permission_discount) / 100;

                    $employee->net_salary -= $abs_with_permission_amount;
                } else {
                    // If absence with permission is within annual vacation balance

                    $abs_with_permission_amount = 0;
                }
            }
            if($abs_without_permission>0)
            {
                if ($abs_without_permission > $setting->annual_vacations) {
                    // If absence without permission exceeds annual vacation balance
                    $abs_without_permission_amount = ($employee->salary * $setting->absence_without_permission_discount) / 100;
                    $employee->net_salary -= $abs_without_permission_amount;

                } else {

                    $abs_without_permission_amount = 0;
                }
            }
            $employee->save();


            return view('dashboard.setsalary.employee_salary', compact('total_sick_amount','total_sick','abs_with_permission','abs_without_permission','abs_without_permission_amount','abs_with_permission_amount','absences', 'employee', 'payslip_type', 'allowance_options', 'commissions', 'loan_options', 'overtimes', 'otherpayments', 'saturationdeductions', 'loans', 'deduction_options', 'allowances'));
        }

    }

    public function employeeUpdateSalary(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(), [
//                               'salary_type' => 'required',
                               'salary' => 'required',
                           ]
        );
        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $employee = Employee::findOrFail($id);
        $input    = $request->all();
        $employee->fill($input)->save();
//        dd($employee);

        return redirect()->back()->with('success', 'Employee Salary Updated.');
    }

    public function employeeSalary()
    {
        if(\Auth::user()->type == "employee")
        {
            $employees = Employee::where('user_id', \Auth::user()->id)->get();

            return view('setsalary.index', compact('employees'));
        }
    }

    public function employeeBasicSalary($id)
    {

        $payslip_type = PayslipType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $employee     = Employee::find($id);

        return view('dashboard.setsalary.basic_salary', compact('employee', 'payslip_type'));
    }
}
