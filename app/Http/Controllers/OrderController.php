<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController
{
    public function index(): View
    {
        $orders = Order::with(['client'])->get();

        return view('orders.index', compact('orders'));
    }

    public function create(): View
    {
        $order = new Order();
        $clients = Client::all();
        return view('orders.create', compact('order', 'client'));
    }

    public function store(OrderRequest $request): RedirectResponse
    {
        Order::create($request->validated());

        return redirect()->route('orders.index')->with('success', 'Pedido creado correctamente.');
    }

    public function show(Order $order): View
    {
        $order = Order::with(['client'])->findOrFail($order->id);

        return view('orders.show', compact('order'));
    }

    public function edit(string $id): View
    {
        $order = Order::with('client')->findOrFail($id);
        $clients = Client::all();


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