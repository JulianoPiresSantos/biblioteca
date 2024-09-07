@extends('layouts.app')

@section('title', 'Lista de Autores')

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
    <div class="d-flex justify-content-between mb-3">
        <h1>Lista de Autores</h1>
        <a href="{{ route('autores.create') }}"
           class="btn btn-sm btn-primary d-flex align-items-center px-3 py-1">
            <i class="fas fa-plus mr-2"></i> Adicionar
        </a>
    </div>

    @if($autores->isEmpty())
        <p>Não há autores cadastrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
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
                    <td>
                        <a href="{{ route('autores.show', $autor->CodAu) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Visualizar
                        </a>
                        <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja exculir este autor?')">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
