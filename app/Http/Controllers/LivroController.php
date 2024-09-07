<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with('autores', 'assuntos')->get();
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();
        //dd( compact('autores', 'assuntos'));
        return view('livros.create', compact('autores', 'assuntos'));
    }

    public function store(LivroRequest $request)
    {
        //dd($request->all());
        $livro = Livro::create($request->all());
        $livro->autores()->sync($request->input('autores', []));
        $livro->assuntos()->sync($request->input('assuntos', []));
        return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso!');
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    public function update(LivroRequest $request, Livro $livro)
    {
        $livro->update($request->all());
        $livro->autores()->sync($request->input('autores', []));
        $livro->assuntos()->sync($request->input('assuntos', []));
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function show(Livro $livro)
    {
        $livro->load('autores', 'assuntos');

        return view('livros.show', compact('livro'));
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index');
    }
}
