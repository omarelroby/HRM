<?php

namespace App\Http\Controllers;

use App\Models\RequestType;
use Illuminate\Http\Request;

class RequestTypeController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $RequestTypes = RequestType::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.request_types.index', compact('RequestTypes'));
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
            return view('request_types.create');
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

            $RequestType             = new RequestType();
            $RequestType->name       = $request->name;
            $RequestType->name_ar    = $request->name_ar;
            $RequestType->created_by = \Auth::user()->creatorId();
            $RequestType->save();

            return redirect()->route('request_types.index')->with('success', __('RequestType  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(RequestType $RequestType)
    {
        return redirect()->route('request_types.index');
    }

    public function edit(RequestType $request_type)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($RequestType->created_by == \Auth::user()->creatorId())
            {
                return view('dashboard.request_types.edit', compact('RequestType'));
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

    public function update(Request $request, RequestType $RequestType)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($RequestType->created_by == \Auth::user()->creatorId())
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

                $RequestType->name    = $request->name;
                $RequestType->name_ar = $request->name_ar;
                $RequestType->save();

                return redirect()->route('request_types.index')->with('success', __('RequestType successfully updated.'));
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

    public function destroy(RequestType $RequestType)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            if($RequestType->created_by == \Auth::user()->creatorId())
            {
                $RequestType->delete();
                return redirect()->route('request_types.index')->with('success', __('RequestType successfully deleted.'));
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
