<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\TicketResource;
use App\Models\Employee;
use App\Mail\TicketSend;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use App\Traits\ApiResponser;
use App\Models\Utility;
use Illuminate\Support\Facades\Mail;
use Validator;

class TicketController extends Controller
{
    use ApiResponser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('employee_id', '=', \Auth::user()->id)->orWhere('ticket_created', \Auth::user()->id)->get();
        return TicketResource::collection($tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'    => 'required',
            'priority' => 'required',
            'end_date' => 'required',
        ]);

        if($validator->fails()) {
            return $this->error($validator->errors()->first(),200,'');
        }

        $ticket                 = new Ticket();
        $ticket->title          = $request->title;
        $ticket->title_ar       = $request->title_ar;
        $ticket->employee_id    = \Auth::user()->id;
        $ticket->priority       = $request->priority;
        $ticket->end_date       = $request->end_date;
        $ticket->ticket_code    = date('hms');
        $ticket->description    = $request->description;
        $ticket->description_ar = $request->description_ar;
        $ticket->ticket_created = \Auth::user()->id;
        $ticket->created_by     = \Auth::user()->creatorId();
        $ticket->status         = 'open';
        $ticket->save();

        //slack
        $setting = Utility::settings(\Auth::user()->creatorId());
        $emp = User::where('id', $request->employee_id)->first();
        if (isset($setting['ticket_notification']) && $setting['ticket_notification'] == 1) {
            $msg = ("New Support ticket created of") . ' ' . $request->priority . ' ' . __("priority for") . ' ' . $emp->name . ' ';
            Utility::send_slack_msg($msg);
        }

        //telegram
        $setting = Utility::settings(\Auth::user()->creatorId());
        $emp = User::where('id', $request->employee_id)->first();
        if (isset($setting['telegram_ticket_notification']) && $setting['telegram_ticket_notification'] == 1) {
            $msg = ("New Support ticket created of") . ' ' . $request->priority . ' ' . __("priority for") . ' ' . $emp->name . ' ';
            Utility::send_telegram_msg($msg);
        }

         // twilio 
        $setting = Utility::settings(\Auth::user()->creatorId());
        $emp = Employee::where('id', $request->employee_id = \Auth::user()->id)->first();
        if(isset($setting['twilio_ticket_notification']) && $setting['twilio_ticket_notification'] == 1) {
            $msg = ("New Support ticket created of") . ' ' . $request->priority . ' ' . __("priority for") . ' ' . $emp->name . ' ';
            Utility::send_twilio_msg($emp->phone,$msg);
         }


        $setings = Utility::settings();
        if($setings['ticket_create'] == 1) {
            $employee      = Employee::where('user_id', '=', $ticket->employee_id)->first();
            $ticket->name  = $employee->name;
            $ticket->email = $employee->email;
            try {
                Mail::to($ticket->email)->send(new TicketSend($ticket));
            } catch (\Exception $e) {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }
        }

        return $this->success('', __('messages.data_inserted'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'    => 'required',
            'priority' => 'required',
            'end_date' => 'required',
        ]);

        if($validator->fails()) {
            return $this->error($validator->errors()->first(),200,'');
        }

        $ticket                 = Ticket::findorfail($id);
        $ticket->title          = $request->title;
        $ticket->title_ar       = $request->title_ar;
        $ticket->employee_id    = \Auth::user()->id;
        $ticket->priority       = $request->priority;
        $ticket->end_date       = $request->end_date;
        $ticket->description    = $request->description;
        $ticket->description_ar = $request->description_ar;
        $ticket->status         = $request->status;
        $ticket->save();

        return $this->success('', __('messages.data_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket  = Ticket::findorfail($id);
        $ticket->delete();
        $ticketId = TicketReply::select('id')->where('ticket_id', $ticket->id)->get()->pluck('id');
        TicketReply::whereIn('id', $ticketId)->delete();
        return $this->success('', __('messages.data_deleted'));
    }
}
