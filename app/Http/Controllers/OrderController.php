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
        $order = Order::with(['customer', 'shippingAddress', 'orderLines.article'])->findOrFail($order->id);

        return view('orders.show', compact('order'));
    }

    public function edit(string $id): View
    {
        $order = Order::findOrFail($id);

        return view('orders.edit', compact('order'));
    }

    public function update(OrderRequest $request, string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->update($request->validated());

        return redirect()->route('orders.index')
            ->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Pedido eliminado correctamente.');
    }
}