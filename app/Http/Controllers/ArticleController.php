<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArticleController
{
    public function index(): View
    {
        $articles = Article::orderByDesc('id')->get();

        return view('articles.index', compact('articles'));
    }

    public function create(): View
    {
        $article = new Article();
        return view('articles.create', compact('article'));
    }

    public function store(ArticleRequest $request)
    {
        Article::create($request->validated());

        return redirect()->route('articles.index')->with('success', 'Articulo creado correctamente.');
    }

    public function show(Article $article): View
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function edit(string $id): View
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, string $id): RedirectResponse
    {
        $article = Article::findOrFail($id);
        $article->update($request->validated());

        return redirect()->route('articles.index') ->with('success', 'Articulo creada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', 'Articulo eliminado correctamente.');
    }

}


