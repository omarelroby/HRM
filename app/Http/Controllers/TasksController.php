<?php

namespace App\Http\Controllers;

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

class TasksController extends Controller
{
    public function index()
    {

        if (\Auth::user()->can('Manage tasks')) {

            $user = Auth::user();
            if($user->type == 'company' || $user->type == 'super admin' ) {

                $tasks= Task::whereHas('employee',function ($query) use ($user) {
                    $query->where('created_by',$user->id);
                })->get();
                $employees = Employee::where('created_by', '=', \Auth::user()->id)->get()->pluck('name', 'id');

            } else {
                $tasks= Task::whereHas('employee',function ($query) use ($user) {
                    $query->where('created_by',$user->id);
                })->get();
                $employees = Employee::where('created_by', '=', \Auth::user()->id)->get()->pluck('name', 'id');

            }

            return view('dashboard.tasks.index', compact('tasks','employees'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
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
        // Find the ticket by ID
        $task = Task::find($id);

        // Check if the ticket exists
        if (!$task) {
            return redirect()->back()->with('error', __('Task not found.'));
        }

        // Check if the user has permission to edit the ticket
        if (\Auth::user()->can('Edit Ticket')) {
            // Validate the input data
            $validator = \Validator::make(
                $request->all(),
                [
                    'employee_id' => 'required|exists:employees,id',
                    'name' => 'required|string|max:255',
                    'start_date' => 'required|date',
                    'due_date' => 'required|date|after_or_equal:start_date',
                    'status' => 'required|in:0,1,2,3', // Assuming these are the only valid values
                    'priority' => 'required|in:0,1,2,3', // Assuming these are the only valid values
                    'note' => 'nullable|string|max:1000',                ]
                );

            // Return validation errors, if any
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }

            $task->employee_id = $request->employee_id;
            $task->name = $request->name;
            $task->start_date = $request->start_date;
            $task->due_date = $request->due_date;
            $task->status = $request->status;
            $task->priority = $request->priority;
            $task->note = $request->note;
            $task->created_by = auth()->user()->id;
            $task->save();

            // Redirect to the ticket index with a success message
            return redirect()->route('tasks.index')->with('success', __('Task successfully updated.'));
        } else {
            // Deny access if the user doesn't have permission
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Ticket $ticket)
    {
        return redirect()->route('ticket.index');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        if (\Auth::user()->can('Edit tasks')) {
            $employees = Employee::where('created_by', '=', \Auth::user()->id)->get()->pluck('name', 'id');

            return view('dashboard.tasks.edit', compact('task', 'employees'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(Task $task)
    {
        if (\Auth::user()->can('Delete tasks')) {
                $task->delete();
                return redirect()->route('tasks.index')->with('error', __('Task successfully deleted.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }

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
