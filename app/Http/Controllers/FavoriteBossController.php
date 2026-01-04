<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use Illuminate\Http\Request;

class FavoriteBossController extends Controller
{
    public function toggle(Boss $boss)
    {
        $user = auth()->user();

        if ($user->favoriteBosses()->where('boss_id', $boss->id)->exists()) {
            $user->favoriteBosses()->detach($boss->id);
            return back()->with('success', 'Boss verwijderd van favorieten!');
        } else {
            $user->favoriteBosses()->attach($boss->id);
            return back()->with('success', 'Boss toegevoegd aan favorieten!');
        }
    }

    public function index()
    {
        $favoriteBosses = auth()->user()->favoriteBosses;
        return view('favorites.index', compact('favoriteBosses'));
    }
}
