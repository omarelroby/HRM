<?php

namespace App\Http\Controllers;

use App\Models\Jobtitle;
use Illuminate\Http\Request;

class JobtitleController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $jobtitles = Jobtitle::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('dashboard.jobtitle.index', compact('jobtitles'));
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
            return view('jobtitle.create');
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

            $jobtitle             = new Jobtitle();
            $jobtitle->name       = $request->name;
            $jobtitle->name_ar    = $request->name_ar;
            $jobtitle->created_by = \Auth::user()->creatorId();
            $jobtitle->save();

            return redirect()->route('jobtitle.index')->with('success', __('jobtitle  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Jobtitle $jobtitle)
    {
        return redirect()->route('jobtitle.index');
    }

    public function edit(Jobtitle $jobtitle)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($jobtitle->created_by == \Auth::user()->creatorId())
            {
                return view('dashboard.jobtitle.edit', compact('jobtitle'));
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

    public function update(Request $request, Jobtitle $jobtitle)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($jobtitle->created_by == \Auth::user()->creatorId())
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

                $jobtitle->name    = $request->name;
                $jobtitle->name_ar = $request->name_ar;
                $jobtitle->save();

                return redirect()->route('jobtitle.index')->with('success', __('jobtitle successfully updated.'));
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

    public function destroy(Jobtitle $jobtitle)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            if($jobtitle->created_by == \Auth::user()->creatorId())
            {
                $jobtitle->delete();

                return redirect()->route('jobtitle.index')->with('success', __('jobtitle successfully deleted.'));
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
