<?php

namespace App\Http\Controllers;

use App\Models\Factory;
use App\Http\Requests\FactoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FactoryController
{
    public function index(): View
    {
        $factories = Factory::orderByDesc ('id')->get();

        return view('factories.index', compact('factories'));
    }

    public function create(): View
    {
        $factories = Factory::orderByDesc ('id')->get();
        return view('factories.create');
    }

    public function store(FactoryRequest $request): RedirectResponse
    {
        Factory::create($request->validated());

        return redirect()->route('factories.index')->with('success', 'Fabrica creada correctamente.');
    }

    public function show(Factory $factory): View
    {
        $factory = Factory::findOrFail($id);

        return view('factories.show', compact('factory'));
    }

    public function edit(string $id): View
    {
        $factory = Factory::findOrFail($id);
        return view('factories.edit', compact('factory'));
    }

    public function update(FactoryRequest $request, Factory $factory)
    {
        $factory->update($request->validated());

        return redirect()->route('factories.index') ->with('success', 'Fabrica creada correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $factory = Factory::findOrFail($id);
        $factory->delete();

        return redirect()->route('factories.index')
            ->with('success', 'Fabrica eliminada correctamente.');
    }
}