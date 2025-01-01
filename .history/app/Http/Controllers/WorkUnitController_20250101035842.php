<?php

namespace App\Http\Controllers;

use App\Models\Workunit;
use Illuminate\Http\Request;

class WorkUnitController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $workunits = Workunit::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.workunits.index', compact('workunits'));
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
            return view('workunits.create');
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
                        ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $workunit             = new Workunit();
            $workunit->name       = $request->name;
            $workunit->name_ar    = $request->name_ar;
            $workunit->created_by = \Auth::user()->creatorId();
            $workunit->save();

            return redirect()->route('dashboard.workunits.index')->with('success', __('WorkUnit  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Workunit $Workunit)
    {
        //
    }

    public function edit($workunit_id)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $Workunit = Workunit::find($workunit_id);
            if($Workunit->created_by == \Auth::user()->creatorId())
            {
                return view('workunits.edit', compact('Workunit'));
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

    public function update(Request $request, $workunit_id)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $Workunit = Workunit::find($workunit_id);
            if($Workunit->created_by == \Auth::user()->creatorId())
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

                $Workunit->name    = $request->name;
                $Workunit->name_ar = $request->name_ar;
                $Workunit->save();

                return redirect()->route('workunits.index')->with('success', __('Workunit successfully updated.'));
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

    public function destroy($labor_company_id)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            $Workunit = Workunit::find($labor_company_id);
            if($Workunit->created_by == \Auth::user()->creatorId())
            {
                $Workunit->delete();
                return redirect()->route('workunits.index')->with('success', __('Workunit successfully deleted.'));
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
