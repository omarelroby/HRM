<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\HomeSection;
use App\Models\OrderRequest;
use App\Models\PlanRequest;
use App\Models\PlanRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        return view('dashboard.profile.index', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.profile.edit', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation Rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable|string|current_password',
            'password' => ['nullable',   'confirmed'],
        ]);

        // Update Name and Email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update Password (if provided)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save Changes
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

}
