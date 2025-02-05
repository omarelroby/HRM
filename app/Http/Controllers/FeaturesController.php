<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Feature;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturesController extends Controller
{
    public function index()
    {

        $features = Feature::paginate(10);
        return view('front.features.index', compact('features'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description' => 'required',
            'description_ar' => 'required',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('features', 'public');
        }

        Feature::create($validated);

        return redirect()->route('features.index')->with('success', 'features added successfully.');
    }

    // Edit a client (show edit form)
    public function create()
    {
        return view('front.features.create');
    }
    public function edit(Feature $feature)
    {
        return view('front.features.edit', compact('feature'));
    }

    // Update a client
    public function update(Request $request, Feature $feature)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description' => 'required',
            'description_ar' => 'required',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            // Delete old image if it exists
            if ($feature->image) {
                Storage::disk('public')->delete($feature->image);
            }

            // Store new image
            $validated['icon'] = $request->file('icon')->store('features', 'public');
        }

        $feature->update($validated);

        return redirect()->route('features.index')->with('success', 'Features updated successfully.');
    }

    // Delete a client
    public function destroy(Feature $feature)
    {
        if ($feature->image) {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return redirect()->route('features.index')->with('success', 'Features deleted successfully.');
    }
}
