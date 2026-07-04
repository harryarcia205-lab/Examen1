<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddress;
use App\Http\Requests\ShippingAddressRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShippingAddressController
{
    public function index(): View
    {
        $shippingAddresses = ShippingAddress::with('customer')->get();

        return view('shipping-addresses.index', compact('shippingAddresses'));
    }

    public function create(): View
    {
        return view('shipping-addresses.create');
    }

    public function store(ShippingAddressRequest $request): RedirectResponse
    {
        ShippingAddress::create($request->validated());

        return redirect()->route('shipping-addresses.index')
            ->with('success', 'Direccion de envio creada correctamente.');
    }

    public function show(ShippingAddress $shippingAddress): View
    {
        $shippingAddress = ShippingAddress::with('customer')->findOrFail($shippingAddress->id);

        return view('shipping-addresses.show', compact('shippingAddress'));
    }

    public function edit(string $id): View
    {
        $shippingAddress = ShippingAddress::findOrFail($id);

        return view('shipping-addresses.edit', compact('shippingAddress'));
    }

    public function update(ShippingAddressRequest $request, string $id): RedirectResponse
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->update($request->validated());

        return redirect()->route('shipping-addresses.index')
            ->with('success', 'Direccion de envio actualizada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->delete();

        return redirect()->route('shipping-addresses.index')
            ->with('success', 'Direccion de envio eliminada correctamente.');
    }
}