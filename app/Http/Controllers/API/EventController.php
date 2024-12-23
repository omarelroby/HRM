<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\EventResource;
use App\Mail\sendemail;
use Validator;
use App\Models\User;
use App\Models\FCMToken;
use App\Models\Employee;
use App\Models\Event;
use App\Traits\ApiResponser;

class EventController extends Controller
{
    use ApiResponser;

   public function index(){
        $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get();
        $events    = Event::where('created_by', '=', \Auth::user()->creatorId())->get();

        $arrEvents = [];
        foreach ($events as $event) {
            $arr['id']    = $event['id'];
            $arr['title'] = $event['title'];
            $arr['start'] = $event['start_date'];
            $arr['end']   = $event['end_date'];
            $arr['backgroundColor'] = $event['color'];
            $arr['borderColor']     = "#fff";
            $arr['textColor']       = "white";
            $arr['url']             = route('event.edit', $event['id']);
            $arrEvents[] = $arr;
        }
        $arrEvents = str_replace('"[', '[', str_replace(']"', ']', json_encode($arrEvents)));
        
        return EventResource::collection($events);
   }

}
