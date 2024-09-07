@extends('layouts.app')

@section('title', 'Lista de Assuntos')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h1>Lista de Assuntos</h1>
        <a href="{{ route('assuntos.create') }}" class="btn btn-primary">Adicionar Assunto</a>
    </div>

    @if($assuntos->isEmpty())
        <p>Não há assuntos cadastrados.</p>
    @else
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
                        <a href="{{ route('assuntos.edit', $assunto->codAs) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('assuntos.destroy', $assunto->codAs) }}" method="POST" class="d-inline">
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
