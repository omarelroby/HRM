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
        ->selectRaw('SUM(employeess_count) as total_employees') // Sum employee counts for each department name
        ->withCount('employeess') // Count employees per department
        ->groupBy('name') // Group by department name to avoid duplicates
        ->get();

        $departmentNames = $departments->pluck('name'); // Get unique department names
        $employeeCounts = $departments->pluck('total_employees'); // Get the summed employee counts

        $data['departmentNames'] = $departmentNames;
        $data['employeeCounts'] = $employeeCounts;
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
