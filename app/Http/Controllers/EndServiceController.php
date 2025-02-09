<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Mail\TicketSend;
use App\Models\EndService;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EndServiceController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        if($user->type == 'company' || $user->type == 'super admin' ) {

            $services= EndService::whereHas('employee',function ($query) use ($user) {
                $query->where('created_by',$user->id);
            })->get();
            $employees = Employee::where('created_by', '=', \Auth::user()->id)->get()->pluck('name', 'id');

        } else {
            $department = Department::findOrFail(Auth::user()->employee->department_id);
            if ($department) {
                // Check if the employee is a department manager
                if (\Auth::user()->employee->department_id == $department->id && \Auth::user()->employee->sub_dep_id == 0) {
                    // Show all employees in the department
                    $employeesIds = $department->employeess->pluck('id');
                    $services = EndService::whereIn('employee_id', $employeesIds)->get();
                    $employees = Employee::whereIn('id', $employeesIds)->get()->pluck('name', 'id');


                }
                // Check if the employee is a sub-department manager
                elseif (\Auth::user()->employee->section_id == 0) {
                    // Show only employees in the sub-department
                    $employeesIds = Employee::where('sub_dep_id', \Auth::user()->employee->sub_dep_id)->pluck('id');
                    $services = EndService::whereIn('employee_id', $employeesIds)->get();
                    $employees = Employee::whereIn('id', $employeesIds)->get()->pluck('name', 'id');
                }
                else{
                    $services = EndService::where('employee_id',  \Auth::user()->employee->id)->get();
                    $employees = Employee::where('id',\Auth::user()->employee->id)->get()->pluck('name', 'id');
                }
            }


        }
        return view('dashboard.end_service.index', compact('services','employees'));



    }
    public function dismissal()
    {
        $employees = Employee::where('created_by', '=', \Auth::user()->id)->withSum('allowances', 'amount')->get();

        return view('dashboard.end_service.dismissal', compact( 'employees'));
    }
    public function resignation()
    {
        $employees = Employee::where('created_by', '=', \Auth::user()->id)->withSum('allowances', 'amount')->get();

        return view('dashboard.end_service.resignation', compact( 'employees'));
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


            $validator = \Validator::make(
                $request->all(),
                [
                    'employee_id' => 'required|exists:employees,id',
                     'work_end_date' => 'required|date',
                  ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
             $employee=Employee::withSum('allowances', 'amount')->findOrFail($request->employee_id) ;
             if($request->type=='dismissal')
            {
                 if($request->check_basic_salary==1)
                {
                    $salary=$employee->salary;
                }
                else
                {
                    $salary=0;
                }
                if($request->check_allownce==1)
                {
                    $allownce=$employee->allowances_sum_amount;
                }
                else
                {
                    $allownce=0;
                }
                $value=$salary+$allownce;
                $service=new EndService();
                $service->employee_id=$employee->id;
                $service->work_start_date=$employee->work_start_date;
                $service->work_end_date=$request->work_end_date;
                $service->years=$request->years;
                $service->months=$request->months;
                $service->days=$request->days;
                $service->allownce=$allownce;
                $service->salary=$salary;
                $service->total_salary=$value;
                $service->type=$request->type;
                if($request->years<5)
                {
                    $service->amount=$value/2;
                }
                elseif($request->years==5)
                {
                    $years=($value/2)*5;
                    if($request->months>0)
                    {
                        $months=($value/12)*$request->months;
                    }
                    else{
                        $months=0;
                    }
                    if($request->days>0)
                    {
                        $days=($value/360)*$request->days;
                    }
                    else
                    {
                        $days=0;
                    }

                    $service->amount=$years+$months+$days;
                }
                elseif ($request->years>5)
                {
                    $firstFive=($value/2)*5;
                    $second=($request->years%5)*$value;
                    if($request->months>0)
                    {
                        $months=($value/12)*$request->months;
                    }
                    else{
                        $months=0;
                    }
                    if($request->days>0)
                    {
                        $days=($value/360)*$request->days;
                    }
                    else
                    {
                        $days=0;
                    }

                    $service->amount=$firstFive+$second+$months+$days;
                }
               $service->save();

            }
            else{
                if($request->check_basic_salary==1)
                {
                    $salary=$employee->salary;
                }
                else
                {
                    $salary=0;
                }
                if($request->check_allownce==1)
                {
                    $allownce=$employee->allowances_sum_amount;
                }
                else
                {
                    $allownce=0;
                }
                $value=$salary+$allownce;
                $service=new EndService();
                $service->employee_id=$employee->id;
                $service->work_start_date=$employee->work_start_date;
                $service->work_end_date=$request->work_end_date;
                $service->years=$request->years;
                $service->months=$request->months;
                $service->days=$request->days;
                $service->allownce=$allownce;
                $service->salary=$salary;
                $service->total_salary=$value;
                $service->type=$request->type;
                if($request->years<2)
                {
                    $service->amount=0;
                }
                elseif($request->years>2 && $request->years<=5)
                {
                    $years=($value/2)*5;
                    if($request->months>0)
                    {
                        $months=($value/12)*$request->months;
                    }
                    else{
                        $months=0;
                    }
                    if($request->days>0)
                    {
                        $days=($value/360)*$request->days;
                    }
                    else
                    {
                        $days=0;
                    }

                    $service->amount=($years+$months+$days)/3;

                }
                elseif ($request->years>5 && $request->years<=10)
                {
                    $firstFive=($value/2)*5;
                    $second=($request->years%5)*$value;
                    if($request->months>0)
                    {
                        $months=($value/12)*$request->months;
                    }
                    else{
                        $months=0;
                    }
                    if($request->days>0)
                    {
                        $days=($value/360)*$request->days;
                    }
                    else
                    {
                        $days=0;
                    }
                    $total=$firstFive+$second+$months+$days;
                    $service->amount=($total/3)*2;
                }
                else
                {

                    $firstFive=($value/2)*5;
                    $second=($request->years%5)*$value;
                    if($request->months>0)
                    {
                        $months=($value/12)*$request->months;
                    }
                    else{
                        $months=0;
                    }
                    if($request->days>0)
                    {
                        $days=($value/360)*$request->days;
                    }
                    else
                    {
                        $days=0;
                    }

                    $service->amount= $firstFive+$second+$months+$days ;
                }
                $service->save();
            }

            return redirect()->route('end-service.index')->with('success', __('End Service Gratuaty successfully created.'));

    }
//    public function update(Request $request, $id)
//    {
//        // Find the ticket by ID
//        $task = Task::find($id);
//
//        // Check if the ticket exists
//        if (!$task) {
//            return redirect()->back()->with('error', __('Task not found.'));
//        }
//
//        // Check if the user has permission to edit the ticket
//        if (\Auth::user()->can('Edit Ticket')) {
//            // Validate the input data
//            $validator = \Validator::make(
//                $request->all(),
//                [
//                    'employee_id' => 'required|exists:employees,id',
//                    'name' => 'required|string|max:255',
//                    'start_date' => 'required|date',
//                    'due_date' => 'required|date|after_or_equal:start_date',
//                    'status' => 'required|in:0,1,2,3', // Assuming these are the only valid values
//                    'priority' => 'required|in:0,1,2,3', // Assuming these are the only valid values
//                    'note' => 'nullable|string|max:1000',                ]
//                );
//
//            // Return validation errors, if any
//            if ($validator->fails()) {
//                return redirect()->back()->with('error', $validator->errors()->first());
//            }
//
//            $task->employee_id = $request->employee_id;
//            $task->name = $request->name;
//            $task->start_date = $request->start_date;
//            $task->due_date = $request->due_date;
//            $task->status = $request->status;
//            $task->priority = $request->priority;
//            $task->note = $request->note;
//            $task->created_by = auth()->user()->id;
//            $task->save();
//
//            // Redirect to the ticket index with a success message
//            return redirect()->route('tasks.index')->with('success', __('Task successfully updated.'));
//        } else {
//            // Deny access if the user doesn't have permission
//            return redirect()->back()->with('error', __('Permission denied.'));
//        }
//    }

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


    public function destroy(EndService $endService)
    {

        $endService->delete();
        return redirect()->route('end-service.index')->with('error', __('End Service successfully deleted.'));


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
