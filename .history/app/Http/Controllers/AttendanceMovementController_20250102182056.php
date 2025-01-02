<?php

namespace App\Http\Controllers;

use App\Models\AttendanceMovement;
use Illuminate\Http\Request;

class AttendanceMovementController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $AttendanceMovements = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('dashboard.attendancemovements.index', compact('AttendanceMovements'));
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
            return view('attendancemovements.create');
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
                'start_movement_date' => 'required|date',
            ]);

            if($validator->fails())
            {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $AttendanceMovements = AttendanceMovement::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id','DESC')->first();
            if($AttendanceMovements && $AttendanceMovements->status != 1)
            {
         
                return redirect()->back()->with('error', __('The current attendance movement must be closed first in order to be able to create a new one'));
            }

            $AttendanceMovement                          = new AttendanceMovement();
            $AttendanceMovement->start_movement_date     = $request->start_movement_date;
            $AttendanceMovement->end_movement_date       = \Carbon\Carbon::parse($request->start_movement_date)->addMonthNoOverflow()->subDay();
            $AttendanceMovement->created_by              = \Auth::user()->creatorId();
            $AttendanceMovement->save();

            return redirect()->route('attendancemovement.index')->with('success', __('AttendanceMovement  successfully created.'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(AttendanceMovement $AttendanceMovement)
    {
        return redirect()->route('AttendanceMovement.index');
    }

    public function edit($AttendanceMovement)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $AttendanceMovement = AttendanceMovement::where('id',$AttendanceMovement)->first();
            if($AttendanceMovement->created_by == \Auth::user()->creatorId())
            {
                return view('dashboard.attendancemovements.edit', compact('AttendanceMovement'));
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

    public function update(Request $request, $AttendanceMovement)
    {
        if(\Auth::user()->can('Edit Employee'))
        {
            $AttendanceMovement = AttendanceMovement::where('id',$AttendanceMovement)->first();
            if($AttendanceMovement->created_by == \Auth::user()->creatorId())
            {
                $validator = \Validator::make(
                $request->all(), [
                    'start_movement_date' => 'required|date',
                ]);

                if($validator->fails())
                {
                    $messages = $validator->getMessageBag();
                    return redirect()->back()->with('error', $messages->first());
                }

                $AttendanceMovement->start_movement_date     = $request->start_movement_date;
                $AttendanceMovement->end_movement_date       = \Carbon\Carbon::parse($request->start_movement_date)->addMonthNoOverflow()->subDay();
                $AttendanceMovement->status                  = $request->status;
                $AttendanceMovement->save();

                return redirect()->route('attendancemovement.index')->with('success', __('AttendanceMovement successfully updated.'));
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

    public function destroy($AttendanceMovement)
    {
        if(\Auth::user()->can('Delete Employee'))
        {
            $AttendanceMovement = AttendanceMovement::where('id',$AttendanceMovement)->first();
            if($AttendanceMovement->created_by == \Auth::user()->creatorId())
            {
                $AttendanceMovement->delete();
                return redirect()->route('attendancemovement.index')->with('success', __('AttendanceMovement successfully deleted.'));
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
