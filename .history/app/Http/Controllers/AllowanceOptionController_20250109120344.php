<?php

namespace App\Http\Controllers;

use App\Models\AllowanceOption;
use Illuminate\Http\Request;

class AllowanceOptionController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Allowance Option'))
        {
            $allowanceoptions = AllowanceOption::where('created_by', '=', \Auth::user()->creatorId())->get();
            $allowanceoptionCountWithPayrollDisplay = AllowanceOption::where('created_by', '=', \Auth::user()->creatorId())->WhereNotNull('payroll_dispaly')->count();

            return view('dashboard.allowanceoption.index', compact('allowanceoptions'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if(\Auth::user()->can('Create Allowance Option'))
        {
            $allowanceoptionCountWithPayrollDisplay = AllowanceOption::where('created_by', '=', \Auth::user()->creatorId())->WhereNotNull('payroll_dispaly')->count();
            return view('allowanceoption.create',compact('allowanceoptionCountWithPayrollDisplay'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Allowance Option'))
        {
            $validator = \Validator::make(
                $request->all(), [
                                   'name' => 'required|max:200',
                                   'name_ar' => 'required|max:200',
                               ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $allowanceoptionCountWithPayrollDisplay = AllowanceOption::where('created_by', '=', \Auth::user()->creatorId())->WhereNotNull('payroll_dispaly')->count();
            if($request->payroll_dispaly == 1 && $allowanceoptionCountWithPayrollDisplay >= 2)
            {
                return redirect()->back()->with('error', __('It is not possible to add more than 2 in Payroll Log'));
            }

            $allowanceoption                    = new AllowanceOption();
            $allowanceoption->name              = $request->name;
            $allowanceoption->name_ar           = $request->name_ar;
            $allowanceoption->insurance_active  = $request->insurance_active;
            $allowanceoption->payroll_dispaly   = $request->payroll_dispaly;
            $allowanceoption->created_by        = \Auth::user()->creatorId();
            $allowanceoption->save();

            return redirect()->route('allowanceoption.index')->with('success', __('AllowanceOption  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(AllowanceOption $allowanceoption)
    {
        return redirect()->route('allowanceoption.index');
    }

    public function edit(AllowanceOption $allowanceoption)
    {
        if(\Auth::user()->can('Edit Allowance Option'))
        {
            if($allowanceoption->created_by == \Auth::user()->creatorId())
            {
                return view('dashboard.allowanceoption.edit', compact('allowanceoption'));
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

    public function update(Request $request, AllowanceOption $allowanceoption)
    {
        if(\Auth::user()->can('Edit Allowance Option'))
        {
            if($allowanceoption->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required|max:200',
                                       'name_ar' => 'required|max:200',

                                   ]
                );

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $allowanceoptionCountWithPayrollDisplay = AllowanceOption::where('created_by', '=', \Auth::user()->creatorId())->WhereNotNull('payroll_dispaly')->count();
                if($request->payroll_dispaly == 1 && $allowanceoptionCountWithPayrollDisplay >= 2)
                {
                    return redirect()->back()->with('error', __('It is not possible to add more than 2 in Payroll Log'));
                }


                $allowanceoption->name = $request->name;
                $allowanceoption->name_ar = $request->name_ar;
                $allowanceoption->insurance_active       = $request->insurance_active;
                $allowanceoption->payroll_dispaly   = $request->payroll_dispaly;
                $allowanceoption->save();

                return redirect()->route('allowanceoption.index')->with('success', __('AllowanceOption successfully updated.'));
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

    public function destroy(AllowanceOption $allowanceoption)
    {
        if(\Auth::user()->can('Delete Allowance Option'))
        {
            if($allowanceoption->created_by == \Auth::user()->creatorId())
            {
                $allowanceoption->delete();

                return redirect()->route('allowanceoption.index')->with('success', __('AllowanceOption successfully deleted.'));
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
