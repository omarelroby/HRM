<?php

namespace App\Http\Controllers;

use App\Models\AttendanceEmployee;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\IpRestrict;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class AttendanceController extends Controller
{
    public function index()
    {

        if (\Auth::user()->can('Manage Attendance')) {

            $user = Auth::user();
            if($user->type == 'company' || $user->type == 'super admin' ) {

                $attendance= AttendanceEmployee::whereHas('employee',function ($query) use ($user) {
                    $query->where('created_by',$user->id);
                })->get();
                $employees = Employee::where('created_by', '=', \Auth::user()->id)->get()->pluck('name', 'id');

            } else {
                $user = \Auth::user();
                $employees = collect();
                $attendance = collect();

                // For company/super admin with department access
                if ($user->employee && $user->employee->department_id) {
                    $department = Department::find($user->employee->department_id);

                    if ($department) {
                        // Department Manager
                        if ($user->employee->sub_dep_id == 0) {
                            $employeesIds = $department->employeess->pluck('id');

                            $attendance = AttendanceEmployee::whereIn('employee_id', $employeesIds)
                                ->whereHas('employee', function($q) use ($user) {
                                    $q->where('created_by', $user->id);
                                })->get();

                            $employees = Employee::whereIn('id', $employeesIds)
                                ->get()
                                ->pluck('name', 'id');


                            // Sub-Department Manager
                        } elseif ($user->employee->section_id == 0) {
                            $employeesIds = Employee::where('sub_dep_id', $user->employee->sub_dep_id)
                                ->pluck('id');

                            $attendance = AttendanceEmployee::whereIn('employee_id', $employeesIds)
                                ->whereHas('employee', function($q) use ($user) {
                                    $q->where('created_by', $user->id);
                                })->get();

                            $employees = Employee::whereIn('id', $employeesIds)
                                ->get()
                                ->pluck('name', 'id');

                            // Regular Company User with employee record
                        } else {
                            $attendance = AttendanceEmployee::where('employee_id', $user->employee->id)
                                ->whereHas('employee', function($q) use ($user) {
                                    $q->where('created_by', $user->id);
                                })->get();

                            $employees = Employee::where('id', $user->employee->id)
                                ->get()
                                ->pluck('name', 'id');
                        }
                    }
                } else {
                    // Fallback for users without department assignments
                    $attendance = AttendanceEmployee::whereHas('employee', function($q) use ($user) {
                        $q->where('created_by', $user->id);
                    })->get();

                    $employees = Employee::where('created_by', $user->id)
                        ->get()
                        ->pluck('name', 'id');
                }
            }

            return view('dashboard.attendance.index', compact('attendance','employees'));
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

}
