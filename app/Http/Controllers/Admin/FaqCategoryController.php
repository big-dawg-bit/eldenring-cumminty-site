<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of FAQ categories
     */
    public function index(): View
    {
        $categories = FaqCategory::withCount('faqs')->orderBy('order')->get();
        return view('admin.faq-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create(): View
    {
        return view('admin.faq-categories.create');
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'order' => ['required', 'integer', 'min:0'],
        ]);

        FaqCategory::create($request->all());

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Categorie succesvol toegevoegd!');
    }

    /**
     * Show the form for editing a category
     */
    public function edit(FaqCategory $faqCategory): View
    {
        return view('admin.faq-categories.edit', compact('faqCategory'));
    }

    /**
     * Update the specified category
     */
    public function update(Request $request, FaqCategory $faqCategory): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'order' => ['required', 'integer', 'min:0'],
        ]);

        $faqCategory->update($request->all());

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Categorie succesvol bijgewerkt!');
    }

    /**
     * Remove the specified category
     */
    public function destroy(FaqCategory $faqCategory): RedirectResponse
    {
        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Categorie succesvol verwijderd!');
    }
}
