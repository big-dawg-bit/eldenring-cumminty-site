<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $news->comments()->create([
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Comment toegevoegd!');
    }

    public function destroy(Comment $comment)
    {
        // Check if user is admin or comment owner
        if (auth()->user()->isAdmin() || auth()->id() === $comment->user_id) {
            $comment->delete();
            return back()->with('success', 'Comment verwijderd!');
        }

        return back()->with('error', 'Je hebt geen toestemming om deze comment te verwijderen.');
    }
}
