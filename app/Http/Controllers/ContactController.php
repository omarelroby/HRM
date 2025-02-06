<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ContactUs;
use App\Models\Feature;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {

        $contacts = ContactUs::paginate(10);
        return view('front.contact_us.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create the contact
        ContactUs::create($validated);

        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent. Thank you!',
            ]);
        }

        // Redirect for regular form submissions
        return redirect()->back()->with('success', 'Contact us added successfully.');
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
    public function destroy($id)
    {

        $contactUs=ContactUs::findOrFail($id);
        $contactUs->delete();

        return redirect()->route('contacts.index')->with('success', 'Features deleted successfully.');
    }
}
