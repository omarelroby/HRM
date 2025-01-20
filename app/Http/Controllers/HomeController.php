<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\AccountList;
use App\Models\Announcement;
use App\Models\AttendanceEmployee;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\CompanyJobRequest;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Employee_shift;
use App\Models\EmployeeContracts;
use App\Models\EmployeeRequest;
use App\Models\Event;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Jobtitle;
use App\Models\Jobtype;
use App\Models\Laborhirecompany;
use App\Models\LandingPageSection;
use App\Models\Meeting;
use App\Models\Nationality;
use App\Models\Order;
use App\Models\Payees;
use App\Models\Payer;
use App\Models\PaySlip;
use App\Models\Place;
use App\Models\Plan;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\Trainer;
use App\Models\User;
use App\Models\Utility;
use App\Models\Workunit;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Role;


class HomeController extends Controller
{

    public function __construct()
    {
    }


    public function index()
    {
        if (Auth::check()) {
            if(\auth()->user()->type=='super admin')
            {
                $user = Auth::user();
                $departments = Department::select('name')
                    ->withCount('employeess') // Count employees for each department
                    ->get()
                    ->groupBy('name') // Group by department name
                    ->map(function ($group) {
                        return [
                            'name' => $group->first()->name, // Take the first instance's name
                            'total_employees' => $group->sum('employeess_count'), // Sum up the employee counts
                        ];
                    })
                    ->values(); // Reset indices
 
                $data['departmentNames'] = $departments->pluck('name'); // Unique department names
                $data['total_employees'] = $departments->pluck('total_employees'); // Count of each department
                $data['employees_count'] = Employee::where('created_by',\auth()->user()->id)->count();
                $data['all_employees'] = Employee::get()->take(8);


                // Get employees with status 'Present' today
                $data['employeesWithAttendance'] = AttendanceEmployee::where('status', 'Present')
                    ->where('date', today())
                    ->count();

                // Get other counts
                $data['complete_tasks'] = Task::where('status', 1)->count();
                $data['tasks'] = Task::count();
                $data['all_tasks'] = Task::take(15)->get();
                $data['orders'] = Order::count();
                $data['job_app'] = JobApplication::count();
                $data['emp_req'] = EmployeeRequest::count();
                $data['trainers'] = Trainer::count();
                $data['comp_requests'] = CompanyJobRequest::count();
                $data['labor_hiring'] = Laborhirecompany::count();

                // Get attendance status for today
                $data['attend_emp'] = AttendanceEmployee::where('status', 'Present')
                    ->where('date', today())
                    ->get()
                    ->take(3);

                // Get employees who came early (before 08:00:00)
                $data['early_arrivals'] = AttendanceEmployee::where('status', 'Present')
                    ->where('date', today())
                    ->where('clock_in', '<=', '09:00:00') // Customize based on early arrival time
                    ->get();

                // Get employees who came late (after 08:00:00)
                $data['late_arrivals'] = AttendanceEmployee::where('status', 'Present')
                    ->where('date', today())
                    ->where('clock_in', '>', '09:00:00') // Customize based on late arrival time
                    ->get();

                $employees = Employee::count();
                $data['absent_employees'] = $employees - ($data['early_arrivals']->count() + $data['late_arrivals']->count());
                $data['openings'] = Job::select('id', 'title', 'position')
                    ->where('status', 'active')
                    ->get()
                    ->take(6);

                $data['applicants'] = JobApplication::select('job', 'name', 'phone', 'profile', 'rating', 'skill', 'country', 'state', 'city', 'gender', 'dob')
                    ->with('jobRelation')
                    ->get()
                    ->take(6);
                // Get the current date and calculate the date for 3 months ago
                 $threeMonthsFromNow = Carbon::now()->addMonths(3);
                $records = Document::with('document_type', 'employee')
                    ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                    ->whereNotNull('end_date')
                    ->where('created_by', auth()->user()->id)
                    ->paginate(10); // Paginate records with 10 per page

                $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                    return $record->document_type->name ?? 'Other';
                });

                $records->setCollection(collect($groupedRecords));

                $data['records'] = $records;
                // Query to count tasks by status
                $statusCounts = Task::select(DB::raw('status, COUNT(*) as count'))
                    ->groupBy('status')
                    ->pluck('count', 'status');

                // Prepare data for the chart
                $chartData = [
                    'completed' => $statusCounts[1] ?? 0,
                    'pending' => $statusCounts[2] ?? 0,
                    'canceled' => $statusCounts[3] ?? 0,
                ];

                $data['chartData'] = $chartData;
                $data['employee_location'] = Place::where('created_by', \Auth::user()->creatorId())->get();
                $data['employee_shifts']= Employee_shift::where('created_by', \Auth::user()->creatorId())->get();
                $data['banks'] = Bank::where('created_by', \Auth::user()->creatorId())->get();
                $data['roles'] = Role::where('created_by', '=', \Auth::user()->creatorId())->get();
                $data['jobclasses'] = ['1','2'];
                $data['branches']= Branch::where('created_by', \Auth::user()->creatorId())->get();
                $data['work_units']= Workunit::where('created_by', \Auth::user()->creatorId())->get();
                $data['job_types']= Jobtype::where('created_by', \Auth::user()->creatorId())->get();
                $data['jobtitles']= Jobtitle::where('created_by', \Auth::user()->creatorId())->get();
                $data['employees'] = Employee::where('created_by', \Auth::user()->creatorId())->get();
                $data['nationalities']     = Nationality::where('created_by', \Auth::user()->creatorId())->get();
                $data['designations']     = Designation::where('created_by', \Auth::user()->creatorId())->get();
                $data['departments']  = Department::where('created_by', \Auth::user()->creatorId())->get();
                $data['laborCompanies'] = Laborhirecompany::where('created_by', \Auth::user()->creatorId())->get();

                $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
                $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
                $data['new_join'] = Employee::whereBetween('Join_date_gregorian', [$lastMonthStart, $lastMonthEnd])->count();

                return view('dashboard.dashboard', $data);
            }
            if(\auth()->user()->type=='company' || \auth()->user()->type=='hr'  )
            {
                $user = Auth::user();
                $threeMonthsFromNow = Carbon::now()->addMonths(3);
                 $records = Document::with('document_type', 'employee')
                    ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                    ->whereNotNull('end_date')
                    ->where('created_by', auth()->user()->id)
                    ->paginate(10); // Paginate records with 10 per page

                 $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                    return $record->document_type->name ?? 'Other';
                });

                 $records->setCollection(collect($groupedRecords));

                $data['records'] = $records;
                $departments = Department::select('name')
                    ->withCount('employeess') // Count employees for each department
                    ->get()
                    ->groupBy('name') // Group by department name
                    ->map(function ($group) {
                        return [
                            'name' => $group->first()->name, // Take the first instance's name
                            'total_employees' => $group->sum('employeess_count'), // Sum up the employee counts
                        ];
                    })
                    ->values(); // Reset indices

                $data['departmentNames'] = $departments->pluck('name'); // Unique department names
                $data['total_employees'] = $departments->pluck('total_employees'); // Count of each department
                $data['employees_count'] = Employee::where('created_by',\auth()->user()->id)->count();
                $data['all_employees'] = Employee::where('created_by',\auth()->user()->id)->get()->take(8);
                $data['employeesWithAttendance'] = AttendanceEmployee::where('status', 'Present')
                    ->where('created_by',\auth()->user()->id)
                    ->where('date', today())
                    ->count();

                // Get other counts
                $data['complete_tasks'] = Task::where('status', 1)
                    ->where('created_by',\auth()->user()->id)
                    ->count();
                $data['tasks'] = Task::
                     where('created_by',\auth()->user()->id)
                    ->count();
                $data['all_tasks'] = Task::where('created_by',\auth()->user()->id)->take(15)->get();
                $data['orders'] = Order::where('user_id',\auth()->user()->id)->count();
                $data['job_app'] = JobApplication::where('created_by',\auth()->user()->id)->count();
                $data['emp_req'] = EmployeeRequest::where('created_by',\auth()->user()->id)->count();
                $data['trainers'] = Trainer::where('created_by',\auth()->user()->id)->count();
                $data['comp_requests'] = CompanyJobRequest::where('created_by',\auth()->user()->id)->count();
                $data['labor_hiring'] = Laborhirecompany::where('created_by',\auth()->user()->id)->count();

                // Get attendance status for today
                $data['attend_emp'] = AttendanceEmployee::where('status', 'Present')
                    ->where('date', today())
                    ->get()
                    ->where('created_by',\auth()->user()->id)
                    ->take(3);

                // Get employees who came early (before 08:00:00)
                $data['early_arrivals'] = AttendanceEmployee::where('status', 'Present')
                    ->where('date', today())
                    ->where('created_by',\auth()->user()->id)
                    ->where('clock_in', '<=', '09:00:00') // Customize based on early arrival time
                    ->get();

                // Get employees who came late (after 08:00:00)
                $data['late_arrivals'] = AttendanceEmployee::where('status', 'Present')
                    ->where('date', today())
                    ->where('created_by',\auth()->user()->id)
                    ->where('clock_in', '>', '09:00:00') // Customize based on late arrival time
                    ->get();

                $employees = Employee::where('created_by',\auth()->user()->id)->count();
                $data['absent_employees'] = $employees - ($data['early_arrivals']->count() + $data['late_arrivals']->count());
                $data['openings'] = Job::select('id', 'title', 'position')
                    ->where('created_by',\auth()->user()->id)
                    ->where('status', 'active')
                    ->get()
                    ->take(6);

                $data['applicants'] = JobApplication::select('job', 'name', 'phone', 'profile', 'rating', 'skill', 'country', 'state', 'city', 'gender', 'dob')
                    ->with('jobRelation')
                    ->where('created_by',\auth()->user()->id)
                    ->get()
                    ->take(6);
                // Get the current date and calculate the date for 3 months ago
                $threeMonthsAgo = Carbon::now()->subMonths(3);

                // Query to count tasks by status
                $statusCounts = Task::select(DB::raw('status, COUNT(*) as count'))
                    ->groupBy('status')
                    ->where('created_by',\auth()->user()->id)
                    ->pluck('count', 'status');

                // Prepare data for the chart
                $chartData = [
                    'active' => $statusCounts[1] ?? 0,
                    'pending' => $statusCounts[0] ?? 0,
                    'canceled' => $statusCounts[2] ?? 0,
                    'finished' => $statusCounts[3] ?? 0,
                ];

                $data['chartData'] = $chartData;

                $data['employee_location'] = Place::where('created_by', \Auth::user()->creatorId())->get();
                $data['employee_shifts']= Employee_shift::where('created_by', \Auth::user()->creatorId())->get();
                $data['banks'] = Bank::where('created_by', \Auth::user()->creatorId())->get();
                $data['roles'] = Role::where('created_by', '=', \Auth::user()->creatorId())->get();
                $data['jobclasses'] = ['1','2'];
                $data['branches']= Branch::where('created_by', \Auth::user()->creatorId())->get();
                $data['work_units']= Workunit::where('created_by', \Auth::user()->creatorId())->get();
                $data['job_types']= Jobtype::where('created_by', \Auth::user()->creatorId())->get();
                $data['jobtitles']= Jobtitle::where('created_by', \Auth::user()->creatorId())->get();
                $data['employees'] = Employee::where('created_by', \Auth::user()->creatorId())->get();
                $data['nationalities']     = Nationality::where('created_by', \Auth::user()->creatorId())->get();
                $data['designations']     = Designation::where('created_by', \Auth::user()->creatorId())->get();
                $data['departments']  = Department::where('created_by', \Auth::user()->creatorId())->get();
                $data['laborCompanies'] = Laborhirecompany::where('created_by', \Auth::user()->creatorId())->get();

                $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
                $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
                $data['new_join'] = Employee::whereBetween('Join_date_gregorian', [$lastMonthStart, $lastMonthEnd])->count();

                return view('dashboard.dashboard', $data);
            }
            if(auth()->user()->type=='employee')
            {
                $employee=Employee::where('user_id',auth()->user()->id)->firstOrFail();
                if(empty($employee->sub_dep_id) &&$employee->sub_dep_id==0)
                {
                    $data['all_tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('department_id', $employee->department_id);
                        })->take(15)->get();

                    $data['employeesWithAttendance']  = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('department_id',$employee->department_id);
                        })
                        ->where('status', 'Present')
                        ->where('date', today())
                        ->count();
                    $data['attend_emp'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('department_id',$employee->department_id);
                        })

                        ->where('status', 'Present')
                        ->where('date', today())
                        ->get()
                        ->take(4);
                    $data['employees_count'] = Employee::where('department_id',$employee->department_id)->count();

                     $data['tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('department_id', $employee->department_id);
                        })
                        ->count();
                     $data['complete_tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('department_id', $employee->department_id);
                        })
                        ->where('status', 1) // Assuming status 1 means "completed"
                        ->count();

                    $data['emp_req'] = EmployeeRequest::with('employees')
                        ->whereHas('employees', function ($query) use ($employee) {
                            $query->where('department_id', $employee->department_id);
                        })
                        ->count();
                    $data['payslip'] = PaySlip::with('employees')
                        ->whereHas('employees', function ($query) use ($employee) {
                            $query->where('department_id', $employee->department_id);
                        })
                        ->count();

                    $departments = Department::select('id', 'name')
                        ->withCount(['employees' => function ($query) use ($employee) {
                            // Only include departments relevant to the logged-in employee
                            $query->where('department_id', $employee->department_id);
                        }])
                        ->get()
                        ->map(function ($department) {
                            return [
                                'name' => $department->name,
                                'total_employees' => $department->employees_count, // Use the correct `withCount` alias
                            ];
                        });

                    $data['departmentNames'] = $departments->pluck('name');
                    $data['total_employees'] = $departments->pluck('total_employees');




                    $data['early_arrivals'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('department_id',$employee->department_id);
                        })
                        ->where('status', 'Present')
                        ->where('date', today())
                        ->where('clock_in', '<=', '09:00:00') // Customize based on early arrival time
                        ->get();

                    // Get employees who came late (after 08:00:00)
                    $data['late_arrivals'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('department_id',$employee->department_id);
                        })
                        -> where('status', 'Present')
                        ->where('date', today())
                        ->where('clock_in', '>', '09:00:00') // Customize based on late arrival time
                        ->get();

                    $employees = Employee::where('department_id', $employee->department_id)->count();
                    $data['absent_employees'] = $employees - ($data['early_arrivals']->count() + $data['late_arrivals']->count());


                    $threeMonthsFromNow = Carbon::now()->addMonths(3);
                    $records = Document::with('document_type', 'employee')
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('department_id',$employee->department_id);
                        })
                        ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                        ->whereNotNull('end_date')
                        ->paginate(20);

                    $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                        return $record->document_type->name ?? 'Other';
                    });

                    $records->setCollection(collect($groupedRecords));
                    $data['records'] = $records;

                    $statusCounts = Task::with(  'employee')
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('department_id',$employee->department_id);
                        })->select(DB::raw('status, COUNT(*) as count'))
                        ->groupBy('status')
                        ->pluck('count', 'status');

                    // Prepare data for the chart
                    $chartData = [
                        'active' => $statusCounts[1] ?? 0,
                        'pending' => $statusCounts[0] ?? 0,
                        'canceled' => $statusCounts[2] ?? 0,
                        'finished' => $statusCounts[3] ?? 0,
                    ];

                    $data['chartData'] = $chartData;


