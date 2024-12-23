<?php

namespace App\Http\Controllers;

use App\Models\Holiday_type;
use Illuminate\Http\Request;

class HolidayTypesController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $holiday_types = Holiday_type::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('Holiday_types.index', compact('holiday_types'));
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
            return view('Holiday_types.create');
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

            $Holiday_type             = new Holiday_type();
            $Holiday_type->name       = $request->name;
            $Holiday_type->name_ar    = $request->name_ar;
            $Holiday_type->created_by = \Auth::user()->creatorId();
            $Holiday_type->save();

            return redirect()->route('Holiday_type.index')->with('success', __('Holiday_type  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Holiday_type $Holiday_type)
    {
        return redirect()->route('Holiday_types.index');
    }

    public function edit(Holiday_type $Holiday_type)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($Holiday_type->created_by == \Auth::user()->creatorId())
            {
                return view('Holiday_types.edit', compact('Holiday_type'));
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

    public function update(Request $request, Holiday_type $Holiday_type)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($Holiday_type->created_by == \Auth::user()->creatorId())
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

                $Holiday_type->name    = $request->name;
                $Holiday_type->name_ar = $request->name_ar;
                $Holiday_type->save();

                return redirect()->route('Holiday_type.index')->with('success', __('Holiday_type successfully updated.'));
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

    public function destroy(Holiday_type $Holiday_type)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            if($Holiday_type->created_by == \Auth::user()->creatorId())
            {
                $Holiday_type->delete();

                return redirect()->route('Holiday_type.index')->with('success', __('Holiday_type successfully deleted.'));
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
