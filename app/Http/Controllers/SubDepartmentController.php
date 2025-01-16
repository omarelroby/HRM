<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Department;
use App\Models\SubDepartment;
use Illuminate\Http\Request;

class SubDepartmentController extends Controller
{
    public function index()
    {

        $sub_deps = SubDepartment::where('created_by', '=', \Auth::user()->creatorId())
            ->orWhere('created_by', 1)
            ->get();
        $departments = Department::where('created_by', \Auth::user()->creatorId())
            ->orWhere('created_by', 1)
            ->get()->pluck('name', 'id');
        $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        return view('dashboard.sub_department.index', compact('departments', 'sub_deps', 'employees'));

    }

    public function create()
    {

        $departments = Department::where('created_by', \Auth::user()->creatorId())
            ->orWhere('created_by', 1)
            ->get()->pluck('name', 'id');
        $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        return view('sub_department.create', compact('departments', 'employees'));

    }

    public function store(Request $request)
    {


        $validator = \Validator::make(
            $request->all(),
            [
                'department_id' => 'required',
                'name' => 'required|max:20',
                'name_ar' => 'required|max:20',
            ]);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $sub_department = new SubDepartment();
        $sub_department->department_id = $request->department_id;
        $sub_department->name = $request->name;
        $sub_department->name_ar = $request->name_ar;
        $sub_department->created_by = \Auth::user()->creatorId();
        $sub_department->save();

        return redirect()->route('sub-department.index')->with('success', __('Sub Department  successfully created.'));

    }

    public function show(Department $department)
    {
        return redirect()->route('department.index');
    }

    public function edit(SubDepartment $subDepartment)
    {

        $departments = Department::where('created_by', \Auth::user()->creatorId())
            ->orWhere('created_by', 1)
            ->get()->pluck('name', 'id');
        $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        return view('dashboard.sub_department.edit', compact('subDepartment', 'departments', 'employees'));
    }

    public function update(Request $request, SubDepartment $subDepartment)
    {


        $validator = \Validator::make(
            $request->all(),
            [

                'department_id' => 'required',
                'name' => 'required|max:20',
                'name_ar' => 'required|max:20',
            ]);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $subDepartment->department_id = $request->department_id;
        $subDepartment->name = $request->name;
        $subDepartment->name_ar = $request->name_ar;
        $subDepartment->save();

        return redirect()->route('sub-department.index')->with('success', __('Department successfully updated.'));


    }


    public function destroy(SubDepartment $subDepartment)
    {
        $subDepartment->delete();
        return redirect()->route('sub-department.index')->with('success', __('Department successfully deleted.'));
    }
}
