@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')
    <h1>Editar Livro</h1>

    <form action="{{ route('livros.update', $livro->CodL) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $livro->Titulo }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="editora">Editora</label>
            <input type="text" name="editora" id="editora" class="form-control" value="{{ $livro->Editora }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="edicao">Edição</label>
            <input type="number" name="edicao" id="edicao" class="form-control" value="{{ $livro->Edicao }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="number" name="ano_publicacao" id="ano_publicacao" class="form-control" value="{{ $livro->AnoPublicacao }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="valor">Valor (R$)</label>
            <input type="text" name="valor" id="valor" class="form-control" value="{{ $livro->Valor }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
