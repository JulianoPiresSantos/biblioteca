@extends('layouts.app')

@section('title', 'Adicionar Autor')

@section('content')
    <h1>Adicionar Novo Autor</h1>

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="Nome" id="nome" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
