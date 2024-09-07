@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Editar Livro</h1>

    <form action="{{ route('livros.update', $livro->CodL) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" name="Titulo" id="titulo" class="form-control" value="{{ $livro->Titulo }}">
        </div>
        <div class="form-group mb-3">
            <label for="editora">Editora</label>
            <input type="text" name="Editora" id="editora" class="form-control" value="{{ $livro->Editora }}">
        </div>
        <div class="form-group mb-3">
            <label for="edicao">Edição</label>
            <input type="number" name="Edicao" id="edicao" class="form-control" value="{{ $livro->Edicao }}">
        </div>
        <div class="form-group mb-3">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input type="number" name="AnoPublicacao" id="ano_publicacao" class="form-control" value="{{ $livro->AnoPublicacao }}">
        </div>
        <div class="form-group mb-3">
            <label for="valor">Valor (R$)</label>
            <input type="text" name="Valor" id="valor" class="form-control" value="{{ $livro->Valor }}">
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
