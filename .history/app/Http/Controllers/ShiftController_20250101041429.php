<?php

namespace App\Http\Controllers;

use App\Models\Employee_shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $days    = [
                '01' => __('SAT'),
                '02' => __('SUN'),
                '03' => __('MON'),
                '04' => __('TUE'),
                '05' => __('WED'),
                '06' => __('THU'),
                '07' => __('FRI'),
            ];
            $employee_shifts  = Employee_shift::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.employee_shifts.index', compact('employee_shifts','days'));
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
            $days    = [
                '01' => __('SAT'),
                '02' => __('SUN'),
                '03' => __('MON'),
                '04' => __('TUE'),
                '05' => __('WED'),
                '06' => __('THU'),
                '07' => __('FRI'),
            ];

            return view('employee_shifts.create',compact('days'));
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
                        ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $input                   = $request->all();
            $input['shift_days']     = implode(',',$request->shift_days);
            $input['created_by']     = \Auth::user()->creatorId();
            Employee_shift::create($input);
            return redirect()->route('employee_shifts.index')->with('success', __('Employee_shift  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Employee_shift $Employee_shift)
    {
        //
    }

    public function edit($Employee_shift_id)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $Employee_shift = Employee_shift::find($Employee_shift_id);
            if($Employee_shift->created_by == \Auth::user()->creatorId())
            {
                $days    = [
                    '01' => __('SAT'),
                    '02' => __('SUN'),
                    '03' => __('MON'),
                    '04' => __('TUE'),
                    '05' => __('WED'),
                    '06' => __('THU'),
                    '07' => __('FRI'),
                ];
                return view('dashboard.employee_shifts.edit', compact('Employee_shift','days'));
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

    public function update(Request $request, $Employee_shift_id)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $Employee_shift = Employee_shift::find($Employee_shift_id);
            if($Employee_shift->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                                       'name' => 'required',
                                       'name_ar' => 'required',
                                   ]);
                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $input             = $request->all();
                $input['shift_days']     = implode(',',$request->shift_days);
                $Employee_shift->update($input);
                return redirect()->route('employee_shifts.index')->with('success', __('Employee_shift successfully updated.'));
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

    public function destroy($Employee_shift_id)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            $Employee_shift = Employee_shift::find($Employee_shift_id);
            if($Employee_shift->created_by == \Auth::user()->creatorId())
            {
                $Employee_shift->delete();
                return redirect()->route('employee_shifts.index')->with('success', __('Employee_shift successfully deleted.'));
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
