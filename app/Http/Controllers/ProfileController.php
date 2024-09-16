<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // @desc    Update profile info
    // @route   PUT /profile
    public function update(Request $request): RedirectResponse
    {
        // Get logged in user
        $user = Auth::user();

        // Validate data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        // Get user name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }

            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        // Update user info
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Profile info updated!');
    }
}
