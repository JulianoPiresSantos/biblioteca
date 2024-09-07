@extends('layouts.app')

@section('title', 'Adicionar Assunto')

@section('content')
    <h1>Adicionar Novo Assunto</h1>

    <form action="{{ route('assuntos.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
