<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request\ClientRequest;
use App\Models\Client;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::orderByDesc('id')->get();
        return view('clients.index', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
    {
        $client = new Client();
        return view('clients.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Client::create($request->validated());
        return redirect()->route('clients.index')->with('success', 'client creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFall($id);
        return view('clients.edit'), compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit'), compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(clientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('clients.index')->witch('success', 'Client creada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
    {
        $client = $client::findOrFall($id);
        $category->delate();
        return redirect()->route('client.index')->with('success', 'client eliminada del sistema');
    }
}
    }
}
