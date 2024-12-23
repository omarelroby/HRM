<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use File;
use Carbon\Carbon;
use App\Models\EmployeeContracts;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        //
    }

    public function contractCreate($id)
    {
        $employee = Employee::find($id);
        return view('contracts.create', compact('employee'));
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Employee'))
        {
            $input                = $request->all();
            $input['employee_id'] = $request->employee_id;
            $input['created_by']  = \Auth::user()->creatorId();
            if($request->contract_duration != 0)
            {
                $input['contract_enddate']       = Carbon::parse($request->contract_startdate)->addYears($request->contract_duration)->format('Y-m-d');
                $input['contract_enddate_hijri'] = Carbon::parse($request->contract_startdate_hijri)->addYears($request->contract_duration)->format('Y-m-d');
            }else{
                $input['contract_duration']      = Carbon::parse($request->contract_startdate)->diffInYears(Carbon::parse($request->contract_enddate));
            }

            if($request->hasFile('contract_document'))
            {
                $filenameWithExt = $request->file('contract_document')->getClientOriginalName();
                $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension       = $request->file('contract_document')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $dir             = storage_path('uploads/document/');
                $image_path      = $dir . $filenameWithExt;

                if(File::exists($image_path))
                {
                    File::delete($image_path);
                }
                
                if(!file_exists($dir))
                {
                    mkdir($dir, 0777, true);
                }
                $path = $request->file('contract_document')->storeAs('uploads/document/', $fileNameToStore);
                $input['contract_document'] = $fileNameToStore;
            }
           
            $EmployeeContracts    = EmployeeContracts::create($input);
            return redirect()->back()->with('success', __('EmployeeContracts  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(EmployeeContracts $EmployeeContracts)
    {
        //
    }

    public function edit($EmployeeContract_id)
    {
        $EmployeeContracts = EmployeeContracts::find($EmployeeContract_id);
        if(\Auth::user()->can('Edit Employee'))
        {
            if($EmployeeContracts->employee->created_by == \Auth::user()->creatorId())
            {
                return view('contracts.edit', compact('EmployeeContracts'));
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

    public function update(Request $request, $EmployeeContracts)
    {
        $EmployeeContracts = EmployeeContracts::find($EmployeeContracts);
        if(\Auth::user()->can('Edit Employee'))
        {
            if($EmployeeContracts->employee->created_by == \Auth::user()->creatorId())
            {
                if($request->contract_duration != 0)
                {
                    $input['contract_enddate']       = Carbon::parse($request->contract_startdate)->addYears($request->contract_duration)->format('Y-m-d');
                    $input['contract_enddate_hijri'] = Carbon::parse($request->contract_startdate_hijri)->addYears($request->contract_duration)->format('Y-m-d');
                }else{
                    $input['contract_duration']      = Carbon::parse($request->contract_startdate)->diffInYears(Carbon::parse($request->contract_enddate));
                }
    
                if($request->hasFile('contract_document'))
                {
                    $filenameWithExt = $request->file('contract_document')->getClientOriginalName();
                    $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension       = $request->file('contract_document')->getClientOriginalExtension();
                    $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                    $dir             = storage_path('uploads/document/');
                    $image_path      = $dir . $filenameWithExt;
    
                    if(File::exists($image_path))
                    {
                        File::delete($image_path);
                    }
                    
                    if(!file_exists($dir))
                    {
                        mkdir($dir, 0777, true);
                    }
                    $path      = $request->file('contract_document')->storeAs('uploads/document/', $fileNameToStore);
                    $input['contract_document'] = $fileNameToStore;
                }
                
                $EmployeeContracts->update($input);
                return redirect()->back()->with('success', __('EmployeeContracts successfully updated.'));
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

    public function destroy($id)
    {
        $EmployeeContracts = EmployeeContracts::find($id);
        if($EmployeeContracts->employee->created_by == \Auth::user()->creatorId())
        {
            $EmployeeContracts->delete();
            return redirect()->back()->with('success', __('EmployeeContracts successfully deleted.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
