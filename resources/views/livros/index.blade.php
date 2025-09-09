@extends('layouts.app')

@section('title', 'Livros')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-book me-2"></i> Livros</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('livros.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Adicionar
            </a>
            <a href="{{ route('relatorios.livros') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-file-alt"></i> Relatório
            </a>
        </div>
    </div>

    <form action="{{ route('livros.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar por título" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fas fa-search"></i> Buscar
            </button>
        </div>
    </form>

    @if($livros->isEmpty())
        <div class="alert alert-warning">Nenhum livro encontrado.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
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
                                <a href="{{ route('livros.show', $livro->CodL) }}" class="btn btn-info" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('livros.edit', $livro->CodL) }}" class="btn btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('livros.destroy', $livro->CodL) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este livro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Excluir">
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

        <div class="mt-3 d-flex justify-content-center">
            {{ $livros->links() }}
        </div>
    @endif
@endsection

