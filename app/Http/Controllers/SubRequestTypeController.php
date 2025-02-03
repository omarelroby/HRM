<?php

namespace App\Http\Controllers;

use App\Models\RequestType;
use App\Models\SubRequestType;
use Illuminate\Http\Request;

class SubRequestTypeController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $sub_request_types = SubRequestType::where('created_by', '=', \Auth::user()->creatorId())->get();
            $request_types = RequestType::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.sub_request_types.index', compact('sub_request_types','request_types'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
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
                    'request_type_id' => 'required',
                ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $RequestType             = new SubRequestType();
            $RequestType->name       = $request->name;
            $RequestType->name_ar    = $request->name_ar;
            $RequestType->request_type_id    = $request->request_type_id;
            $RequestType->created_by = \Auth::user()->creatorId();
            $RequestType->save();

            return redirect()->route('sub-request-type.index')->with('success', __('RequestType  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }



    public function edit(SubRequestType $subRequestType)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($subRequestType->created_by == \Auth::user()->creatorId())
            {
                $request_types = RequestType::where('created_by', '=', \Auth::user()->creatorId())->get();

                return view('dashboard.sub_request_types.edit', compact('subRequestType','request_types'));
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

    public function update(Request $request, SubRequestType $subRequestType)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($subRequestType->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                        'name' => 'required',
                        'name_ar' => 'required',
                        'request_type_id' => 'required',
                    ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $subRequestType->name    = $request->name;
                $subRequestType->name_ar = $request->name_ar;
                $subRequestType->request_type_id = $request->request_type_id;
                $subRequestType->save();

                return redirect()->route('sub-request-type.index')->with('success', __('RequestType successfully updated.'));
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

    public function destroy(SubRequestType $subRequestType)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            if($subRequestType->created_by == \Auth::user()->creatorId())
            {
                $subRequestType->delete();
                return redirect()->route('sub-request-type.index')->with('success', __('RequestType successfully deleted.'));
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
    public function getSubRequestTypes(Request $request)
    {
        $requestTypeId = $request->input('request_type_id');

        if ($requestTypeId) {
            $subRequestTypes = SubRequestType::where('request_type_id', $requestTypeId)->get();
            return response()->json($subRequestTypes);
        }

        return response()->json([]);
    }
}
