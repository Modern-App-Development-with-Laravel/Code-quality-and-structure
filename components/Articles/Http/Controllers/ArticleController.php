<?php

namespace Italofantone\Articles\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Italofantone\Articles\Actions\CreateArticle;
use Italofantone\Articles\Actions\DeleteArticle;
use Italofantone\Articles\Actions\PublishArticle;
use Italofantone\Articles\Actions\UpdateArticle;
use Italofantone\Articles\Data\ArticleDTO;
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

        $data = ArticleDTO::fromArray($validated);

        (new CreateArticle)->execute($data);

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

        $data = ArticleDTO::fromArray($validated);

        (new UpdateArticle)->execute($article, $data);

        return to_route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        (new DeleteArticle)->execute($article);

        return to_route('articles.index')->with('success', 'Article deleted successfully.');
    }

    public function publish(Article $article): RedirectResponse
    {
        (new PublishArticle)->execute($article);

        return to_route('articles.index')->with('success', 'Article published successfully.');
    }
}
