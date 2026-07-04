<?php

namespace App\Http\Controllers;

use App\Models\FactoryArticles;
use App\Http\Requests\FactoryArticleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FactoryArticleController
{
    public function index(): View
    {
        $records = FactoryArticles::with(['factory', 'article'])->get();

        return view('factory-articles.index', compact('records'));
    }

    public function create(): View
    {
        return view('factory-articles.create');
    }

    public function store(FactoryArticleRequest $request): RedirectResponse
    {
        FactoryArticles::create($request->validated());

        return redirect()->route('factory-articles.index')
            ->with('success', 'Relacion fabrica-articulo creada correctamente.');
    }

    public function show(FactoryArticles $factoryArticle): View
    {
        $record = $factoryArticle->load(['factory', 'article']);

        return view('factory-articles.show', compact('record'));
    }

    public function edit(FactoryArticles $factoryArticle): View
    {
        return view('factory-articles.edit', ['record' => $factoryArticle]);
    }

    public function update(FactoryArticleRequest $request, FactoryArticles $factoryArticle): RedirectResponse
    {
        $factoryArticle->update($request->validated());

        return redirect()->route('factory-articles.index')
            ->with('success', 'Relacion fabrica-articulo actualizada correctamente.');
    }

    public function destroy(FactoryArticles $factoryArticle): RedirectResponse
    {
        $factoryArticle->delete();

        return redirect()->route('factory-articles.index')
            ->with('success', 'Relacion fabrica articulo eliminada correctamente.');
    }
}