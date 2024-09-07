<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoRequest;
use App\Models\Assunto;
use Illuminate\Http\Request;

class AssuntoController extends Controller
{
    public function index()
    {
        $assuntos = Assunto::all();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create()
    {
        return view('assuntos.create');
    }

    public function store(AssuntoRequest $request)
    {
        Assunto::create($request->all());
        return redirect()->route('assuntos.index')->with('success', 'Assunto adicionado com sucesso!');
    }

    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(AssuntoRequest $request, Assunto $assunto)
    {
        $assunto->update($request->all());
        return redirect()->route('assuntos.index')->with('success', 'Assunto adicionado com sucesso!');
    }

    public function destroy(Assunto $assunto)
    {
        $assunto->delete();
        return redirect()->route('assuntos.index');
    }
}
