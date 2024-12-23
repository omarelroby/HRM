<?php

namespace App\Http\Controllers;

use App\Models\Absence;
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
use GuzzleHttp\Client;
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


        $totalEmployees = Employee::count(); // Total number of employees
        $totalWorkdays = 0;
        $totalAbsences = 0;


        $totalEmployees = Employee::count(); // Total number of employees
        $totalWorkdaysSum = 0; // Total possible workdays
        $totalAttendedDays = 0; // Total attended workdays

        $employees = Employee::all(); // Get all employees

        foreach ($employees as $employee) {

            $workdays = Employee::workdays($employee->id); // Get workdays for this employee
            $absencesCount = Absence::where('employee_id', '=', $employee->id)->sum('number_of_days');
            $totalAbsences += $absencesCount; // Sum all absences
            $totalWorkdaysSum += $workdays ?? 0; // Sum all workdays
        }
        $totalAttendedDays  = $totalWorkdaysSum - $totalAbsences; // Sum all attended days
        $data = [
            'totalAttendedDays' => $totalAttendedDays,
        ];
        'totalWorkdaysSum' => $totalWorkdaysSum,

        dd($data);


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
