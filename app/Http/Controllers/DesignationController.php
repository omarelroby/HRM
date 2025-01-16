<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Section;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {

        if(\Auth::user()->can('Manage Designation'))
        {
            $designations = Designation::where('created_by', '=', \Auth::user()->creatorId())->get();
            $sections = Section::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');



            return view('dashboard.designation.index', compact('designations','sections'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Designation'))
        {
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->get();
            $departments = $departments->pluck('name', 'id');

            return view('designation.create', compact('departments'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {

        if(\Auth::user()->can('Create Designation'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'section_id' => 'required',
                                   'name' => 'required|max:20',
                                   'name_ar' => 'required|max:20',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $designation                = new Designation();
            $designation->section_id = $request->section_id;
            $designation->name          = $request->name;
            $designation->name_ar          = $request->name_ar;
            $designation->created_by    = \Auth::user()->creatorId();

            $designation->save();

            return redirect()->route('designation.index')->with('success', __('Designation  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Designation $designation)
    {
        return redirect()->route('designation.index');
    }

    public function edit(Designation $designation)
    {

        if(\Auth::user()->can('Edit Designation'))
        {
            if($designation->created_by == \Auth::user()->creatorId())
            {

                $sections= Section::where('id', $designation->section_id)->first();
                $sections = $sections->pluck('name', 'id');

                return view('dashboard.designation.edit', compact('designation', 'sections'));
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

    public function update(Request $request, Designation $designation)
    {
        if(\Auth::user()->can('Edit Designation'))
        {
            if($designation->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'section_id' => 'required',
                                       'name' => 'required|max:20',
                                       'name_ar' => 'required|max:20',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
                $designation->name          = $request->name;
                $designation->name_ar          = $request->name_ar;
                $designation->section_id = $request->section_id;
                $designation->save();

                return redirect()->route('designation.index')->with('success', __('Designation  successfully updated.'));
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

    public function destroy(Designation $designation)
    {
        if(\Auth::user()->can('Delete Designation'))
        {
            if($designation->created_by == \Auth::user()->creatorId())
            {
                $designation->delete();

                return redirect()->route('designation.index')->with('success', __('Designation successfully deleted.'));
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
