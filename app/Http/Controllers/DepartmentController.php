<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Department')||(auth()->user()->type='super admin'))
        {
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())
                        ->orWhere('created_by',1)
                        ->get();
            $branch    = Branch::where('created_by', \Auth::user()->creatorId())
                        ->orWhere('created_by',1)
                        ->get()->pluck('name', 'id');
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('dashboard.department.index', compact('departments','branch','employees'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Department')||(auth()->user()->type='super admin'))
        {
            $branch    = Branch::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            return view('department.create', compact('branch','employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Department') ||(auth()->user()->type='super admin'))
        {
            $validator = \Validator::make(
            $request->all(),
            [
                 'branch_id'   => 'required',
                'name'        => 'required',
                'name_ar'     => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $department               = new Department();
             $department->branch_id    = $request->branch_id;
            $department->name         = $request->name;
            $department->name_ar      = $request->name_ar;
            $department->created_by   = \Auth::user()->creatorId();
            $department->save();

            return redirect()->route('department.index')->with('success', __('Department  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Department $department)
    {
        return redirect()->route('department.index');
    }

    public function edit(Department $department)
    {
        if(\Auth::user()->can('Edit Department') ||(auth()->user()->type='super admin'))
        {
            if($department->created_by == \Auth::user()->creatorId() || $department->created_by == 1)
            {
                $branch    = Branch::where('created_by', \Auth::user()->creatorId())
                            ->orWhere('created_by',1)
                            ->get()->pluck('name', 'id');
                $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                return view('dashboard.department.edit', compact('department', 'branch','employees'));
            }
            else
            {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Department $department)
    {
        if(\Auth::user()->can('Edit Department') ||(auth()->user()->type='super admin'))
        {
            if($department->created_by == \Auth::user()->creatorId() || $department->created_by == 1)
            {
                $validator = \Validator::make(
                $request->all(),
                [

                    'branch_id'   => 'required',
                    'name'        => 'required',
                    'name_ar'     => 'required',
                ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                // $department->employee_id  = $request->employee_id;
                $department->branch_id    = $request->branch_id;
                $department->name         = $request->name;
                $department->name_ar      = $request->name_ar;
                $department->save();

                return redirect()->route('department.index')->with('success', __('Department successfully updated.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Department $department)
    {
        if(\Auth::user()->can('Delete Department') ||(auth()->user()->type='super admin'))
        {
            if($department->created_by == \Auth::user()->creatorId() || $department->created_by == 1)
            {
                $department->delete();
                return redirect()->route('department.index')->with('success', __('Department successfully deleted.'));
            }
            else
            {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
