<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\AccountList;
use App\Models\Announcement;
use App\Models\AttendanceEmployee;
use App\Models\Department;
use App\Models\Employee;
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
        $data['employees'] = Employee::count(); // Get all employees
        $data['employeesWithAttendance'] = AttendanceEmployee::where('status', 'Present')
                                                               ->where('date',today())
                                                               ->count();
        $data['complete_tasks'] = Task::where('status',1)->count();
        $data['tasks'] = Task::count();
        $data['job_app'] = JobApplication::count();
        $data['labor_hiring'] = Laborhirecompany::count();
        $data['attend_emp']

        return view('dashboard.dashboard', $data);
        }

    }

    public function getlanguvage($period)
    {
        dd($period);

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
