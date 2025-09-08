@extends('layouts.app')

@section('title', 'Lista de Assuntos')

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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Assuntos</h1>
        <div>
            <form action="{{ route('assuntos.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Pesquisar por descrição" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </form>
        </div>
        <div>
            <a href="{{ route('assuntos.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i> Adicionar
            </a>
        </div>
    </div>

    @if($assuntos->isEmpty())
        <p>Não há assuntos cadastrados.</p>
        <div class="alert alert-warning">Nenhum registro encontrado.</div>
    @else
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($assuntos as $assunto)
                        <tr>
                            <td>{{ $assunto->codAs }}</td>
                            <td>{{ $assunto->Descricao }}</td>
                            <td>
                                <a href="{{ route('assuntos.show', $assunto->codAs) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i> Visualizar
                                </a>
                                <a href="{{ route('assuntos.edit', $assunto->codAs) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('assuntos.destroy', $assunto->codAs) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Tem certeza que deseja excluir este assunto?')">
                                        <i class="fas fa-trash-alt"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $assuntos->links() }}
        </div>
    @endif
@endsection
