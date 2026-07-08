<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Http\Requests\OrderLineRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderLineController
{
    public function index(): View
    {
        $orderLines = OrderLine::with(['order'])->get();

        return view('order-lines.index', compact('orderLines'));
    }

    public function create(): View

    {
        $orderLine = new OrderLine();
        $orders = Order::all();

        return view('order-lines.create', compact('orderLine', 'orders'));
    }

    public function store(OrderLineRequest $request): RedirectResponse
    {
        OrderLine::create($request->validated());

        return redirect()->route('order-lines.index') ->with('success', 'Linea de pedido creada correctamente.');
    }

    public function show(OrderLine $orderLine): View
    {
        $orderLine = OrderLine::with(['order',])->findOrFail($orderLine->id);
        $orders = Order::all();
        return view('order-lines.show', compact('orderLine'));
    }

    public function edit(string $id): View
    {
        $orderLine = OrderLine::with(['order'])->findOrFail($id);
        $orders = Order::all();

        return view('order-lines.edit', compact('orderLine', 'orders'));
    }

    public function update(OrderLineRequest $request, string $id): RedirectResponse
    {
        $orderLine = OrderLine::with(['order'])->findOrFail($id);
        $orderLine->update($request->validated());

        return redirect()->route('order-lines.index')
            ->with('success', 'Linea de pedido actualizada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $orderLine = OrderLine::findOrFail($id);
        $orderLine->delete();

        return redirect()->route('order-lines.index')
            ->with('success', 'Linea de pedido eliminada correctamente.');
    }
}