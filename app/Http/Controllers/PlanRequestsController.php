<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanRequests;
use App\Models\Utility;
use App\Models\PlanRequest;
use App\Models\User;
use File;
use Illuminate\Http\Request;

class PlanRequestsController extends Controller
{
    public function index()
    {
        if (\Auth::user()->can('Manage Plan'))
        {
            $plansRequests    = PlanRequests::get();
            return view('dashboard.plan_requests.index', compact('plansRequests' ));
        }
        else
        {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy($id)
    {
//        $user = \Auth::user();
//        $user = User::where('id', '=',  $user->id)->first();
//        $user->requested_plan = "0";
//        $user->save();

        $plan = PlanRequests::findOrFail($id);
        $plan->delete();
//        PlanRequest::where('plan_id', $plan->id)->where('user_id', '=',  $user->id)->delete();

        return redirect()->route('plan-requests.index')->with('success', 'Plan request successfully deleted.');
    }

}
