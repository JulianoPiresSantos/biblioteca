@extends('layouts.app')

@section('title', 'Lista de Livros')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Livros</h1>
        <div>
            <form action="{{ route('livros.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Pesquisar por título" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>
        <div>
            <a href="{{ route('livros.create') }}" class="btn btn-primary btn-sm me-2">
                <i class="fas fa-plus"></i> Adicionar
            </a>
            <a href="{{ route('relatorios.livros') }}" class="btn btn-info btn-sm">
                <i class="fas fa-file-alt"></i> Relatório
            </a>
        </div>
    </div>
    @if($livros->isEmpty())
        <div class="alert alert-warning">Nenhum registro encontrado.</div>
    @else
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered mb-0">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Editora</th>
                        <th>Ano de Publicação</th>
                        <th>Valor (R$)</th>
                        <th class="text-center">Ações</th>
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
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('livros.show', $livro->CodL) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('livros.edit', $livro->CodL) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('livros.destroy', $livro->CodL) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este livro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $livros->links() }}
        </div>
    @endif
@endsection
