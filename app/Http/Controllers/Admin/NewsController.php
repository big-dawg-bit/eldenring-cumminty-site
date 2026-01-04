<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    /**
     * Display a listing of news items for admin
     */
    public function index(): View
    {
        $news = News::orderBy('publication_date', 'desc')->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news item
     */
    public function create(): View
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created news item
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'publication_date' => ['required', 'date'],
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'publication_date' => $request->publication_date,
            'user_id' => auth()->id(),
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $data['image'] = $path;
        }

        News::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuws succesvol toegevoegd!');
    }

    /**
     * Show the form for editing a news item
     */
    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified news item
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'publication_date' => ['required', 'date'],
        ]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'publication_date' => $request->publication_date,
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            $path = $request->file('image')->store('news_images', 'public');
            $data['image'] = $path;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuws succesvol bijgewerkt!');
    }

    /**
     * Remove the specified news item
     */
    public function destroy(News $news): RedirectResponse
    {
        // Delete image if exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Nieuws succesvol verwijderd!');
    }
}
