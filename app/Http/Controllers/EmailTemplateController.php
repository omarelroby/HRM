<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmailTemplate;
use App\Models\Employee;
use App\Mail\TicketSend;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->type == 'super admin' ) {

            $emails= EmailTemplate::get();
            return view('dashboard.email_template.index', compact('emails'));
         }
    }

    public function create()
    {
        if (\Auth::user()->can('Create tasks')) {
            $employees = User::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 'employee')->get()->pluck('name', 'id');
            return view('ticket.create', compact('employees'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if (\Auth::user()->can('Create tasks')) {

            $validator = \Validator::make(
                $request->all(),
                [
                    'employee_id' => 'required|exists:employees,id',
                    'name' => 'required|string|max:255',
                    'start_date' => 'required|date',
                    'due_date' => 'required|date|after_or_equal:start_date',
                    'status' => 'required|in:0,1,2,3', // Assuming these are the only valid values
                    'priority' => 'required|in:0,1,2,3', // Assuming these are the only valid values
                    'note' => 'nullable|string|max:1000',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }


            $task = new Task();
            $task->employee_id = $request->employee_id;
            $task->name = $request->name;
            $task->start_date = $request->start_date;
            $task->due_date = $request->due_date;
            $task->status = $request->status;
            $task->priority = $request->priority;
            $task->note = $request->note;
            $task->created_by = auth()->user()->id;

            // Save the task
            $task->save();

            // Redirect with a success message
            return redirect()->route('tasks.index')->with('success', __('Task successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    public function update(Request $request, $id)
    {
         $email = EmailTemplate::find($id);

         if (!$email) {
            return redirect()->back()->with('error', __('Email Template not found.'));
        }

        $validator = \Validator::make(
            $request->all(),
            [
                'subject' => 'required']
             );

        // Return validation errors, if any
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $email->subject = $request->subject;
        $email->message = $request->message;
        $email->message_ar = $request->message_ar;
        $email->save();
         return redirect()->route('email-template.index')->with('success', __('Email Template successfully updated.'));

    }

    public function show(Ticket $ticket)
    {
        return redirect()->route('ticket.index');
    }

    public function edit($id)
    {
         $email = EmailTemplate::find($id);
            return view('dashboard.email_template.edit', compact('email'));

    }


    public function destroy(EmailTemplate $emailTemplate)
    {
            $emailTemplate->delete();
            return redirect()->route('email-template.index')->with('error', __('Email successfully deleted.'));


    }

    public function reply($ticket)
    {
        $ticketreply = TicketReply::where('ticket_id', '=', $ticket)->orderBy('id', 'DESC')->get();
        $ticket      = Ticket::find($ticket);
        if (\Auth::user()->type == 'employee') {
            $ticketreplyRead = TicketReply::where('ticket_id', $ticket->id)->where('created_by', '!=', \Auth::user()->id)->update(['is_read' => '1']);
        } else {
            $ticketreplyRead = TicketReply::where('ticket_id', $ticket->id)->where('created_by', '!=', \Auth::user()->creatorId())->update(['is_read' => '1']);
        }


        return view('dashboard.ticket.reply', compact('ticket', 'ticketreply'));
    }

    public function changereply(Request $request)
    {

        $validator = \Validator::make(
            $request->all(),
            [
                'description' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $ticket = Ticket::find($request->ticket_id);

        $ticket_reply              = new TicketReply();
        $ticket_reply->ticket_id   = $request->ticket_id;
        $ticket_reply->employee_id = $ticket->employee_id;
        $ticket_reply->description = $request->description;
        if (\Auth::user()->type == 'employee') {
            $ticket_reply->created_by = Auth::user()->id;
        } else {
            $ticket_reply->created_by = Auth::user()->creatorId();
        }

        $ticket_reply->save();

        return redirect()->route('ticket.reply', $ticket_reply->ticket_id)->with('success', __('Ticket Reply successfully Send.'));
    }
}
