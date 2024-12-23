<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $banks = Bank::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('banks.index', compact('banks'));
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
            return view('banks.create');
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

            $Bank             = new Bank();
            $Bank->name       = $request->name;
            $Bank->name_ar    = $request->name_ar;
            $Bank->created_by = \Auth::user()->creatorId();
            $Bank->save();

            return redirect()->route('banks.index')->with('success', __('Bank  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Bank $Bank)
    {
        return redirect()->route('banks.index');
    }

    public function edit(Bank $Bank)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($Bank->created_by == \Auth::user()->creatorId())
            {
                return view('banks.edit', compact('Bank'));
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

    public function update(Request $request, Bank $Bank)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            if($Bank->created_by == \Auth::user()->creatorId())
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

                $Bank->name    = $request->name;
                $Bank->name_ar = $request->name_ar;
                $Bank->save();

                return redirect()->route('banks.index')->with('success', __('Bank successfully updated.'));
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

    public function destroy(Bank $Bank)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            if($Bank->created_by == \Auth::user()->creatorId())
            {
                $Bank->delete();
                return redirect()->route('banks.index')->with('success', __('Bank successfully deleted.'));
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
