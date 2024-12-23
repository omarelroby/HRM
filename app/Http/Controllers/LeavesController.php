<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeavesType;
use App\Models\LeaveType;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LeavesController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage User'))
        {
            $leaves = LeavesType::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('leaves.index', compact('leaves'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create(Request $request)
    {
        if(\Auth::user()->can('Manage User'))
        {
            return view('leaves.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Leave'))
        {
            $validator = \Validator::make(
            $request->all(), 
            [
                'name' => 'required',
                'name_ar' => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $input               = $request->all();
            $input['created_by'] = \Auth::user()->creatorId();
            $leave               = LeavesType::create($input);
            return redirect()->back()->with('success', __('Leave  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(LeavesType $leave)
    {
        return redirect()->route('leaves.index');
    }

    public function edit(LeavesType $leave)
    {
        if(\Auth::user()->can('Edit Leave'))
        {
            if($leave->created_by == \Auth::user()->creatorId())
            {
                return view('leaves.edit');
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

    public function update(Request $request, $leave)
    {
        $leave = LeavesType::find($leave);
        if(\Auth::user()->can('Edit Leave'))
        {
            if($leave->created_by == Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                $request->all(), [
                    'name'    => 'required',
                    'name_ar' => 'required',
                ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $input  = $request->all();
                $leave->update($input);
                
                return redirect()->back()->with('success', __('Leave successfully updated.'));
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

    public function destroy(LeavesType $leave)
    {
        if(\Auth::user()->can('Delete Leave'))
        {
            if($leave->created_by == \Auth::user()->creatorId())
            {
                $leave->delete();
                return redirect()->back()->with('success', __('Leave successfully deleted.'));
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
