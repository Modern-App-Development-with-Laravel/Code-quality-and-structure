<?php

namespace Italofantone\Articles\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Italofantone\Articles\Models\Article;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->get();

        return view('articles::index', compact('articles'));
    }

    public function create(): View
    {
        return view('articles::create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Article::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
        ]);

        return to_route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit(Article $article): View
    {
        return view('articles::edit', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'content' => $validated['content'],
        ]);

        return to_route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return to_route('articles.index')->with('success', 'Article deleted successfully.');
    }

    public function publish(Article $article): RedirectResponse
    {
        $article->update([
            'status' => 'published',
            'published_at' => now(),
        ]);

        return to_route('articles.index')->with('success', 'Article published successfully.');
    }
}
