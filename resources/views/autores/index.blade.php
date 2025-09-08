@extends('layouts.app')

@section('title', 'Lista de Autores')

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
        <h1 class="h3">Autores</h1>
        <div>
            <form action="{{ route('autores.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Pesquisar por nome" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>
        <div>
            <a href="{{ route('autores.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i> Adicionar
            </a>
        </div>
    </div>

    @if($autores->isEmpty())
        <div class="alert alert-warning">Nenhum registro encontrado.</div>
    @else
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered mb-0">
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
                                    <a href="{{ route('autores.show', $autor->CodAu) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i> Visualizar
                                    </a>
                                    <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger"
                                                onclick="return confirm('Tem certeza que deseja exculir este autor?')">
                                            <i class="fas fa-trash-alt"></i> Excluir
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
            {{ $autores->links() }}
        </div>
    @endif
@endsection
