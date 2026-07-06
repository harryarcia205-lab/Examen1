<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Tipificado corregido. Ordenar por id desc está bien, 
        // pero "latest()" es un shorthand de Laravel más idiomático.
        $clients = Client::latest()->paginate(20);
        
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request): RedirectResponse
    {
        Client::create($request->validated());
        
        return redirect()->route('clients.index')
            ->with('success', 'El cliente se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client): View
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client): View
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());
        
        return redirect()->route('clients.index')
            ->with('success', 'El cliente se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();
        
        return redirect()->route('clients.index')
            ->with('success', 'El cliente se ha eliminado correctamente.');
    }
}