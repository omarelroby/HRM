<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Absence;
use App\Models\AttendanceMovement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function absenceCreate($id)
    {
        $employee = Employee::find($id);
        return view('dashboard.absences.create', compact('employee'));
    }

    public function store(Request $request)
    {
        if(\Auth::user()->can('Create Overtime'))
        {
            $validator = \Validator::make(
                $request->all(), [
                'employee_id'    => 'required',
                'type'           => 'required',
                'number_of_days' => 'required',
                'start_date'     => 'required|date',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $attendancemovement  = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
            $startDate           = Carbon::parse($request->start_date);
            $endDate             = $startDate->addDays($request->number_of_days)->subDays(1);

            if($attendancemovement->start_movement_date > $startDate || $attendancemovement->end_movement_date < $startDate)
            {

                return redirect()->back()->with('error', __('The start date must be equal to or greater than the start movement date and the end date is equal to or less than the end movement date'));
            }

            $input               = $request->only(['employee_id','type','number_of_days','start_date']);
            $input['end_date']   = $endDate;
            $input['created_by'] = \Auth::user()->creatorId();
            $Absence             = Absence::create($input);

            return redirect()->back()->with('success', __('Absence  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit($Absence)
    {
        $Absence = Absence::find($Absence);
        if(\Auth::user()->can('Edit Overtime'))
        {
            if($Absence->created_by == \Auth::user()->creatorId())
            {
                return view('absences.edit', compact('Absence'));
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

    public function update(Request $request, $Absence)
    {
        $Absence = Absence::find($Absence);
        if(\Auth::user()->can('Edit Overtime'))
        {
            if($Absence->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                $request->all(), [
                    'type'           => 'required',
                    'number_of_days' => 'required',
                    'start_date'     => 'required|date',
                ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $attendancemovement  = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->whereNull('status')->first();
                $startDate           = Carbon::parse($request->start_date);
                $endDate             = $startDate->addDays($request->number_of_days)->subDays(1);

                if($attendancemovement->start_movement_date > $startDate || $attendancemovement->end_movement_date < $startDate)
                {
                    return redirect()->back()->with('error', __('The start date must be equal to or greater than the start movement date and the end date is equal to or less than the end movement date'));
                }

                $input               = $request->only(['type','number_of_days','start_date']);
                $input['end_date']   = $endDate;
                $Absence             = $Absence->update($input);
                return redirect()->back()->with('success', __('Absence successfully updated.'));
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

    public function destroy(Absence $Absence)
    {
        if(\Auth::user()->can('Delete Overtime'))
        {
            if($Absence->created_by == \Auth::user()->creatorId())
            {
                $Absence->delete();

                return redirect()->back()->with('success', __('Absence successfully deleted.'));
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
