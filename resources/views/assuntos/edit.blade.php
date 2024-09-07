@extends('layouts.app')

@section('title', 'Editar Assunto')

@section('content')
    <h1>Editar Assunto</h1>

    <form action="{{ route('assuntos.update', $assunto->cod_as) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $assunto->descricao }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
