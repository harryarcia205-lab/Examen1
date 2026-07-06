<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController
{
    public function index(): View
    {
        // Traemos solo lo necesario para la lista principal
        $orders = Order::with(['customer', 'shippingAddress'])->get();

        return view('orders.index', compact('orders'));
    }

    public function create(): View
    {
        return view('orders.create');
    }

    public function store(OrderRequest $request): RedirectResponse
    {
        Order::create($request->validated());

        return redirect()->route('orders.index')
            ->with('success', 'Pedido creado correctamente.');
    }

    public function show(Order $order): View
    {
        // En lugar de findOrFail, cargamos las relaciones sobre el objeto que Laravel ya buscó
        $order->load(['customer', 'shippingAddress', 'orderLines.article']);

        return view('orders.show', compact('order'));
    }

    public function edit(Order $order): View
    {
        // Route Model Binding aplicado: nos ahorramos el findOrFail
        return view('orders.edit', compact('order'));
    }

    public function update(OrderRequest $request, Order $order): RedirectResponse
    {
        $order->update($request->validated());

        return redirect()->route('orders.index')
            ->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Pedido eliminado correctamente.');
    }
}