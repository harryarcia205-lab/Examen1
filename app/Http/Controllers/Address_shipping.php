<?php

namespace App\Http\Controllers;

use App\Models\Address_shipping;
use App\Http\Requests\Address_shippingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class Address_shippingController
{
    public function index(): View
    {
        $shippingAddress = Address_shipping::with('client')->get();

        return view('address_shipping.index', compact('shippingAddress'));
    }

    public function create(): View
    {
        return view('address_shipping.create');
    }

    public function store(Address_shippingRequest $request): RedirectResponse
    {
        Address_shipping::create($request->validated());

        return redirect()->route('address_shipping.index')
            ->with('success', 'Direccion de envio creada correctamente.');
    }

    public function show(Address_shipping $shippingAddress): View
    {
        $shippingAddress = Address_shipping::with('client')->findOrFail($shippingAddress->id);

        return view('address_shipping.show', compact('shippingAddress'));
    }

    public function edit(string $id): View
    {
        $shippingAddress = Address_shipping::findOrFail($id);

        return view('address_shipping.edit', compact('shippingAddress'));
    }

    public function update(Address_shippingRequest $request, string $id): RedirectResponse
    {
        $shippingAddress = Address_shipping::findOrFail($id);
        $shippingAddress->update($request->validated());

        return redirect()->route('address_shipping.index')
            ->with('success', 'Direccion de envio actualizada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $shippingAddress = Address_shipping::findOrFail($id);
        $shippingAddress->delete();

        return redirect()->route('address_shipping.index')
            ->with('success', 'Direccion de envio eliminada correctamente.');
    }
}