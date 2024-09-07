@extends('layouts.app')

@section('title', 'Lista de Autores')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Lista de Autores</h1>
        <a href="{{ route('autores.create') }}" class="btn btn-primary">Adicionar Autor</a>
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
                        <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST" class="d-inline">
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
