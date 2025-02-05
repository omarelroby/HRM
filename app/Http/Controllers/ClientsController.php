<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    public function index()
    {
        // Fetch all client records
        $clients = Client::paginate(10);
        return view('front.clients.index', compact('clients'));
    }

    // Store a new client
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('clients', 'public');
        }

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    // Edit a client (show edit form)
    public function create()
    {
        return view('front.clients.create');
    }
    public function edit(Client $client)
    {
        return view('front.clients.edit', compact('client'));
    }

    // Update a client
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($client->image) {
                Storage::disk('public')->delete($client->image);
            }

            // Store new image
            $validated['image'] = $request->file('image')->store('clients', 'public');
        }

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    // Delete a client
    public function destroy(Client $client)
    {
        if ($client->image) {
            Storage::disk('public')->delete($client->image);
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
