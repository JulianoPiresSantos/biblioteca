@extends('layouts.app')

@section('title', 'Lista de Livros')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Lista de Livros</h1>
        <a href="{{ route('livros.create') }}" class="btn btn-primary">Adicionar Livro</a>
    </div>

    @if($livros->isEmpty())
        <p>Não há livros cadastrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Editora</th>
                <th>Ano de Publicação</th>
                <th>Valor (R$)</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->CodL }}</td>
                    <td>{{ $livro->Titulo }}</td>
                    <td>{{ $livro->Editora }}</td>
                    <td>{{ $livro->AnoPublicacao }}</td>
                    <td>{{ number_format($livro->valor, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('livros.edit', $livro->CodL) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('livros.destroy', $livro->CodL) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
