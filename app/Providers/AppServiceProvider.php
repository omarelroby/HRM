<?php

namespace App\Providers;


use App\Models\Deposit;
use App\Models\Employee;
use App\Models\User;
use App\Models\Expense;
use App\Models\Department;
use App\Models\Announcement;
use App\Models\Meeting;
use App\Models\Event;
use App\Models\PaySlip;
use App\Models\Notification;
use App\Models\AttendanceEmployee;
use App\Models\EmployeeContracts;
use App\Models\Companyslate;
use App\Models\Salary_setting;
use App\Models\Utility;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::enableForeignKeyConstraints();
        App::setLocale(Session::get('app_locale', config('app.locale')));

        //compose all the views....
        view()->composer('*', function ($view)
        {
            if(\Auth::check())
            {
                $lang         = app()->getLocale() == 'ar' ? '_ar' : '';
                $depts        = array();
                $empcount     = array();
                $companyEmployeesCount = array();
                $departments  = Department::where('created_by', \Auth::user()->creatorId())->get();
                foreach($departments as $key => $dept)
                {
                    array_push($depts,
                        $dept['name'.$lang],
                    );

                    array_push($empcount,
                        Employee::where('created_by', \Auth::user()->creatorId())->where('department_id',$dept->id)->count()
                    );
                }

                $depts    = json_encode($depts);
                $empcount = json_encode($empcount);
                view()->share('depts', $depts);
                view()->share('empcount', $empcount);
                view()->share('lang', $lang);

                $companies = User::where('type','company')->get();
                foreach($companies as $company){
                    array_push($companyEmployeesCount,
                    Employee::where('created_by', $company->id)->count()
                    );
                }

                $companies    = json_encode($companies->pluck('name'));
                $companyEmployeesCount = json_encode($companyEmployeesCount);

                view()->share('companies', $companies);
                view()->share('companyEmployeesCount', $companyEmployeesCount);



                // $expenseCount = $incomeCount = 0;
                // for($i = 0; $i < 6; $i++)
                // {
                //     $month = date('m', strtotime("-$i month"));
                //     $year  = date('Y', strtotime("-$i month"));

                //     $depositFilter = Deposit::where('created_by', \Auth::user()->creatorId())->whereMonth('date', $month)->whereYear('date', $year)->get();

                //     $depositTotal = 0;
                //     foreach($depositFilter as $deposit)
                //     {
                //         $depositTotal += $deposit->amount;
                //     }

                //     $incomeData[] = $depositTotal;
                //     $incomeCount  += $depositTotal;


                //     $expenseFilter = Expense::where('created_by', \Auth::user()->creatorId())->whereMonth('date', $month)->whereYear('date', $year)->get();
                //     $expenseTotal  = 0;
                //     foreach($expenseFilter as $expense)
                //     {
                //         $expenseTotal += $expense->amount;
                //     }
                //     $expenseData[] = $expenseTotal;
                //     $expenseCount  += $expenseTotal;
                // }

                // $pieChartData = [$expenseCount == 0 ? 1 : $expenseCount,$incomeCount == 0 ? 1 : $incomeCount];
                // view()->share('pieChartData', $pieChartData);

                $today = date('Y-m-d');
                $month = date('m');

                $Announcements = Announcement::where('created_by', \Auth::user()->creatorId())
                ->where('start_date', '<=', $today)
                ->where('end_date', '>=', $today)->get();
                view()->share('Announcements', $Announcements);

                $meetings = Meeting::where('created_by', \Auth::user()->creatorId())
                ->whereDate('date', $today)->get();
                view()->share('meetings', $meetings);

                $events = Event::where('created_by', \Auth::user()->creatorId())
                ->where('start_date', '<=', $today)
                ->where('end_date', '>=', $today)->get();
                view()->share('events', $events);

                $month_year = date('Y').'-'.date('m');
                $payslips = PaySlip::select('pay_slips.*', 'employees.name')->leftjoin('employees', 'pay_slips.employee_id', '=', 'employees.id')->where('pay_slips.salary_month',$month_year)->where('pay_slips.created_by', \Auth::user()->creatorId())->get();
                if(\Auth::user()->type == 'employee')
                {
                    $payslips = PaySlip::select('pay_slips.*', 'employees.name')->leftjoin('employees', 'pay_slips.employee_id', '=', 'employees.id')->where('pay_slips.salary_month',$month_year)->where('pay_slips.employee_id', \Auth::user()->id)->get();
                }


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
//                        $days  = $overtime->number_of_days;
                        $hours = $overtime->hours;
                        $rate  = $overtime->avg_hour;

                        $totalOverTime += $rate * $hours;
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

                $pieChartData = [$totalBasicSalary == 0 ? 1 : $totalBasicSalary,$totalNetSalary == 0 ? 1 : $totalNetSalary ,
                $totalAllowance == 0 ? 1 : $totalAllowance,$totalCommision == 0 ? 1 : $totalCommision];
                view()->share('pieChartData', $pieChartData);

                view()->share('filterData', $filterData);

                // timesheet
                $attendanceEmployee = AttendanceEmployee::where('date', $today)->where('status','Present')->pluck('employee_id')->toArray();
                $totalemployees     = Employee::where('created_by', \Auth::user()->creatorId())->get();


                $joinedEmployees   = Employee::where('created_by', \Auth::user()->creatorId())->whereMonth('Join_date_gregorian', $month)->count();
                $offboardEmployees = EmployeeContracts::where('created_by', \Auth::user()->creatorId())->whereMonth('contract_enddate', $month)->count();

                //dd($offboardEmployees);

                view()->share('attendanceEmployee', $attendanceEmployee);
                view()->share('totalemployees', $totalemployees);
                view()->share('joinedEmployees', $joinedEmployees);
                view()->share('offboardEmployees', $offboardEmployees);

                $myNotifications = Notification::where('user_id',\Auth::user()->id)->where('read',0)->get();
                view()->share('myNotifications', $myNotifications);

                $companyslate = Companyslate::where('created_by',\Auth::user()->creatorId())->first();
                view()->share('companyslate', $companyslate);

                $salarysetting = Salary_setting::where('created_by',\Auth::user()->creatorId())->first();
                view()->share('salarysetting', $salarysetting);

                $settings = Utility::settings();
                view()->share('settings', $settings);

            }
        });
    }
}