//                    dd($data['chartData']);

                }
                elseif(empty($employee->section_id) && $employee->section_id==0)
                {
                    $data['all_tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })->take(15)->get();
                    $statusCounts = Task::with(  'employee')
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })->select(DB::raw('status, COUNT(*) as count'))
                        ->groupBy('status')
                        ->pluck('count', 'status');

                    // Prepare data for the chart
                    $chartData = [
                        'active' => $statusCounts[1] ?? 0,
                        'pending' => $statusCounts[0] ?? 0,
                        'canceled' => $statusCounts[2] ?? 0,
                        'finished' => $statusCounts[3] ?? 0,
                    ];

                    $data['chartData'] = $chartData;
                    $data['employeesWithAttendance']  = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })
                        ->where('status', 'Present')
                        ->where('date', today())
                        ->count();
                    $data['employees_count'] = Employee::where('sub_dep_id',$employee->sub_dep_id)->count();

                    $data['tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })
                        ->count();
                    $data['complete_tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })
                        ->where('status', 1) // Assuming status 1 means "completed"
                        ->count();
                    $data['emp_req'] = EmployeeRequest::with('employees')
                        ->whereHas('employees', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })
                        ->count();
                    $data['payslip'] = PaySlip::with('employees')
                                            ->whereHas('employees', function ($query) use ($employee) {
                                                $query->where('sub_dep_id', $employee->sub_dep_id);
                                            })
                                            ->count();

                    $departments = Department::select('id', 'name')
                        ->withCount(['employees' => function ($query) use ($employee) {
                            // Only include departments relevant to the logged-in employee
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        }])
                        ->get()
                        ->map(function ($department) {
                            return [
                                'name' => $department->name,
                                'total_employees' => $department->employees_count, // Use the correct `withCount` alias
                            ];
                        });

                    $data['departmentNames'] = $departments->pluck('name');
                    $data['total_employees'] = $departments->pluck('total_employees');

                    $data['attend_emp'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })

                        ->where('status', 'Present')
                        ->where('date', today())
                        ->get()
                        ->take(4);

                    $data['early_arrivals'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })
                        ->where('status', 'Present')
                        ->where('date', today())
                        ->where('clock_in', '<=', '09:00:00') // Customize based on early arrival time
                        ->get();

                    // Get employees who came late (after 08:00:00)
                    $data['late_arrivals'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })
                        -> where('status', 'Present')
                        ->where('date', today())
                        ->where('clock_in', '>', '09:00:00') // Customize based on late arrival time
                        ->get();

                    $employees = Employee::where('sub_dep_id', $employee->sub_dep_id)->count();
                    $data['absent_employees'] = $employees - ($data['early_arrivals']->count() + $data['late_arrivals']->count());


                    $threeMonthsFromNow = Carbon::now()->addMonths(3);
                    $records = Document::with('document_type', 'employee')
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })
                        ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                        ->whereNotNull('end_date')
                        ->paginate(20);

                    $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                        return $record->document_type->name ?? 'Other';
                    });

                    $records->setCollection(collect($groupedRecords));
                    $data['records'] = $records;

                }
                else{
                    $data['all_tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })->take(15)->get();
                    $statusCounts = Task::with(  'employee')
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })->select(DB::raw('status, COUNT(*) as count'))
                        ->groupBy('status')
                        ->pluck('count', 'status');

                    // Prepare data for the chart
                    $chartData = [
                        'active' => $statusCounts[1] ?? 0,
                        'pending' => $statusCounts[0] ?? 0,
                        'canceled' => $statusCounts[2] ?? 0,
                        'finished' => $statusCounts[3] ?? 0,
                    ];

                    $data['chartData'] = $chartData;

                    $threeMonthsFromNow = Carbon::now()->addMonths(3);
                    $records = Document::with('document_type', 'employee')

                        ->whereBetween('end_date', [Carbon::now(), $threeMonthsFromNow])
                        ->whereNotNull('end_date')
                        ->paginate(20); // Paginate records with 10 per page

                    $groupedRecords = $records->getCollection()->groupBy(function ($record) {
                        return $record->document_type->name ?? 'Other';
                    });
                    $data['employeesWithAttendance']  = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })
                        ->where('status', 'Present')
                        ->where('date', today())
                        ->count();
                    $data['employees_count'] = Employee::where('sub_dep_id',$employee->sub_dep_id)->count();
                    $data['payslip'] = PaySlip::with('employees')
                        ->whereHas('employees', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })
                        ->count();

                    $departments = Department::select('id', 'name')
                        ->withCount(['employees' => function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id); // Filter employees by the logged-in employee's department
                        }])
                        ->get()
                        ->map(function ($department) {
                            return [
                                'name' => $department->name,
                                'total_employees' => $department->employees_count,
                            ];
                        });

                    $data['departmentNames'] = $departments->pluck('name'); // Get department names
                    $data['total_employees'] = $departments->pluck('total_employees'); // Get total employees in each department
