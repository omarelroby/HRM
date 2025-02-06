<?php

namespace App\Http\Controllers;


use App\Models\AboutUs;
use App\Models\FrontSetting;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontSettingController extends Controller
{
    public function index()
    {
        // Fetch the first record or create a new one if none exists
        $setting = FrontSetting::firstOrNew();
        return view('front.front_setting.edit', compact('setting'));
    }

    // Update the record
    public function update(Request $request, FrontSetting $frontSetting)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
            'map' => 'nullable|string',
         ]);

        $frontSetting->fill($validated)->save();

        return redirect()->route('front-setting.index')
            ->with('success', 'Setting updated successfully.');
    }

}
