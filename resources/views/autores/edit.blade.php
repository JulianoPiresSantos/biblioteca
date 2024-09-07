@extends('layouts.app')

@section('title', 'Editar Autor')

@section('content')
    <h1>Editar Autor</h1>

    <form action="{{ route('autores.update', $autor->cod_au) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $autor->nome }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
