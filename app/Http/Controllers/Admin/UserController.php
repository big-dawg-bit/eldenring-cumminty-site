<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    // Show all users
    public function index(): View
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    // Show form to create new user
    public function create(): View
    {
        return view('admin.users.create');
    }

    // Store new user (admin creates manually)
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['nullable', 'boolean'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol aangemaakt!');
    }

    // Show form to edit user
    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update user (mainly for toggling admin status)
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'is_admin' => ['nullable', 'boolean'],
        ]);

        // Prevent admin from removing their own admin rights
        if ($user->id === auth()->id() && !$request->boolean('is_admin')) {
            return back()->with('error', 'Je kunt je eigen admin rechten niet verwijderen!');
        }

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->boolean('is_admin'),
        ];

        // Only update password if provided
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol bijgewerkt!');
    }

    // Delete user
    public function destroy(User $user): RedirectResponse
    {
        // Prevent admin from deleting themselves
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Je kunt je eigen account niet verwijderen!');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol verwijderd!');
    }
}
