<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Section;
use App\Models\SubDepartment;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {

        $sections= Section::where('created_by', '=', \Auth::user()->creatorId())
                    ->orWhere('created_by',1)
                    ->get();
        $sub_deps  = SubDepartment::where('created_by', \Auth::user()->creatorId())
                    ->orWhere('created_by',1)
                    ->get()->pluck('name', 'id');
        $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        return view('dashboard.section.index', compact('sections','sub_deps','employees'));

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

            $validator = \Validator::make(
            $request->all(),
            [
                 'sub_dep_id'   => 'required',
                'name'        => 'required',
                'name_ar'     => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

        $section               = new Section();
        $section->sub_dep_id    = $request->sub_dep_id;
        $section->name         = $request->name;
        $section->name_ar      = $request->name_ar;
        $section->created_by   = \Auth::user()->creatorId();
        $section->save();

            return redirect()->route('section.index')->with('success', __('Section  successfully created.'));


    }

    public function show(Department $department)
    {
        return redirect()->route('department.index');
    }

    public function edit(Section $section)
    {

        $sub_deps = SubDepartment::where('created_by', \Auth::user()->creatorId())
                    ->orWhere('created_by',1)
                    ->get()->pluck('name', 'id');
        $employees = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        return view('dashboard.section.edit', compact('section', 'sub_deps','employees'));


    }

    public function update(Request $request, Section $section)
    {

                $validator = \Validator::make(
                $request->all(),
                [

                    'sub_dep_id'   => 'required',
                    'name'        => 'required',
                    'name_ar'     => 'required',
                ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                // $department->employee_id  = $request->employee_id;
        $section->sub_dep_id    = $request->sub_dep_id;
        $section->name         = $request->name;
        $section->name_ar      = $request->name_ar;
        $section->save();
        return redirect()->route('section.index')->with('success', __('Section successfully updated.'));
    }

    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('section.index')->with('success', __('Department successfully deleted.'));
    }
}
