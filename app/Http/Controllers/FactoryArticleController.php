<?php

namespace App\Http\Controllers;

use App\Models\FactoryArticles; // Nota: Idealmente debería ser FactoryArticle
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
            ->with('success', 'Relación fábrica-artículo creada correctamente.');
    }

    public function show(FactoryArticles $factoryArticle): View
    {
        // Corregido: Añadido el tipo de retorno View
        $record = $factoryArticle->load(['factory', 'article']);

        return view('factory-articles.show', compact('record'));
    }

    public function edit(FactoryArticles $factoryArticle): View
    {
        // Corregido: Eliminado el ';' intruso y añadido tipo de retorno View
        return view('factory-articles.edit', ['record' => $factoryArticle]);
    }

    public function update(FactoryArticleRequest $request, FactoryArticles $factoryArticle): RedirectResponse
    {
        $factoryArticle->update($request->validated());

        return redirect()->route('factory-articles.index')
            ->with('success', 'Relación fábrica-artículo actualizada correctamente.');
    }

    public function destroy(FactoryArticles $factoryArticle): RedirectResponse
    {
        $factoryArticle->delete();

        return redirect()->route('factory-articles.index')
            ->with('success', 'Relación fábrica-artículo eliminada correctamente.');
    }
}