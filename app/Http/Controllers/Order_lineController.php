<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order_line;
use App\Http\Requests\Order_lineRequest;
use App\Models\Article;
use illuminate\Http\RedirectResponse;
use Illuminate\View\View;   

class Order_lineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_lines = Order_line::with("article")->get();
        return view("order_lines.index", compact("order_lines"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order_line = new Order_line();
        $articles = Article::all();
        return view('order_lines.create',compact('order_line','articles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Order_lineRequest $request)
    {
        Order_line::create($request->validated());
        return redirect()->route('order_lines.index')->with('success', 'Líneas de pedido creadas correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order_line $order_line)
    {
        $order_line = Order_line::with('article')->findOrFail($order_line->id);
        return view('order_lines.show', compact('order_line'));
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order_line = Order_line::with('article')->findOrFail($id);
        $articles = Article::all();
        return view('order_lines.edit', compact('order_line', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Order_lineRequest $request, string $id): RedirectResponse
    {
        $order_line = Order_line::with('article')->findOrFail($id);
        $order_line->update($request->validated());
        return redirect()->route('order_lines.index')->with('success', 'Líneas de pedido actualizadas correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_line = Order_line::with('article')->findOrFail($id);
        $order_line->delete();
        return redirect()->route('order_lines.index')->with('success', 'Líneas de pedido eliminadas correctamente.');
    }
}