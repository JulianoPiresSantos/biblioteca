@extends('layouts.app')

@section('title', 'Autor')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-user me-2"></i>Autores</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('autores.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Adicionar
            </a>
            <a href="{{ route('relatorios.livros') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-file-alt"></i> Relatório
            </a>
        </div>
    </div>
    <form action="{{ route('autores.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar por nome" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fas fa-search"></i> Buscar
            </button>
        </div>
    </form>
    @if($autores->isEmpty())
        <div class="alert alert-warning">Nenhum autor encontrado.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($autores as $autor)
                    <tr>
                        <td>{{ $autor->CodAu }}</td>
                        <td>{{ $autor->Nome }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('autores.show', $autor->CodAu) }}" class="btn btn-info" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este autor?')">
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
            @include('components.perpage')
            {{ $autores->links() }}
        </div>
    @endif
@endsection
