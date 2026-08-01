<?php

namespace App\Http\Controllers;

use App\Models\ShippingAddresses;
use App\Http\Requests\ShippingAddressesRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShippingAddressController
{
    public function index(): View
    {
        $shippingAddresses = ShippingAddresses::with('client')->get();

        return view('shipping-addresses.index', compact('shippingAddresses'));
    }

    public function create(): View
    {
        return view('shipping-addresses.create');
    }

    public function store(ShippingAddressesRequest $request): RedirectResponse
    {
        ShippingAddresses::create($request->validated());

        return redirect()->route('shipping-addresses.index')
            ->with('success', 'Direccion de envio creada correctamente.');
    }

    public function show(ShippingAddresses $shippingAddresses): View
    {
        $shippingAddresses = ShippingAddresses::with('client')->findOrFail($shippingAddresses->id);

        return view('shipping-addresses.show', compact('shippingAddresses'));
    }

    public function edit(string $id): View
    {
        $shippingAddresses = ShippingAddresses::findOrFail($id);

        return view('shipping-addresses.edit', compact('shippingAddresses'));
    }

    public function update(ShippingAddressesRequest $request, string $id): RedirectResponse
    {
        $shippingAddresses = ShippingAddresses::findOrFail($id);
        $shippingAddresses->update($request->validated());

        return redirect()->route('shipping-addresses.index')
            ->with('success', 'Direccion de envio actualizada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $shippingAddresses = ShippingAddresses::findOrFail($id);
        $shippingAddresses->delete();

        return redirect()->route('shipping-addresses.index')
            ->with('success', 'Direccion de envio eliminada correctamente.');
    }
}