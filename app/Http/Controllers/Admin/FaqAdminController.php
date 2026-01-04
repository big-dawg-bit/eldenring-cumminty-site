<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FaqAdminController extends Controller
{
    public function index(): View
    {
        $faqs = Faq::with('category')->orderBy('order')->paginate(20);
        return view('admin.faqs.index', compact('faqs'));
    }
    public function create(): View
    {
        $categories = FaqCategory::orderBy('order')->get();
        return view('admin.faqs.create', compact('categories'));
    }
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
        ]);

        $validated['order'] = 0;

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ succesvol toegevoegd!');
    }
    public function edit(Faq $faq): View
    {
        $categories = FaqCategory::orderBy('order')->get();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }
    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string', 'max:500'],
            'answer' => ['required', 'string'],
            'order' => ['required', 'integer', 'min:0'],
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ succesvol bijgewerkt!');
    }
    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ succesvol verwijderd!');
    }
}
