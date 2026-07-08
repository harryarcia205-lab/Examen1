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
        $records = FactoryArticles::with('factory')->get();

        return view('factory-articles.index', compact('factoryArticles'));
    }

    public function create(): View
    {
        $factoryArticle = new FactoryArticles();

        return view('factory-articles.create', compact('factoryArticle', 'factories', 'articles'));
    }

    public function store(FactoryArticleRequest $request): RedirectResponse
    {
        FactoryArticles::create($request->validated());

        return redirect()->route('factory-articles.index')->with('success', 'fabrica-articulo creada correctamente.');
    }

    public function show(FactoryArticles $factoryArticle): View
    {
       $factoryArticle = FactoryArticles::with('factory')->findOrFail($factoryArticle->id);

        return view('factory-articles.show', compact('factoryArticle'));
    }

    public function edit(FactoryArticles $factoryArticle): View
    {
        $factoryArticle = FactoryArticles::with('factory')->findOrFail($id);
       $factories = Factory::all();
        return view('factory-articles.edit', compact('factoryArticle', 'factories', 'articles'));
    }

    public function update(FactoryArticle $request, string $id): RedirectResponse
    {
        $factoryArticle->update($request->validated());

        return redirect()->route('factory-articles.index')->with('success', 'Relacion fabrica-articulo actualizada correctamente.');
    }

    public function destroy(FactoryArticles $factoryArticle): RedirectResponse
    {
        $factoryArticle = FactoryArticles::with('factory')->findOrFail($id);
        $factoryArticle->delete();
        return redirect()->route('factory-articles.index')->with('success', 'fabrica articulo eliminada correctamente.');
    }
}