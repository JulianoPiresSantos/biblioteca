@extends('layouts.app')

@section('title', 'Lista de Livros')

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

    <div class="row">
        <h1>Lista de Livros</h1>
        <div class="col d-flex justify-content-end">
            <a href="{{ route('livros.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i> Adicionar
            </a>
            &nbsp;
            <a href="{{ route('relatorios.livros') }}" class="btn btn-sm btn-info">
                <i class="fas fa-plus mr-2"></i> Relatório
            </a>
        </div>
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
                    <td>{{ number_format($livro->Valor, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('livros.show', $livro->CodL) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Visualizar
                        </a>
                        <a href="{{ route('livros.edit', $livro->CodL) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('livros.destroy', $livro->CodL) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
