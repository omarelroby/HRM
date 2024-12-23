<?php

namespace App\Exports;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\PaySlip;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PaySlipExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $month;
    private $year;

    public function __construct($month ,  $year)
    {
        $this->month = $month;
        $this->year = $year;
    }


    public function collection()
    {
        $formate_month_year = $this->year.'-'.$this->month;
        $validatePaysilp    = PaySlip::where('salary_month', '=', $formate_month_year)->where('created_by', \Auth::user()->creatorId())->get();

        if (empty($validatePaysilp))
        {
            $data=[];
        } 
        else 
        {
            $paylip_employee = PaySlip::select(
                [
                    'employees.id',
                    'employees.employee_id',
                    'employees.name',
                    'employees.residence_number',
                    'employees.Join_date_gregorian',
                    'payslip_types.name as payroll_type',
                    'pay_slips.allowance',
                    'pay_slips.commission',
                    'pay_slips.loan',
                    'pay_slips.saturation_deduction',
                    'pay_slips.other_payment',
                    'pay_slips.overtime',
                    'pay_slips.basic_salary',
                    'pay_slips.net_payble',
                    'pay_slips.id as pay_slip_id',
                    'pay_slips.status',
                    'employees.user_id',
                ]
            )->leftjoin(
                'employees',
                function ($join) use ($formate_month_year) {
                    $join->on('employees.id', '=', 'pay_slips.employee_id');
                    $join->on('pay_slips.salary_month', '=', \DB::raw("'" . $formate_month_year . "'"));
                    $join->leftjoin('payslip_types', 'payslip_types.id', '=', 'employees.salary_type');
                }
            )->where('employees.created_by', \Auth::user()->creatorId())->get();

            
            foreach ($paylip_employee as $employee) {
                $allowance = $commission = $loan = $saturation_deduction = $other_payment = $overtime = 0 ;
                $allowances            = json_decode($employee->allowance);
                foreach($allowances as $allowance)
                {
                    $allowance =+ $allowance->amount;
                }

                $commissions           = json_decode($employee->commission);
                foreach($commissions as $commission)
                {
                    $commission =+ $commission->amount;
                }
                $loans                 = json_decode($employee->loan);
                foreach($loans as $loan)
                {
                    $loan =+ $loan->amount;
                }
                $saturation_deductions = json_decode($employee->saturation_deduction);
                foreach($saturation_deductions as $saturation_deduction)
                {
                    $saturation_deduction =+ $saturation_deduction->amount;
                }
                $other_payments        = json_decode($employee->other_payment);
                foreach($other_payments as $other_payment)
                {
                    $other_payment =+ $other_payment->amount;
                }
                $overtimes             = json_decode($employee->overtime);
                foreach($overtimes as $overtime)
                {
                    $overtime =+ $overtime->rate * $overtime->hours;
                }

                $tmp    = [];
                $tmp[]  = \Auth::user()->employeeIdFormat($employee->employee_id);
                $tmp[]  = DB::table('users')->where('id',\Auth::user()->creatorId())->value('name');
                $tmp[]  = $employee->name;
                $tmp[]  = $employee->residence_number;
                $tmp[]  = $employee->Join_date_gregorian;
                $tmp[]  = $employee->insurance($employee->id,'employee');
                $tmp[]  = $employee->insurance($employee->id,'company');
                $tmp[]  = $allowance;
                $tmp[]  = $commission;
                $tmp[]  = $loan;
                $tmp[]  = $saturation_deduction;
                $tmp[]  = $other_payment;
                $tmp[]  = $overtime;
                $tmp[]  = !empty($employee->basic_salary) ? \Auth::user()->priceFormat($employee->basic_salary) : '-';
                $tmp[]  = !empty($employee->net_payble) ? \Auth::user()->priceFormat($employee->net_payble) : '-';
                $tmp[]  = $employee->insurance($employee->id,'employee') + $loan + $saturation_deduction;
                $data[] = $tmp;
            }
        }

        return !empty($data) ? collect($data) : collect([]);
    }

    public function headings(): array
    {
        return [
            "الرقم الوظيفي ",
            "إسم الشركة ",
            "إسم الموظف ",
            "رقم الإقامة / السجل المدني ",
            "تاريخ الألتحاق ",
            "التامينات الإجتماعية على الموظف",
            "التامينات الإجتماعية على الشركة",
            "البدلات",
            "نسبة المبيعات",
            "قرض",
            "الخصومات",
            "مدفوعات أخرى",
            "عمل إضافى",
            " الراتب الأساسى ",
            " المجموع ",
            "مايتحمل الموظف "
        ];
    }
}
