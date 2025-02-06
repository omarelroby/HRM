<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\HomeSection;
use App\Models\WhyUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        // Fetch all client records
        $why_us = WhyUs::paginate(10);
        return view('front.why_us.index', compact('why_us'));
    }

    // Store a new client
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'title_ar' => 'required',
         ]);


        WhyUs::create($validated);

        return redirect()->route('why-us.index')->with('success', 'why-us added successfully.');
    }

    // Edit a client (show edit form)
    public function create()
    {
        return view('front.why_us.create');
    }
    public function edit($id)
    {
        $whyUs=WhyUs::findOrFail($id);
        return view('front.why_us.edit', compact('whyUs'));
    }

    // Update a client
    public function update(Request $request, $id)
    {
        $whyUs=WhyUs::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'title_ar' => 'required',
        ]);
        $whyUs->update($validated);

        return redirect()->route('why-us.index')->with('success', 'why-us updated successfully.');
    }

    // Delete a client
    public function destroy($id)
    {
        $whyUs=WhyUs::findOrFail($id);

        $whyUs->delete();

        return redirect()->route('why-us.index')->with('success', 'why us deleted successfully.');
    }
}
