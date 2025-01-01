<?php

namespace App\Http\Controllers;

use App\Models\Laborhirecompany;
use Illuminate\Http\Request;

class LaborCountryController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $laborcompanies = Laborhirecompany::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.labor.index', compact('laborcompanies'));
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
            return view('laborcompany.create');
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

            $Laborhirecompany             = new Laborhirecompany();
            $Laborhirecompany->name       = $request->name;
            $Laborhirecompany->name_ar    = $request->name_ar;
            $Laborhirecompany->created_by = \Auth::user()->creatorId();
            $Laborhirecompany->save();

            return redirect()->route('labor_companies.index')->with('success', __('Laborhirecompany  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Laborhirecompany $Laborhirecompany)
    {
        return redirect()->route('laborcompany.index');
    }

    public function edit($labor_company_id)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $Laborhirecompany = Laborhirecompany::find($labor_company_id);
            if($Laborhirecompany->created_by == \Auth::user()->creatorId())
            {
                return view('laborcompany.edit', compact('Laborhirecompany'));
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

    public function update(Request $request, $labor_company_id)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $Laborhirecompany = Laborhirecompany::find($labor_company_id);
            if($Laborhirecompany->created_by == \Auth::user()->creatorId())
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

                $Laborhirecompany->name    = $request->name;
                $Laborhirecompany->name_ar = $request->name_ar;
                $Laborhirecompany->save();

                return redirect()->route('labor_companies.index')->with('success', __('Laborhirecompany successfully updated.'));
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
            $Laborhirecompany = Laborhirecompany::find($labor_company_id);
            if($Laborhirecompany->created_by == \Auth::user()->creatorId())
            {
                $Laborhirecompany->delete();
                return redirect()->route('labor_companies.index')->with('success', __('Laborhirecompany successfully deleted.'));
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
