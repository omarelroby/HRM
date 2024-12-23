<?php

namespace App\Http\Controllers;

use App\Models\AccountList;
use App\Models\Announcement;
use App\Models\AttendanceEmployee;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Event;
use App\Models\LandingPageSection;
use App\Models\Meeting;
use App\Models\Order;
use App\Models\Payees;
use App\Models\Payer;
use App\Models\Plan;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

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


        $totalEmployees = Employee::count(); // Total number of employees
        $totalWorkdays = 0;
        $totalAbsences = 0;


        $totalEmployees = Employee::count(); // Total number of employees
        $totalWorkdaysSum = 0; // Total possible workdays
        $totalAttendedDays = 0; // Total attended workdays

        $employees = Employee::all(); // Get all employees

        foreach ($employees as $employee) {

            $workdays = Employee::workdays($employee->id); // Get workdays for this employee
            $absences = json_decode(Employee::absence($employee->id)); // Get absences for this employee
            $absencesCount = count($absences); // Number of absence days

            $attendedDays = $workdays - $absencesCount; // Attended days for this employee

            $totalWorkdaysSum += $workdays ?? 0; // Sum all workdays
            $totalAttendedDays += $attendedDays ?? 0; // Sum all attended days
        }
        dd()

        // Calculate percentage
        if ($totalWorkdaysSum > 0) {
            $attendancePercentage = ($totalAttendedDays / $totalWorkdaysSum) * 100;
        } else {
            $attendancePercentage = 0; // Avoid division by zero
        }

        // Result
        $data = [
            'totalEmployees' => $totalEmployees,
            'totalPossibleWorkdays' => $totalWorkdaysSum,
            'totalAttendedWorkdays' => $totalAttendedDays,
            'attendancePercentage' => round($attendancePercentage, 2), // Round to 2 decimal places
        ];

        dd($data['totalAttendedWorkdays']);

        return view('dashboard.dashboard', $data);
        }

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
