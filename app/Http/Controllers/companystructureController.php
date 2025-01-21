<?php

namespace App\Http\Controllers;

use App\Models\CompanyStructure;
use App\Models\CompanyStructureEmployee;
use App\Http\Resources\CompanyStructureResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class companystructureController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Branch'))
        {
            $segment           = null;
            $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
            $CompanyStructures = CompanyStructure::whereNull('parent')->where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.companystructures.index', compact('CompanyStructures','segment','lang'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function index2($id)
    {
        if(\Auth::user()->can('Manage Branch'))
        {
            $segment           = null;
            $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
            $parentTree        = CompanyStructure::where('id',$id)->first();
            $structure_tree    = CompanyStructure::with('children')->where('parent',$id)->where('created_by', '=', \Auth::user()->creatorId())->get();
            $CompanyStructures = CompanyStructureResource::collection($structure_tree);
            return view('companystructures.index2', compact('parentTree','CompanyStructures','segment','lang'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create(Request $request)
    {
        if(\Auth::user()->can('Create Branch'))
        {
            $id                = $request->id;
            $lang              = app()->getLocale() == 'ar' ? '_ar' : '';
            $employees         = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            return view('companystructures.create',compact('lang','id','employees'));
        }
        else
        {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Branch'))
        {
            $validator = \Validator::make(
            $request->all(),
            [
                'name'        => 'required',
                'name_ar'     => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $companystructure                = new CompanyStructure();
            $companystructure->name          = $request->name;
            $companystructure->name_ar       = $request->name_ar;
            $companystructure->parent        = $request->parent;
            $companystructure->created_by    = \Auth::user()->creatorId();
            $companystructure->save();

            $companystructure->employees()->sync($request->employees);
            return back();

            //return redirect()->route('companystructure.index')->with('success', __('Branch  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(CompanyStructure $companystructure)
    {
        $segment = \Request::segments(1)[1];
        $CompanyStructures = CompanyStructure::where('parent',$companystructure->id)->where('created_by', '=', \Auth::user()->creatorId())->get();
        return view('companystructures.index', compact('CompanyStructures','segment'));
    }

    public function edit(CompanyStructure $companystructure)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($companystructure->created_by == \Auth::user()->creatorId())
            {
                $lang         = app()->getLocale() == 'ar' ? '_ar' : '';
                $employees    = Employee::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
                $selectedEmployees = $companystructure->employees->pluck('id')->toArray();
                return view('companystructures.edit', compact('lang','companystructure','employees' , 'selectedEmployees'));
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

    public function update(Request $request, CompanyStructure $companystructure)
    {
        if(\Auth::user()->can('Edit Branch'))
        {
            if($companystructure->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name'        => 'required',
                        'name_ar'     => 'required',
                    ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $companystructure->name          = $request->name;
                $companystructure->name_ar       = $request->name_ar;
                $companystructure->save();

                $companystructure->employees()->sync($request->employees);

                return back();

                //return redirect()->route('companystructure.index')->with('success', __('Branch successfully updated.'));
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

    public function destroy(CompanyStructure $companystructure)
    {
        if(\Auth::user()->can('Delete Branch'))
        {
            if($companystructure->created_by == \Auth::user()->creatorId())
            {
                $companystructure->delete();
                return redirect()->route('companystructure.index')->with('success', __('Branch successfully deleted.'));
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
