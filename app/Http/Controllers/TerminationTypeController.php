<?php

namespace App\Http\Controllers;

use App\Models\TerminationType;
use Illuminate\Http\Request;

class TerminationTypeController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Termination Type'))
        {
            $terminationtypes = TerminationType::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('dashboard.terminationtype.index', compact('terminationtypes'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Termination Type'))
        {
            return view('terminationtype.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Termination Type'))
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

            $terminationtype             = new TerminationType();
            $terminationtype->name       = $request->name;
            $terminationtype->name_ar       = $request->name_ar;
            $terminationtype->created_by = \Auth::user()->creatorId();
            $terminationtype->save();

            return redirect()->route('terminationtype.index')->with('success', __('TerminationType  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(TerminationType $terminationtype)
    {
        return redirect()->route('terminationtype.index');
    }

    public function edit(TerminationType $terminationtype)
    {
        if(\Auth::user()->can('Edit Termination Type'))
        {
            if($terminationtype->created_by == \Auth::user()->creatorId())
            {

                return view('dashboard.terminationtype.edit', compact('terminationtype'));
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

    public function update(Request $request, TerminationType $terminationtype)
    {
        if(\Auth::user()->can('Edit Termination Type'))
        {
            if($terminationtype->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                       'name_ar' => 'required',

                                   ]
                );

                $terminationtype->name = $request->name;
                $terminationtype->name_ar = $request->name_ar;
                $terminationtype->save();

                return redirect()->route('terminationtype.index')->with('success', __('TerminationType successfully updated.'));
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

    public function destroy(TerminationType $terminationtype)
    {
        if(\Auth::user()->can('Delete Termination Type'))
        {
            if($terminationtype->created_by == \Auth::user()->creatorId())
            {
                $terminationtype->delete();

                return redirect()->route('terminationtype.index')->with('success', __('TerminationType successfully deleted.'));
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
