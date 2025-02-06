<?php

namespace App\Http\Controllers;

use App\Models\OrderRequest;
use App\Models\Plan;
use App\Models\PlanRequests;
use App\Models\Utility;
use App\Models\PlanRequest;
use App\Models\User;
use File;
use Illuminate\Http\Request;

class OrdersRequestsController extends Controller
{
    public function index()
    {

            $orders   = OrderRequest::get();
            return view('dashboard.orders_requests.index', compact('orders' ));

    }


    public function destroy($id)
    {
//        $user = \Auth::user();
//        $user = User::where('id', '=',  $user->id)->first();
//        $user->requested_plan = "0";
//        $user->save();

        $plan = OrderRequest::findOrFail($id);
        $plan->delete();
//        PlanRequest::where('plan_id', $plan->id)->where('user_id', '=',  $user->id)->delete();

        return redirect()->route('order-requests.index')->with('success', 'Order request successfully deleted.');
    }

}
