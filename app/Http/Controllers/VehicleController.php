<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::where('created_by', '=', \Auth::user()->creatorId())->get();
        return view('vehicles.index',compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Overtime'))
        {
            $validator = \Validator::make(
            $request->all(), [
                'vehicle_type'      => 'required',
                'vehicle_type_ar'   => 'required',
                'model'             => 'required',
                'model_ar'          => 'required',
                'custody'           => 'required',
                'custody_ar'        => 'required',
                'registration_date' => 'required|date',
                'insurance_date'    => 'required|date',
                'check_date'        => 'required|date',
                'insurance_expiry_date'  => 'required|date',
                'check_expiry_date'      => 'required|date',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $input               = $request->only(['vehicle_type','vehicle_type_ar','model','model_ar','custody','custody_ar','registration_date','insurance_date','check_date','insurance_expiry_date','check_expiry_date']);
            $input['created_by'] = \Auth::user()->creatorId();
            $Vehicle             = Vehicle::create($input);        

            return redirect()->back()->with('success', __('Vehicle  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function edit($Vehicle)
    {
        $Vehicle = Vehicle::find($Vehicle);
        if(\Auth::user()->can('Edit Overtime'))
        {
            if($Vehicle->created_by == \Auth::user()->creatorId())
            {
                return view('vehicles.edit', compact('Vehicle'));
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

    public function update(Request $request, $Vehicle)
    {
        $Vehicle = Vehicle::find($Vehicle);
        if(\Auth::user()->can('Edit Overtime'))
        {
            if($Vehicle->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                        'vehicle_type'      => 'required',
                        'vehicle_type_ar'   => 'required',
                        'model'             => 'required',
                        'model_ar'          => 'required',
                        'custody'           => 'required',
                        'custody_ar'        => 'required',
                        'registration_date' => 'required|date',
                        'insurance_date'    => 'required|date',
                        'check_date'        => 'required|date',
                        'insurance_expiry_date'  => 'required|date',
                        'check_expiry_date'      => 'required|date',
                    ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $input               = $request->only(['vehicle_type','vehicle_type_ar','model','model_ar','custody','custody_ar','registration_date','insurance_date','check_date','insurance_expiry_date','check_expiry_date']);
                $Vehicle             = $Vehicle->update($input);
                return redirect()->back()->with('success', __('Vehicle successfully updated.'));
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

    public function destroy(Vehicle $Vehicle)
    {
        if(\Auth::user()->can('Delete Overtime'))
        {
            if($Vehicle->created_by == \Auth::user()->creatorId())
            {
                $Vehicle->delete();

                return redirect()->back()->with('success', __('Vehicle successfully deleted.'));
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
