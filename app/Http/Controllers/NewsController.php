<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a list of all news items
     */
    public function index(): View
    {
        $news = News::orderBy('publication_date', 'desc')->paginate(10);
        return view('news.index', compact('news'));
    }

    /**
     * Display a single news item
     */
    public function show(News $news): View
    {
        return view('news.show', compact('news'));
    }
}
