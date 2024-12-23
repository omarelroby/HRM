<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\MeetingResource;
use App\Mail\sendemail;
use Validator;
use App\Models\User;
use App\Models\FCMToken;
use App\Models\Employee;
use App\Models\Meeting;
use App\Traits\ApiResponser;

class MettingController extends Controller
{
    use ApiResponser;

   public function index(){
        $current_employee = Employee::where('user_id', '=', \Auth::user()->id)->first();
        $meetings         = Meeting::orderBy('meetings.id', 'desc')
        ->leftjoin('meeting_employees', 'meetings.id', '=', 'meeting_employees.meeting_id')
        ->where('meeting_employees.employee_id', '=', $current_employee->id)
        ->orWhere(function ($q) {
            $q->where('meetings.department_id', '["0"]')
                ->where('meetings.employee_id', '["0"]');
        })->get();
        
        return MeetingResource::collection($meetings);
   }

}
