<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Employee;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            $lang          = app()->getLocale() == 'ar' ? '_ar' : '';
            $notifications = Notification::where('user_id', '=', \Auth::user()->id)->get();
            Notification::where('user_id', '=', \Auth::user()->id)->update(['read' => 1]);
            return view('notification.index', compact('notifications','lang'));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Branch $branch)
    {
        //
    }

    public function edit(Branch $branch)
    {
        //
    }

    public function update(Request $request, Branch $branch)
    {
        //
    }

    public function destroy(Notification $notification)
    {
        if(\Auth::user()->can('Manage Employee'))
        {
            if($notification->user_id == \Auth::user()->id)
            {
                $notification->delete();
                return redirect()->route('notifications.index')->with('success', __('Employee successfully deleted.'));
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
