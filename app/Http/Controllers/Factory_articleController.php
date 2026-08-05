<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Factory_articleRequest;
use App\Models\Factory_article;
use App\Models\Article;
use illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class Factory_articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factory_articles = Factory_article::with("article")->get();
        return view("factory_articles.index", compact("factory_articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $factory_article = new Factory_article();
        $articles = Article::all();
        return view('factory_articles.create',compact('factory_article','articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Factory_articleRequest $request)
    {
        Factory_article::create($request->validated());
        return redirect()->route('factory_articles.index')->with('success', 'Artículos de fábrica creados correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factory_article $factory_article)
    {
        $factory_article = Factory_article::with('article')->findOrFail($factory_article->id);
        return view('factory_articles.show', compact('factory_article'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $factory_article = Factory_article::with('article')->findOrFail($id);
        $articles = Article::all();
        return view('factory_articles.edit', compact('factory_article', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Factory_articleRequest $request, string $id): RedirectResponse
    {
        $factory_article = Factory_article::with('article')->findOrFail($id);
        $factory_article->update($request->validated());
        return redirect()->route('factory_articles.index')->with('success', 'Artículos de fábrica actualizados correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factory_article = Factory_article::with('article')->findOrFail($id);
        $factory_article->delete();
        return redirect()->route('factory_articles.index')->with('success', 'Artículos de fábrica eliminados correctamente.');
    }
}