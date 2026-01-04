<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BossController extends Controller
{
    public function index()
    {
        $bosses = Boss::orderBy('order')->paginate(10);
        return view('admin.bosses.index', compact('bosses'));
    }

    public function create()
    {
        return view('admin.bosses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'difficulty' => 'required|integer|min:1|max:5',
            'drops' => 'nullable|string|max:255',
            'health' => 'nullable|integer',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('bosses', 'public');
        }

        // Cast to integer to ensure proper storage
        $validated['difficulty'] = (int) $validated['difficulty'];
        $validated['health'] = $validated['health'] ? (int) $validated['health'] : null;
        $validated['order'] = (int) $validated['order'];

        Boss::create($validated);

        return redirect()->route('admin.bosses.index')->with('success', 'Boss succesvol toegevoegd!');
    }

    public function edit(Boss $boss)
    {
        return view('admin.bosses.edit', compact('boss'));
    }

    public function update(Request $request, Boss $boss)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'difficulty' => 'required|integer|min:1|max:5',
            'drops' => 'nullable|string|max:255',
            'health' => 'nullable|integer',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($boss->image) {
                Storage::disk('public')->delete($boss->image);
            }
            $validated['image'] = $request->file('image')->store('bosses', 'public');
        }

        // Cast to integer to ensure proper storage
        $validated['difficulty'] = (int) $validated['difficulty'];
        $validated['health'] = $validated['health'] ? (int) $validated['health'] : null;
        $validated['order'] = (int) $validated['order'];

        $boss->update($validated);

        return redirect()->route('admin.bosses.index')->with('success', 'Boss succesvol bijgewerkt!');
    }

    public function destroy(Boss $boss)
    {
        if ($boss->image) {
            Storage::disk('public')->delete($boss->image);
        }

        $boss->delete();

        return redirect()->route('admin.bosses.index')->with('success', 'Boss succesvol verwijderd!');
    }
}
