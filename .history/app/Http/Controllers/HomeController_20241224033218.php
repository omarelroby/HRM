<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\AccountList;
use App\Models\Announcement;
use App\Models\AttendanceEmployee;
use App\Models\CompanyJobRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeRequest;
use App\Models\Event;
use App\Models\JobApplication;
use App\Models\Laborhirecompany;
use App\Models\LandingPageSection;
use App\Models\Meeting;
use App\Models\Order;
use App\Models\Payees;
use App\Models\Payer;
use App\Models\Plan;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\Trainer;
use App\Models\User;
use App\Models\Utility;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Get departments with employee count
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

            // Get total number of employees
            $data['employees'] = Employee::count();

            // Get employees with status 'Present' today
            $data['employeesWithAttendance'] = AttendanceEmployee::where('status', 'Present')
                ->where('date', today())
                ->count();

            // Get other counts
            $data['complete_tasks'] = Task::where('status', 1)->count();
            $data['tasks'] = Task::count();
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

            // dd($data['late_arrivals']);

            return view('dashboard.dashboard', $data);
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
