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
        $startTime = Utility::getValByName('company_start_time');
        $endTime   = Utility::getValByName('company_end_time');

        $employees = Employee::where('user_id', $user->department_id)->pluck('id');
        foreach($employees as $employee)
        {
            $present = 'present-' . $employee;
            $in      = 'in-' . $employee;
            $out     = 'out-' . $employee;
            $atte[]  = $present;
            if($request->$present == 'on')
            {
                $in  = date("H:i:s", strtotime($request->$in));
                $out = date("H:i:s", strtotime($request->$out));

                $totalLateSeconds = strtotime($in) - strtotime($startTime);

                $hours = floor($totalLateSeconds / 3600);
                $mins  = floor($totalLateSeconds / 60 % 60);
                $secs  = floor($totalLateSeconds % 60);
                $late  = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);

                //early Leaving
                $totalEarlyLeavingSeconds = strtotime($endTime) - strtotime($out);
                $hours                    = floor($totalEarlyLeavingSeconds / 3600);
                $mins                     = floor($totalEarlyLeavingSeconds / 60 % 60);
                $secs                     = floor($totalEarlyLeavingSeconds % 60);
                $earlyLeaving             = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);


                if(strtotime($out) > strtotime($endTime))
                {
                    //Overtime
                    $totalOvertimeSeconds = strtotime($out) - strtotime($endTime);
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

                if(!empty($attendance))
                {
                    $employeeAttendance = $attendance;
                }
                else
                {
                    $employeeAttendance              = new AttendanceEmployee();
                    $employeeAttendance->employee_id = $employee;
                    $employeeAttendance->created_by  = \Auth::user()->creatorId();
                }

                $employeeAttendance->date          = $request->date;
                $employeeAttendance->status        = 'Present';
                $employeeAttendance->clock_in      = $in;
                $employeeAttendance->clock_out     = $out;
                $employeeAttendance->late          = $late;
                $employeeAttendance->early_leaving = ($earlyLeaving > 0) ? $earlyLeaving : '00:00:00';
                $employeeAttendance->overtime      = $overtime;
                $employeeAttendance->total_rest    = '00:00:00';
                $employeeAttendance->save();

            }
            else
            {
                $attendance = AttendanceEmployee::where('employee_id', '=', $employee)->where('date', '=', $request->date)->first();

                if(!empty($attendance))
                {
                    $employeeAttendance = $attendance;
                }
                else
                {
                    $employeeAttendance              = new AttendanceEmployee();
                    $employeeAttendance->employee_id = $employee;
                    $employeeAttendance->created_by  = \Auth::user()->creatorId();
                }

                $employeeAttendance->status        = 'Leave';
                $employeeAttendance->date          = $request->date;
                $employeeAttendance->clock_in      = '00:00:00';
                $employeeAttendance->clock_out     = '00:00:00';
                $employeeAttendance->late          = '00:00:00';
                $employeeAttendance->early_leaving = '00:00:00';
                $employeeAttendance->overtime      = '00:00:00';
                $employeeAttendance->total_rest    = '00:00:00';
                $employeeAttendance->save();
            }
        }
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