//                    $data['employees_count'] = $departments->sum('total_employees'); // Sum of all employees in the filtered departments

                    $data['tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })
                        ->count();
                    $data['complete_tasks'] = Task::with('employee')
                        ->whereHas('employee', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })
                        ->where('status', 1) // Assuming status 1 means "completed"
                        ->count();

                    $data['emp_req'] = EmployeeRequest::with('employees')
                        ->whereHas('employees', function ($query) use ($employee) {
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        })
                        ->count();
                    $departments = Department::select('id', 'name')
                        ->withCount(['employees' => function ($query) use ($employee) {
                            // Only include departments relevant to the logged-in employee
                            $query->where('sub_dep_id', $employee->sub_dep_id);
                        }])
                        ->get()
                        ->map(function ($department) {
                            return [
                                'name' => $department->name,
                                'total_employees' => $department->employees_count, // Use the correct `withCount` alias
                            ];
                        });

                    $data['departmentNames'] = $departments->pluck('name');
                    $data['total_employees'] = $departments->pluck('total_employees');

                    $data['attend_emp'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })

                        ->where('status', 'Present')
                        ->where('date', today())
                        ->get()

                        ->take(4);

                    $data['early_arrivals'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })
                        ->where('status', 'Present')
                        ->where('date', today())
                        ->where('clock_in', '<=', '09:00:00') // Customize based on early arrival time
                        ->get();

                    // Get employees who came late (after 08:00:00)
                    $data['late_arrivals'] = AttendanceEmployee::with('employee' )
                        ->whereHas('employee',function ($query) use ($employee){
                            $query->where('sub_dep_id',$employee->sub_dep_id);
                        })
                        -> where('status', 'Present')
                        ->where('date', today())
                        ->where('clock_in', '>', '09:00:00') // Customize based on late arrival time
                        ->get();

                    $employees = Employee::where('sub_dep_id', $employee->sub_dep_id)->count();
                    $data['absent_employees'] = $employees - ($data['early_arrivals']->count() + $data['late_arrivals']->count());


                    $records->setCollection(collect($groupedRecords));
                    $data['records'] = $records;

                }
                return view('dashboard.EmployeeDashboard', $data);


            }

        }
    }

    public function getlanguvage($period)
    {


$departments = Department::select('name')
    ->withCount('employeess') // Count employees for each department
    ->get()
    ->groupBy('name') // Group by department name
    ->map(function ($group) use ($period) {
        // Apply period-based filtering
        if ($period === 'This Week') {
            $group = $group->filter(function ($employee) {
                return $employee->created_at->between(now()->startOfWeek(), now()->endOfWeek());
            });
        } elseif ($period === 'This Month') {
            $group = $group->filter(function ($employee) {
                return $employee->created_at->month === now()->month;
            });
        } elseif ($period === 'Last Week') {
            $group = $group->filter(function ($employee) {
                return $employee->created_at->between(now()->subWeek()->startOfWeek(), now()->subWeek()->endOfWeek());
            });
        }

        return [
            'name' => $group->first()->name, // Take the first instance's name
            'total_employees' => $group->count(), // Count employees after filtering
        ];
    })
    ->values(); // Reset indices

$data = [
'departmentNames' => $departments->pluck('name'), // Unique department names
'totalEmployees' => $departments->pluck('total_employees'), // Count of each department with period filter applied
];

return response()->json($data);

    }




    public function about(){
        return view('landingpage.about');
    }

    public function solutions(){
        return view('landingpage.solutions');
    }

    public function pricing(){
        return view('landingpage.pricing');
    }
}
