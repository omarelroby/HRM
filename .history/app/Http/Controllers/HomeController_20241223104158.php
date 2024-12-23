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

        // Get the attendance movement
        $attendancemovement = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())
            ->whereNull('status')
            ->first();

        if ($attendancemovement) {
            // Format the movement dates
            $startMovementDate = Carbon::parse($attendancemovement->start_movement_date)->format('Y-m-d');
            $endMovementDate = Carbon::parse($attendancemovement->end_movement_date);

            // Iterate through all employees
            $employees = Employee::all();

            foreach ($employees as $employee) {
                // Adjust start date based on employee's join date
                $employeeStartDate = date("Y-m-d", strtotime($employee->Join_date_gregorian));
                $startDate = $startMovementDate < $employeeStartDate ? $employeeStartDate : $startMovementDate;

                // Calculate total days in the range
                $diffInDays = $endMovementDate->diffInDays($startDate) + 1;

                // Calculate absences for this employee
                $absences = Absence::where('employee_id', $employee->id)
                    ->where('type', '!=', 'V') // Exclude vacation type absences
                    ->whereBetween('start_date', [$startDate, $endMovementDate])
                    ->sum('number_of_days');

                // Calculate workdays for this employee
                $workdays = $diffInDays - $absences;

                // Add to total workdays (ensure no negative workdays)
                $totalWorkdays += max($workdays, 0);
            }
            dd($totalWorkdays);
        }

        // Return the total workdays

            }


    return view('dashboard.dashboard', $data);
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
