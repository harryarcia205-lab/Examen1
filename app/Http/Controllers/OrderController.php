<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Address_shipping;
use Illuminate\Http\RedirectResponse; 
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with("customer")->get();
        return view("orders.index", compact("orders"));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        $customers = Customer::all();
        
        // CORRECCIÓN: Cambiado a $addresses para que coincida con la vista
        $addresses = Address_shipping::all(); 
        
        return view('orders.create', compact('order', 'customers', 'addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        Order::create($request->validated());
        
        // Mensaje con ortografía corregida
        return redirect()->route('orders.index')->with('success', 'La orden ha sido creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = Order::with('customer')->findOrFail($order->id);
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::with('customer')->findOrFail($id);
        $customers = Customer::all();
        
        // CORRECCIÓN: Cambiado a $addresses para que coincida con la vista
        $addresses = Address_shipping::all(); 
        
        return view('orders.edit', compact('order', 'customers', 'addresses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, string $id): RedirectResponse
    {
        $order = Order::with('customer')->findOrFail($id);
        $order->update($request->validated());
        
        // Mensaje con ortografía corregida
        return redirect()->route('orders.index')->with('success', 'La orden ha sido actualizada correctamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::with('customer')->findOrFail($id);
        $order->delete();
        
        // Mensaje con ortografía corregida
        return redirect()->route('orders.index')->with('success', 'La orden ha sido eliminada correctamente.');
    }
}