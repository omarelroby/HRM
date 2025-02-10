<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Mail\TicketSend;
use App\Models\MacAddress;
use App\Models\Task;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SubEmpReqTypeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if($user->type == 'company') {
            $macs= MacAddress::where('created_by', '=', \Auth::user()->id)->get();
             return view('dashboard.mac.index', compact('macs'));
        }
    }


    public function store(Request $request)
    {
        if (\Auth::user()->can('Create tasks')) {

            $validator = \Validator::make(
                $request->all(),
                [
                    'mac' => 'required',


                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }


            $mac = new MacAddress();
            $mac->mac = $request->mac;
            $mac->created_by = auth()->user()->id;

            $mac->save();

            // Redirect with a success message
            return redirect()->route('mac-address.index')->with('success', __('Mac Address successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(MacAddress $macAddress)
    {

        $macAddress->delete();
        return redirect()->route('mac-address.index')->with('error', __('Mac Address successfully deleted.'));
    }


}
