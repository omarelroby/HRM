<?php

namespace App\Http\Controllers;

use App\Imports\AttendanceImport;
use App\Models\AccountList;
use App\Models\AttendanceEmployee;
use App\Models\AttendanceMovement;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Deposit;
use App\Models\Employee;
use App\Models\Utility;
use App\Models\Expense;
use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\PaySlip;
use App\Models\TimeSheet;
use App\Models\Salary_setting;
use App\Models\Holiday;
use App\Models\Absence;
use Carbon\carbon;
use Illuminate\Http\Request;
use Laradevsbd\Zkteco\Http\Library\ZktecoLib;


class ReportController extends Controller
{

    public function incomeVsExpense(Request $request)
    {
        if(\Auth::user()->can('Manage Report'))
        {
            $deposit = Deposit::where('created_by', \Auth::user()->creatorId());

            $labels       = $data = [];
            $expenseCount = $incomeCount = 0;
            if(!empty($request->start_month) && !empty($request->end_month))
            {

                $start = strtotime($request->start_month);
                $end   = strtotime($request->end_month);

                $currentdate = $start;
                $month       = [];
                while($currentdate <= $end)
                {
                    $month = date('m', $currentdate);
                    $year  = date('Y', $currentdate);

                    $depositFilter = Deposit::where('created_by', \Auth::user()->creatorId())->whereMonth('date', $month)->whereYear('date', $year)->get();

                    $depositsTotal = 0;
                    foreach($depositFilter as $deposit)
                    {
                        $depositsTotal += $deposit->amount;
                    }
                    $incomeData[] = $depositsTotal;
                    $incomeCount  += $depositsTotal;

                    $expenseFilter = Expense::where('created_by', \Auth::user()->creatorId())->whereMonth('date', $month)->whereYear('date', $year)->get();
                    $expenseTotal  = 0;
                    foreach($expenseFilter as $expense)
                    {
                        $expenseTotal += $expense->amount;
                    }
                    $expenseData[] = $expenseTotal;
                    $expenseCount  += $expenseTotal;

                    $labels[]    = date('M Y', $currentdate);
                    $currentdate = strtotime('+1 month', $currentdate);

                }

                $filter['startDateRange'] = date('M-Y', strtotime($request->start_month));
                $filter['endDateRange']   = date('M-Y', strtotime($request->end_month));

            }
            else
            {
                for($i = 0; $i < 6; $i++)
                {
                    $month = date('m', strtotime("-$i month"));
                    $year  = date('Y', strtotime("-$i month"));

                    $depositFilter = Deposit::where('created_by', \Auth::user()->creatorId())->whereMonth('date', $month)->whereYear('date', $year)->get();

                    $depositTotal = 0;
                    foreach($depositFilter as $deposit)
                    {
                        $depositTotal += $deposit->amount;
                    }

                    $incomeData[] = $depositTotal;
                    $incomeCount  += $depositTotal;

                    $expenseFilter = Expense::where('created_by', \Auth::user()->creatorId())->whereMonth('date', $month)->whereYear('date', $year)->get();
                    $expenseTotal  = 0;
                    foreach($expenseFilter as $expense)
                    {
                        $expenseTotal += $expense->amount;
                    }
                    $expenseData[] = $expenseTotal;
                    $expenseCount  += $expenseTotal;

                    $labels[] = date('M Y', strtotime("-$i month"));
                }
                $filter['startDateRange'] = date('M-Y');
                $filter['endDateRange']   = date('M-Y', strtotime("-5 month"));

            }

            $incomeArr['name'] = __('Income');
            $incomeArr['data'] = $incomeData;

            $expenseArr['name'] = __('Expense');
            $expenseArr['data'] = $expenseData;

            $data[] = $incomeArr;
            $data[] = $expenseArr;

            // dd(json_encode($data));

            return view('report.income_expense', compact('labels', 'data', 'incomeCount', 'expenseCount', 'filter'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function leave(Request $request)
    {

        if(\Auth::user()->can('Manage Report'))
        {

            $branch = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch->prepend('All', '');

            $department = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $department->prepend('All', '');

            $filterYear['branch']        = __('All');
            $filterYear['department']    = __('All');
            $filterYear['type']          = __('Monthly');
            $filterYear['dateYearRange'] = date('M-Y');
            $employees                   = Employee::where('created_by', \Auth::user()->creatorId());
            if(!empty($request->branch))
            {
                $employees->where('branch_id', $request->branch);
                $filterYear['branch'] = !empty(Branch::find($request->branch)) ? Branch::find($request->branch)->name : '';
            }
            if(!empty($request->department))
            {
                $employees->where('department_id', $request->department);
                $filterYear['department'] = !empty(Department::find($request->department)) ? Department::find($request->department)->name : '';
            }


            $employees = $employees->get();

            $leaves        = [];
            $totalApproved = $totalReject = $totalPending = 0;
            foreach($employees as $employee)
            {

                $employeeLeave['id']          = $employee->id;
                $employeeLeave['employee_id'] = $employee->employee_id;
                $employeeLeave['employee']    = $employee->name;

                $approved = Leave::where('employee_id', $employee->id)->where('status', 'Approve');
                $reject   = Leave::where('employee_id', $employee->id)->where('status', 'Reject');
                $pending  = Leave::where('employee_id', $employee->id)->where('status', 'Pending');

                if($request->type == 'monthly' && !empty($request->month))
                {
                    $month = date('m', strtotime($request->month));
                    $year  = date('Y', strtotime($request->month));

                    $approved->whereMonth('applied_on', $month)->whereYear('applied_on', $year);
                    $reject->whereMonth('applied_on', $month)->whereYear('applied_on', $year);
                    $pending->whereMonth('applied_on', $month)->whereYear('applied_on', $year);

                    $filterYear['dateYearRange'] = date('M-Y', strtotime($request->month));
                    $filterYear['type']          = __('Monthly');

                }
                elseif(!isset($request->type))
                {
                    $month     = date('m');
                    $year      = date('Y');
                    $monthYear = date('Y-m');

                    $approved->whereMonth('applied_on', $month)->whereYear('applied_on', $year);
                    $reject->whereMonth('applied_on', $month)->whereYear('applied_on', $year);
                    $pending->whereMonth('applied_on', $month)->whereYear('applied_on', $year);

                    $filterYear['dateYearRange'] = date('M-Y', strtotime($monthYear));
                    $filterYear['type']          = __('Monthly');
                }


                if($request->type == 'yearly' && !empty($request->year))
                {
                    $approved->whereYear('applied_on', $request->year);
                    $reject->whereYear('applied_on', $request->year);
                    $pending->whereYear('applied_on', $request->year);


                    $filterYear['dateYearRange'] = $request->year;
                    $filterYear['type']          = __('Yearly');
                }

                $approved = $approved->count();
                $reject   = $reject->count();
                $pending  = $pending->count();

                $totalApproved += $approved;
                $totalReject   += $reject;
                $totalPending  += $pending;

                $employeeLeave['approved'] = $approved;
                $employeeLeave['reject']   = $reject;
                $employeeLeave['pending']  = $pending;


                $leaves[] = $employeeLeave;
            }

            $starting_year = date('Y', strtotime('-5 year'));
            $ending_year   = date('Y', strtotime('+5 year'));

            $filterYear['starting_year'] = $starting_year;
            $filterYear['ending_year']   = $ending_year;

            $filter['totalApproved'] = $totalApproved;
            $filter['totalReject']   = $totalReject;
            $filter['totalPending']  = $totalPending;


            return view('dashboard.report.leave', compact('department', 'branch', 'leaves', 'filterYear', 'filter'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function employeeLeave(Request $request, $employee_id, $status, $type, $month, $year)
    {
        if(\Auth::user()->can('Manage Report'))
        {
            $leaveTypes = LeaveType::where('created_by', \Auth::user()->creatorId())->get();
            $leaves     = [];
            foreach($leaveTypes as $leaveType)
            {
                $leave        = new Leave();
                $leave->title = $leaveType->title;
                $totalLeave   = Leave::where('employee_id', $employee_id)->where('status', $status)->where('leave_type_id', $leaveType->id);
                if($type == 'yearly')
                {
                    $totalLeave->whereYear('applied_on', $year);
                }
                else
                {
                    $m = date('m', strtotime($month));
                    $y = date('Y', strtotime($month));

                    $totalLeave->whereMonth('applied_on', $m)->whereYear('applied_on', $y);
                }
                $totalLeave = $totalLeave->count();

                $leave->total = $totalLeave;
                $leaves[]     = $leave;
            }

            $leaveData = Leave::where('employee_id', $employee_id)->where('status', $status);
            if($type == 'yearly')
            {
                $leaveData->whereYear('applied_on', $year);
            }
            else
            {
                $m = date('m', strtotime($month));
                $y = date('Y', strtotime($month));

                $leaveData->whereMonth('applied_on', $m)->whereYear('applied_on', $y);
            }


            $leaveData = $leaveData->get();


            return view('report.leaveShow', compact('leaves', 'leaveData'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function accountStatement(Request $request)
    {
        if(\Auth::user()->can('Manage Report'))
        {
            $accountList = AccountList::where('created_by', \Auth::user()->creatorId())->get()->pluck('account_name', 'id');
            $accountList->prepend('All', '');

            $filterYear['account'] = __('All');
            $filterYear['type']    = __('Income');


            if($request->type == 'expense')
            {
                $accountData = Expense::orderBy('id');
                $accounts    = Expense::select('account_lists.id', 'account_lists.account_name')->leftjoin('account_lists', 'expenses.account_id', '=', 'account_lists.id')->groupBy('expenses.account_id')->selectRaw('sum(amount) as total');

                if(!empty($request->start_month) && !empty($request->end_month))
                {
                    $start = strtotime($request->start_month);
                    $end   = strtotime($request->end_month);
                }
                else
                {
                    $start = strtotime(date('Y-m'));
                    $end   = strtotime(date('Y-m', strtotime("-5 month")));
                }

                $currentdate = $start;

                while($currentdate <= $end)
                {
                    $data['month'] = date('m', $currentdate);
                    $data['year']  = date('Y', $currentdate);

                    $accountData->Orwhere(
                        function ($query) use ($data){
                            $query->whereMonth('date', $data['month'])->whereYear('date', $data['year']);
                        }
                    );

                    $accounts->Orwhere(
                        function ($query) use ($data){
                            $query->whereMonth('date', $data['month'])->whereYear('date', $data['year']);
                        }
                    );

                    $currentdate = strtotime('+1 month', $currentdate);
                }

                $filterYear['startDateRange'] = date('M-Y', $start);
                $filterYear['endDateRange']   = date('M-Y', $end);

                if(!empty($request->account))
                {
                    $accountData->where('account_id', $request->account);
                    $accounts->where('account_lists.id', $request->account);

                    $filterYear['account'] = !empty(AccountList::find($request->account)) ? Department::find($request->account)->account_name : '';
                }

                $accounts->where('expenses.created_by', \Auth::user()->creatorId());

                $filterYear['type'] = __('Expense');
            }
            else
            {
                $accountData = Deposit::orderBy('id');
                $accounts    = Deposit::select('account_lists.id', 'account_lists.account_name')->leftjoin('account_lists', 'deposits.account_id', '=', 'account_lists.id')->groupBy('deposits.account_id')->selectRaw('sum(amount) as total');

                if(!empty($request->start_month) && !empty($request->end_month))
                {

                    $start = strtotime($request->start_month);
                    $end   = strtotime($request->end_month);

                }
                else
                {
                    $start = strtotime(date('Y-m'));
                    $end   = strtotime(date('Y-m', strtotime("-5 month")));

                }


                $currentdate = $start;

                while($currentdate <= $end)
                {
                    $data['month'] = date('m', $currentdate);
                    $data['year']  = date('Y', $currentdate);

                    $accountData->Orwhere(
                        function ($query) use ($data){
                            $query->whereMonth('date', $data['month'])->whereYear('date', $data['year']);
                        }
                    );
                    $currentdate = strtotime('+1 month', $currentdate);

                    $accounts->Orwhere(
                        function ($query) use ($data){
                            $query->whereMonth('date', $data['month'])->whereYear('date', $data['year']);
                        }
                    );
                    $currentdate = strtotime('+1 month', $currentdate);
                }

                $filterYear['startDateRange'] = date('M-Y', $start);
                $filterYear['endDateRange']   = date('M-Y', $end);

                if(!empty($request->account))
                {
                    $accountData->where('account_id', $request->account);
                    $accounts->where('account_lists.id', $request->account);

                    $filterYear['account'] = !empty(AccountList::find($request->account)) ? Department::find($request->account)->account_name : '';

                }
                $accounts->where('deposits.created_by', \Auth::user()->creatorId());


            }

            $accountData->where('created_by', \Auth::user()->creatorId());
            $accountData = $accountData->get();

            $accounts = $accounts->get();


            return view('dashboard.report.account_statement', compact('accountData', 'accountList', 'accounts', 'filterYear'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function payroll(Request $request)
    {

        if(\Auth::user()->can('Manage Report'))
        {
            $branch = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch->prepend('All', '');

            $department = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $department->prepend('All', '');

            $filterYear['branch']     = __('All');
            $filterYear['department'] = __('All');
            $filterYear['type']       = __('Monthly');

            $payslips = PaySlip::select('pay_slips.*', 'employees.name')->leftjoin('employees', 'pay_slips.employee_id', '=', 'employees.id')->where('pay_slips.created_by', \Auth::user()->creatorId());


            if($request->type == 'monthly' && !empty($request->month))
            {

                $payslips->where('salary_month', $request->month);

                $filterYear['dateYearRange'] = date('M-Y', strtotime($request->month));
                $filterYear['type']          = __('Monthly');
            }
            elseif(!isset($request->type))
            {
                $month = date('Y-m');

                $payslips->where('salary_month', $month);

                $filterYear['dateYearRange'] = date('M-Y', strtotime($month));
                $filterYear['type']          = __('Monthly');
            }


            if($request->type == 'yearly' && !empty($request->year))
            {
                $startMonth = $request->year . '-01';
                $endMonth   = $request->year . '-12';
                $payslips->where('salary_month', '>=', $startMonth)->where('salary_month', '<=', $endMonth);

                $filterYear['dateYearRange'] = $request->year;
                $filterYear['type']          = __('Yearly');
            }


            if(!empty($request->branch))
            {
                $payslips->where('employees.branch_id', $request->branch);

                $filterYear['branch'] = !empty(Branch::find($request->branch)) ? Branch::find($request->branch)->name : '';
            }

            if(!empty($request->department))
            {
                $payslips->where('employees.department_id', $request->department);

                $filterYear['department'] = !empty(Department::find($request->department)) ? Department::find($request->department)->name : '';
            }

            $payslips = $payslips->get();

            $totalBasicSalary = $totalNetSalary = $totalAllowance = $totalCommision = $totalLoan = $totalSaturationDeduction = $totalOtherPayment = $totalOverTime = 0;

            foreach($payslips as $payslip)
            {
                $totalBasicSalary += $payslip->basic_salary;
                $totalNetSalary   += $payslip->net_payble;

                $allowances = json_decode($payslip->allowance);
                foreach($allowances as $allowance)
                {
                    $totalAllowance += $allowance->amount;

                }

                $commisions = json_decode($payslip->commission);
                foreach($commisions as $commision)
                {
                    $totalCommision += $commision->amount;

                }

                $loans = json_decode($payslip->loan);
                foreach($loans as $loan)
                {
                    $totalLoan += $loan->amount;
                }

                $saturationDeductions = json_decode($payslip->saturation_deduction);
                foreach($saturationDeductions as $saturationDeduction)
                {
                    $totalSaturationDeduction += $saturationDeduction->amount;
                }

                $otherPayments = json_decode($payslip->other_payment);
                foreach($otherPayments as $otherPayment)
                {
                    $totalOtherPayment += $otherPayment->amount;
                }

                $overtimes = json_decode($payslip->overtime);
                foreach($overtimes as $overtime)
                {
                    $days  = $overtime->number_of_days;
                    $hours = $overtime->hours;
                    $rate  = $overtime->rate;

                    $totalOverTime += ($rate * $hours) * $days;
                }


            }

            $filterData['totalBasicSalary']         = $totalBasicSalary;
            $filterData['totalNetSalary']           = $totalNetSalary;
            $filterData['totalAllowance']           = $totalAllowance;
            $filterData['totalCommision']           = $totalCommision;
            $filterData['totalLoan']                = $totalLoan;
            $filterData['totalSaturationDeduction'] = $totalSaturationDeduction;
            $filterData['totalOtherPayment']        = $totalOtherPayment;
            $filterData['totalOverTime']            = $totalOverTime;


            $starting_year = date('Y', strtotime('-5 year'));
            $ending_year   = date('Y', strtotime('+5 year'));

            $filterYear['starting_year'] = $starting_year;
            $filterYear['ending_year']   = $ending_year;

            return view('report.payroll', compact('payslips', 'filterData', 'branch', 'department', 'filterYear'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function monthlyAttendance(Request $request)
    {
        if(\Auth::user()->can('Manage Report'))
        {
            $branch = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch->prepend('All', '');

            $department = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $department->prepend('All', '');

            $data['branch']     = __('All');
            $data['department'] = __('All');

            $employees = Employee::select('id', 'name')->where('created_by', \Auth::user()->creatorId());
            if(!empty($request->branch))
            {
                $employees->where('branch_id', $request->branch);
                $data['branch'] = !empty(Branch::find($request->branch)) ? Branch::find($request->branch)->name : '';
            }

            if(!empty($request->department))
            {
                $employees->where('department_id', $request->department);
                $data['department'] = !empty(Department::find($request->department)) ? Department::find($request->department)->name : '';
            }

            $employees = $employees->get()->pluck('name', 'id');

            if(!empty($request->month))
            {
                $currentdate = strtotime($request->month);
                $month       = date('m', $currentdate);
                $year        = date('Y', $currentdate);
                $curMonth    = date('M-Y', strtotime($request->month));
            }
            else
            {
                $month    = date('m');
                $year     = date('Y');
                $curMonth = date('M-Y', strtotime($year . '-' . $month));
            }

            $attendanceStatus   = [];
            $dates              = [];
            $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();

            if($attendancemovement)
            {
                $carbonday            = \Carbon\Carbon::parse($attendancemovement->start_movement_date)->format('d');
                $carbonmonth          = \Carbon\Carbon::parse($attendancemovement->start_movement_date)->format('m');
                $carbonyear           = \Carbon\Carbon::parse($attendancemovement->start_movement_date)->format('Y');

                $begin_of_month = now()->setDay($carbonday)->setMonth($carbonmonth)->setYear($carbonyear);
                $end_of_month   = $begin_of_month->clone()->addMonthNoOverflow()->subDay();

                for($i = $begin_of_month; $i <= ($end_of_month);  $i->addDay()){
                    $dates[] = $i->format('Y').'/'.$i->format('m').'/'.$i->format('d');
                }
            }

            $employeesAttendance = [];
            $totalPresent        = $totalLeave = $totalEarlyLeave = $totalVacation = $totalSick = $totalX = 0;
            $ovetimeHours        = $overtimeMins = $earlyleaveHours = $earlyleaveMins = $lateHours = $lateMins = 0;

            foreach($employees as $id => $employee)
            {
                $attendances['id']   = $id;
                $attendances['name'] = $employee;

                foreach($dates as $date)
                {
                    $dt                 = Carbon::parse($date);
                    $employeeAttendance = AttendanceEmployee::where('employee_id', $id)->where('date', $date)->first();

                    if(!empty($employeeAttendance) && $employeeAttendance->status == 'Present')
                    {
                        $attendanceStatus[$date.'-'.$dt->format('l')] = 'P';
                        $totalPresent            += 1;

                        if($employeeAttendance->overtime > 0)
                        {
                            $ovetimeHours += date('h', strtotime($employeeAttendance->overtime));
                            $overtimeMins += date('i', strtotime($employeeAttendance->overtime));
                        }

                        if($employeeAttendance->early_leaving > 0)
                        {
                            $earlyleaveHours += date('h', strtotime($employeeAttendance->early_leaving));
                            $earlyleaveMins  += date('i', strtotime($employeeAttendance->early_leaving));
                        }

                        if($employeeAttendance->late > 0)
                        {
                            $lateHours += date('h', strtotime($employeeAttendance->late));
                            $lateMins  += date('i', strtotime($employeeAttendance->late));
                        }
                    }
                    else
                    {
                        $attendanceStatus[$date.'-'.$dt->format('l')] = '';
                    }
                }

                $absences        = $attendancemovement ?  Absence::where('employee_id', $id)->whereBetween('start_date',[$attendancemovement->start_movement_date , $attendancemovement->end_movement_date])->get() : [];
                $absenceStatus   = [];

                if($absences)
                {
                    foreach($absences as $absence)
                    {
                        $datesArr      = [];
                        for($i = 1 ; $i <= $absence->number_of_days ; $i++)
                        {
                            $startDate           = Carbon::parse($absence->start_date);
                            array_push($datesArr,$startDate->addDays($i)->subDays(1)->format('Y/m/d'));

                            foreach($datesArr as $singleDate)
                            {
                                $singledt     = Carbon::parse($singleDate);
                                if($absence->type == 'A')
                                {
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'A';
                                    $totalLeave              += 1;
                                }elseif($absence->type == 'V'){
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'V';
                                    $totalVacation              += 1;
                                }elseif($absence->type == 'S'){
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'S';
                                    $totalSick              += 1;
                                }elseif($absence->type == 'X'){
                                    $absenceStatus[$singleDate.'-'.$singledt->format('l')] = 'X';
                                    $totalX              += 1;
                                }
                            }
                        }
                    }
                }

                $attendances['status'] = array_merge($attendanceStatus , $absenceStatus) ?? [];
                $employeesAttendance[] = $attendances;
            }

            $totalOverTime   = $ovetimeHours + ($overtimeMins / 60);
            $totalEarlyleave = $earlyleaveHours + ($earlyleaveMins / 60);
            $totalLate       = $lateHours + ($lateMins / 60);

            $data['totalOvertime']   = $totalOverTime;
            $data['totalEarlyLeave'] = $totalEarlyleave;
            $data['totalLate']       = $totalLate;
            $data['totalPresent']    = $totalPresent;
            $data['totalLeave']      = $totalLeave;
            $data['curMonth']        = $curMonth;

            $setting   = Salary_setting::where('created_by',\Auth::user()->id)->first() ?? [];
            $holidays  = Holiday::where('created_by',\Auth::user()->id)->pluck('date')->toarray();

            return view('dashboard.report.monthlyAttendance', compact('employeesAttendance','setting','holidays','branch','department','dates', 'data'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function importFile(Request $request)
    {
        return view('dashboard.report.import');
    }

    public function importMonthlyAttendance(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:csv,xlsx,txt',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
        if(!$attendancemovement)
        {
            return redirect()->back()->with('error', __('An Attendance movement must be created first'));
        }

        $timesheet = (new AttendanceImport())->toArray(request()->file('file'))[0];

        $totalTimesheet         = count($timesheet) - 1;
        $errorArray             = [];
        $company_grace_period   = Utility::getValByName('company_grace_period');
        $startTime              = \Carbon\Carbon::parse(Utility::getValByName('company_start_time'))->addMinutes($company_grace_period);
        $endTime                = \Carbon\Carbon::parse(Utility::getValByName('company_end_time'));


        for($i = 1; $i <= $totalTimesheet; $i++) {
            $timesheets = $timesheet[$i];

            $starttime  = date("H:i:s", strtotime($startTime));
            $in         = date("H:i:s", strtotime($timesheets[3]));
            $out        = date("H:i:s", strtotime($timesheets[4]));
            $date       = date("Y-m-d", strtotime($timesheets[11]));
            $employee   = $timesheets[1];

            if(strtotime($in) > strtotime($startTime))
            {
                $totalLateSeconds = strtotime($in) - strtotime($startTime);
                $hours  = floor($totalLateSeconds / 3600);
                $mins   = floor($totalLateSeconds / 60 % 60);
                $secs   = floor($totalLateSeconds % 60);
                $late1  = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
            }else{
                $late1 = "00:00:00";
            }

            if(strtotime($timesheets[9]) < strtotime('8:00'))
            {
                $totalOvertimeSeconds = strtotime('8:00') - strtotime($timesheets[9]);

                $hours                = floor($totalOvertimeSeconds / 3600);
                $mins                 = floor($totalOvertimeSeconds / 60 % 60);
                $secs                 = floor($totalOvertimeSeconds % 60);
                $late2                = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
            }
            else
            {
                $late2 = "00:00:00";
            }

            $late1 = strtotime($late1) - strtotime("00:00:00");
            $late2 = strtotime($late2) - strtotime("00:00:00");

            $late = \Carbon\Carbon::parse( ($late1 + $late2) )->format("H:i:s");

            //early Leaving
            $totalEarlyLeavingSeconds = strtotime($endTime) - strtotime($out);
            $hours                    = floor($totalEarlyLeavingSeconds / 3600);
            $mins                     = floor($totalEarlyLeavingSeconds / 60 % 60);
            $secs                     = floor($totalEarlyLeavingSeconds % 60);
            $earlyLeaving             = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

            if(strtotime($timesheets[9]) > strtotime('8:00'))
            {
                //Overtime
                $totalOvertimeSeconds = strtotime($timesheets[9]) - strtotime('8:00');
                $hours                = floor($totalOvertimeSeconds / 3600);
                $mins                 = floor($totalOvertimeSeconds / 60 % 60);
                $secs                 = floor($totalOvertimeSeconds % 60);
                $overtime             = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
            }
            else
            {
                $overtime = '00:00:00';
            }

            $attendance = AttendanceEmployee::where('employee_id', '=', $employee)->where('date', '=', $request->date)->first();

            if($employee)
            {
                if(!empty($attendance))
                {
                    $employeeAttendance = $attendance;
                }
                else
                {
                    $employeeAttendance              = new AttendanceEmployee();
                    $employeeAttendance->employee_id = $employee ?? 0;
                    $employeeAttendance->created_by  = \Auth::user()->creatorId();
                }

                $employeeAttendance->date             = $date;
                $employeeAttendance->status           = 'Present';
                $employeeAttendance->clock_in         = $in;
                $employeeAttendance->clock_out        = $out;
                $employeeAttendance->in_company_range = 1;
                $employeeAttendance->late             = $late;
                $employeeAttendance->early_leaving    = ($earlyLeaving > 0) ? $earlyLeaving : '00:00:00';
                $employeeAttendance->overtime         = $overtime;
                $employeeAttendance->total_rest       = '00:00:00';
                $employeeAttendance->save();
            }
        }


        if (empty($errorArray)) {
            $data['status'] = 'success';
            $data['msg']    = __('Record successfully imported');
        } else {
            $data['status'] = 'error';
            $data['msg']    = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalTimesheet . ' ' . 'record');

            foreach ($errorArray as $errorData) {
                $errorRecord[] = implode(',', $errorData->toArray());
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['status'], $data['msg']);
    }

    public function timesheet(Request $request)
    {
        if(\Auth::user()->can('Manage Report'))
        {
            $branch = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch->prepend('All', '');

            $department = Department::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $department->prepend('All', '');

            $filterYear['branch']     = __('All');
            $filterYear['department'] = __('All');

            $timesheets       = TimeSheet::select('time_sheets.*', 'employees.name')->leftjoin('employees', 'time_sheets.employee_id', '=', 'employees.id')->where('time_sheets.created_by', \Auth::user()->creatorId());
            $timesheetFilters = TimeSheet::select('time_sheets.*', 'employees.name')->groupBy('employee_id')->selectRaw('sum(hours) as total')->leftjoin('employees', 'time_sheets.employee_id', '=', 'employees.id')->where('time_sheets.created_by', \Auth::user()->creatorId());


            if(!empty($request->start_date) && !empty($request->end_date))
            {
                $timesheets->where('date', '>=', $request->start_date);
                $timesheets->where('date', '<=', $request->end_date);

                $timesheetFilters->where('date', '>=', $request->start_date);
                $timesheetFilters->where('date', '<=', $request->end_date);

                $filterYear['start_date'] = $request->start_date;
                $filterYear['end_date']   = $request->end_date;
            }
            else
            {

                $filterYear['start_date'] = date('Y-m-01');
                $filterYear['end_date']   = date('Y-m-t');

                $timesheets->where('date', '>=', $filterYear['start_date']);
                $timesheets->where('date', '<=', $filterYear['end_date']);

                $timesheetFilters->where('date', '>=', $filterYear['start_date']);
                $timesheetFilters->where('date', '<=', $filterYear['end_date']);
            }

            if(!empty($request->branch))
            {
                $timesheets->where('branch_id', $request->branch);
                $timesheetFilters->where('branch_id', $request->branch);
                $filterYear['branch'] = !empty(Branch::find($request->branch)) ? Branch::find($request->branch)->name : '';
            }
            if(!empty($request->department))
            {
                $timesheets->where('department_id', $request->department);
                $timesheetFilters->where('department_id', $request->department);

                $filterYear['department'] = !empty(Department::find($request->department)) ? Department::find($request->department)->name : '';
            }

            $timesheets = $timesheets->get();

            $timesheetFilters = $timesheetFilters->get();

            $totalHours = 0;
            foreach($timesheetFilters as $timesheetFilter)
            {
                $totalHours += $timesheetFilter->hours;
            }
            $filterYear['totalHours']    = $totalHours;
            $filterYear['totalEmployee'] = count($timesheetFilters);


            return view('report.timesheet', compact('timesheets', 'branch', 'department', 'filterYear', 'timesheetFilters'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function exportCsv($filter_month, $branch, $department)
    {
        $data['branch']=__('All');
        $data['department']=__('All');
        $employees = Employee::select('id', 'name')->where('created_by', \Auth::user()->creatorId());
        if($branch != 0)
        {
            $employees->where('branch_id', $branch);
            $data['branch'] = !empty(Branch::find($branch)) ? Branch::find($branch)->name : '';
        }

        if($department != 0)
        {
            $employees->where('department_id', $department);
            $data['department'] = !empty(Department::find($department)) ? Department::find($department)->name : '';
        }

        $employees = $employees->get()->pluck('name', 'id');


        $currentdate = strtotime($filter_month);
        $month       = date('m', $currentdate);
        $year        = date('Y', $currentdate);
        $data['curMonth']    = date('M-Y', strtotime($filter_month));


        $fileName = $data['branch'] . ' ' . __('Branch') . ' ' . $data['curMonth'] . ' ' . __('Attendance Report of') . ' ' . $data['department'] . ' ' . __('Department') . ' ' . '.csv';


        $num_of_days = date('t', mktime(0, 0, 0, $month, 1, $year));
        for($i = 1; $i <= $num_of_days; $i++)
        {
            $dates[] = str_pad($i, 2, '0', STR_PAD_LEFT);
        }

        foreach($employees as $id => $employee)
        {
            $attendances['name'] = $employee;

            foreach($dates as $date)
            {

                $dateFormat = $year . '-' . $month . '-' . $date;

                if($dateFormat <= date('Y-m-d'))
                {
                    $employeeAttendance = AttendanceEmployee::where('employee_id', $id)->where('date', $dateFormat)->first();

                    if(!empty($employeeAttendance) && $employeeAttendance->status == 'Present')
                    {
                        $attendanceStatus[$date] = 'P';
                    }
                    elseif(!empty($employeeAttendance) && $employeeAttendance->status == 'Leave')
                    {
                        $attendanceStatus[$date] = 'A';
                    }
                    else
                    {
                        $attendanceStatus[$date] = '-';
                    }

                }
                else
                {
                    $attendanceStatus[$date] = '-';
                }
                $attendances[$date] = $attendanceStatus[$date];
            }

            $employeesAttendance[] = $attendances;
        }

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        );

        $emp = array(
            'employee',
        );

        $columns = array_merge($emp, $dates);

        $callback = function () use ($employeesAttendance, $columns){
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($employeesAttendance as $attendance)
            {
                fputcsv($file, str_replace('"', '', array_values($attendance)));
            }


            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
