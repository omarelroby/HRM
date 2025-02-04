<?php

namespace App\Http\Controllers;


use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSectionController extends Controller
{
    public function index()
    {
        // Fetch the first record or create a new one if none exists
        $homeSection = HomeSection::firstOrNew();
        return view('front.home-sections.edit', compact('homeSection'));
    }

    // Update the record
    public function update(Request $request, HomeSection $homeSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($homeSection->image) {
                Storage::disk('public')->delete($homeSection->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('home_sections', 'public');
            $validated['image'] = $imagePath;
        }

        // Update or create the record
        $homeSection->fill($validated)->save();

        return redirect()->route('home-sections.index')
            ->with('success', 'Home section updated successfully.');
    }

}
