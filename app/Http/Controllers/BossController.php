<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use Illuminate\Http\Request;

class BossController extends Controller
{
    public function index()
    {
        $bosses = Boss::orderBy('order')->get();
        return view('bosses.index', compact('bosses'));
    }

    public function show(Boss $boss)
    {
        return view('bosses.show', compact('boss'));
    }
}
