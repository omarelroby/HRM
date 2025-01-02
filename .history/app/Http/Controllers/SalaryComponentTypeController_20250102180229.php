<?php

namespace App\Http\Controllers;

use App\Models\Salary_components_type;
use Illuminate\Http\Request;

class SalaryComponentTypeController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $salary_components_types = Salary_components_type::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.salary_components_types.index', compact('salary_components_types'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Employee'))
        {
            return view('salary_components_types.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Employee'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required',
                                    'name_ar' => 'required',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $salary_components_type             = new Salary_components_type();
            $salary_components_type->name       = $request->name;
            $salary_components_type->name_ar    = $request->name_ar;
            $salary_components_type->created_by = \Auth::user()->creatorId();
            $salary_components_type->save();

            return redirect()->route('salary_component_type.index')->with('success', __('Salary_components_type  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Salary_components_type $salary_components_type)
    {
        return redirect()->route('salary_components_type.index');
    }

    public function edit($salary_components_type)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $salary_components_type = Salary_components_type::where('id',$salary_components_type)->first();
            if($salary_components_type->created_by == \Auth::user()->creatorId())
            {
                return view('dashboard.salary_component_types.edit', compact('salary_components_type'));
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

    public function update(Request $request, $salary_components_type)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $salary_components_type = Salary_components_type::where('id',$salary_components_type)->first();
            if($salary_components_type->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                       'name_ar' => 'required',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $salary_components_type->name    = $request->name;
                $salary_components_type->name_ar = $request->name_ar;
                $salary_components_type->save();

                return redirect()->route('salary_component_type.index')->with('success', __('Salary_components_type successfully updated.'));
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

    public function destroy($salary_components_type)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            $salary_components_type = Salary_components_type::where('id',$salary_components_type)->first();
            if($salary_components_type->created_by == \Auth::user()->creatorId())
            {
                $salary_components_type->delete();
                return redirect()->route('salary_component_type.index')->with('success', __('Salary_components_type successfully deleted.'));
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
