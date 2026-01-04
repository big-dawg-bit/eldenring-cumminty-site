<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display the FAQ page with all categories and questions
     */
    public function index(): View
    {
        $categories = FaqCategory::with('faqs')
            ->orderBy('order')
            ->get();

        return view('faq.index', compact('categories'));
    }
}
