<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProfilePageController extends Controller
{
    /**
     * Show a user's public profile (accessible to everyone)
     */
    public function show(User $user): View
    {
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form to edit the authenticated user's profile
     */
    public function edit(): View
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the authenticated user's profile
     */
    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();

        $request->validate([
            'username' => ['nullable', 'string', 'max:255', 'unique:users,username,' . $user->id],
            'birthday' => ['nullable', 'date', 'before:today'],
            'about' => ['nullable', 'string', 'max:500'],
            'profile_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // 2MB max
        ]);

        $data = [
            'username' => $request->username,
            'birthday' => $request->birthday,
            'about' => $request->about,
        ];
        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $data['profile_photo'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile.show', $user)
            ->with('success', 'Profiel succesvol bijgewerkt!');
    }
}
