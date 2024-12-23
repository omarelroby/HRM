<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Overtime;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function index(){
        return back();
    }


    public function overtimeCreate($id)
    {
        $employee = Employee::find($id);
        return view('overtime.create', compact('employee'));
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Overtime'))
        {
            $validator = \Validator::make(
                $request->all(), [
                'employee_id' => 'required',
                'title' => 'required',
                'hours' => 'required',
                'rate' => 'required',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $overtime                 = new Overtime();
            $overtime->employee_id    = $request->employee_id;
            $overtime->title          = $request->title;
            $overtime->number_of_days = $request->number_of_days ?? 0;
            $overtime->hours          = $request->hours;
            $overtime->rate           = $request->rate;
            $overtime->date           = $request->date;
            $overtime->created_by     = \Auth::user()->creatorId();
            $overtime->save();

            return redirect()->back()->with('success', __('Overtime  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Overtime $overtime)
    {
        return redirect()->route('commision.index');
    }

    public function edit($overtime)
    {
        $overtime = Overtime::find($overtime);
        if(\Auth::user()->can('Edit Overtime'))
        {
            if($overtime->created_by == \Auth::user()->creatorId())
            {
                return view('overtime.edit', compact('overtime'));
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

    public function update(Request $request, $overtime)
    {
        $overtime = Overtime::find($overtime);
        if(\Auth::user()->can('Edit Overtime'))
        {
            if($overtime->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                    $request->all(), [
                        'title' => 'required',
                        'hours' => 'required',
                        'rate' => 'required',
                    ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $overtime->title          = $request->title;
                $overtime->number_of_days = $request->number_of_days ?? 0;
                $overtime->hours          = $request->hours;
                $overtime->rate           = $request->rate;
                $overtime->date           = $request->date;
                $overtime->save();

                return redirect()->back()->with('success', __('Overtime successfully updated.'));
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

    public function destroy(Overtime $overtime)
    {
        if(\Auth::user()->can('Delete Overtime'))
        {
            if($overtime->created_by == \Auth::user()->creatorId())
            {
                $overtime->delete();

                return redirect()->back()->with('success', __('Overtime successfully deleted.'));
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

    public function calculateOvertime(Request $request)
    {
        $employee   = Employee::where('id',$request->employee_id)->first();
        $total_rate = $employee->getSalaryPerHour($request->employee_id) * $request->hours;
        return round($total_rate);
    }
}
