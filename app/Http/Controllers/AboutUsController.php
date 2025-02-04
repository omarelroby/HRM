<?php

namespace App\Http\Controllers;


use App\Models\AboutUs;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        // Fetch the first record or create a new one if none exists
        $about = AboutUs::firstOrNew();
        return view('front.about.edit', compact('about'));
    }

    // Update the record
    public function update(Request $request, AboutUs $aboutUs)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
         ]);

        $aboutUs->fill($validated)->save();

        return redirect()->route('about-us.index')
            ->with('success', 'Home section updated successfully.');
    }

}
