<?php

namespace App\Http\Controllers;

use App\Models\LoanOption;
use Illuminate\Http\Request;

class LoanOptionController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Loan Option'))
        {
            $loanoptions = LoanOption::where('created_by', '=', \Auth::user()->creatorId())->get();

            return view('dashboard.loanoption.index', compact('loanoptions'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Loan Option'))
        {
            return view('loanoption.create');
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Loan Option'))
        {

            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:20',
                                   'name_ar' => 'required|max:20',
                               ]
            );
            if($validator->fails())
            {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $loanoption             = new LoanOption();
            $loanoption->name       = $request->name;
            $loanoption->name_ar       = $request->name_ar;
            $loanoption->created_by = \Auth::user()->creatorId();
            $loanoption->save();

            return redirect()->route('loanoption.index')->with('success', __('LoanOption  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(LoanOption $loanoption)
    {
        return redirect()->route('loanoption.index');
    }

    public function edit(LoanOption $loanoption)
    {
        if(\Auth::user()->can('Edit Loan Option'))
        {
            if($loanoption->created_by == \Auth::user()->creatorId())
            {

                return view('dashboard..edit', compact('loanoption'));
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

    public function update(Request $request, LoanOption $loanoption)
    {
        if(\Auth::user()->can('Edit Loan Option'))
        {
            if($loanoption->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:20',
                                       'name_ar' => 'required|max:20',
                                   ]
                );
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }
                $loanoption->name = $request->name;
                $loanoption->name_ar = $request->name_ar;
                $loanoption->save();

                return redirect()->route('loanoption.index')->with('success', __('LoanOption successfully updated.'));
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

    public function destroy(LoanOption $loanoption)
    {
        if(\Auth::user()->can('Delete Loan Option'))
        {
            if($loanoption->created_by == \Auth::user()->creatorId())
            {
                $loanoption->delete();

                return redirect()->route('loanoption.index')->with('success', __('LoanOption successfully deleted.'));
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
