<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\HomeSection;
use App\Models\OrderRequest;
use App\Models\PlanRequest;
use App\Models\PlanRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderRequestController extends Controller
{
    public function approve(Request $request)
    {
        $validated = $request->validate([
            'payment' => 'required|string|max:255',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
            'plan_id' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'name' => 'nullable',
        ]);

        $plan_request = PlanRequests::findOrFail($request->request_id);
        $validated['plan_id'] = $plan_request->plan_id;
        $validated['phone'] = $plan_request->phone;
        $validated['email'] = $plan_request->email;
        $validated['name'] = $plan_request->name;
         $validated['start_date'] = now(); // or today() if you prefer

        if ($request->months == 3) {
            $validated['end_date'] = now()->addMonths(3);
        } elseif ($request->months == 6) {
            $validated['end_date'] = now()->addMonths(6);
        } elseif ($request->months == 12) {
            $validated['end_date'] = now()->addMonths(12);
        }
        $order=OrderRequest::create($validated);
        if($order){
            $plan_request->update(['approve'=>1]);

        }

        // Return a JSON response for AJAX
        return response()->json([
            'success' => true,
            'message' => 'Request approved successfully!',
        ]);
    }
    public function reject(Request $request,$id)
    {

        $plan_request = PlanRequests::findOrFail($id);
        $plan_request->update(['approve'=>2]);
        return redirect()->back();
    }

}
