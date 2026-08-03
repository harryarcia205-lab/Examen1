<?php

namespace App\Http\Controllers;

use App\Models\Address_shipping;
use App\Http\Requests\ShippingAddressRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShippingAddressController
{
    public function index(): View
    {
        $shippingAddress = ShippingAddress::with('client')->get();

        return view('shippingAddress.index', compact('shippingAddress'));
    }

    public function create(): View
    {
        return view('shippingAddress.create');
    }

    public function store(ShippingAddressRequest $request): RedirectResponse
    {
        ShippingAddress::create($request->validated());

        return redirect()->route('shippingAddress.index')
            ->with('success', 'Direccion de envio creada correctamente.');
    }

    public function show(ShippingAddress $shippingAddress): View
    {
        $shippingAddress = ShippingAddress::with('client')->findOrFail($shippingAddress->id);

        return view('shippingAddress.show', compact('shippingAddress'));
    }

    public function edit(string $id): View
    {
        $shippingAddress = ShippingAddress::findOrFail($id);

        return view('shippingAddress.edit', compact('shippingAddress'));
    }

    public function update(ShippingAddressRequest $request, string $id): RedirectResponse
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->update($request->validated());

        return redirect()->route('shippingAddress.index')
            ->with('success', 'Direccion de envio actualizada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $shippingAddress = ShippingAddress::findOrFail($id);
        $shippingAddress->delete();

        return redirect()->route('shippingAddress.index')
            ->with('success', 'Direccion de envio eliminada correctamente.');
    }
}