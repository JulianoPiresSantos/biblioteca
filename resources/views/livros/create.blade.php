@extends('layouts.app')

@section('title', 'Adicionar Livro')

@section('content')
    <h1>Adicionar Novo Livro</h1>

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" name="Titulo" id="titulo" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="editora">Editora</label>
            <input type="text" name="Editora" id="editora" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="edicao">Edição</label>
            <input type="number" name="Edicao" id="edicao" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="number" name="AnoPublicacao" id="ano_publicacao" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="valor">Valor (R$)</label>
            <input type="text" name="Valor" id="valor" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
