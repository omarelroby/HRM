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
        if(Auth::check())
        {
           
            if (Auth::check()) {
                $user = Auth::user();
            
                // Get departments with the 'name' column and their associated employees
                $data['departments'] = Department::select('name') // Only select 'name' column
                                                  ->with('employeess') // Eager load employees
                                                  ->get(); // Retrieve all departments
            
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
