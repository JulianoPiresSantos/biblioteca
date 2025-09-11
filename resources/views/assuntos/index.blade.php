@extends('layouts.app')

@section('title', 'Assunto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-tags me-2"></i>Assuntos</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('assuntos.create') }}" class="btn btn-primary btn-sm" title="Novo assunto">
                <i class="fas fa-plus"></i> Adicionar
            </a>
            <a href="{{ route('relatorios.livros') }}" class="btn btn-secondary btn-sm" title="PDF">
                <i class="fas fa-file-alt"></i> Relatório
            </a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('assuntos.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar por descrição" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fas fa-search"></i> Buscar
            </button>
        </div>
    </form>
    @if($assuntos->isEmpty())
        <div class="alert alert-warning">Nenhum assunto encontrado.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                <tr>
                    {{--<th>ID</th>--}}
                    <th>Descrição</th>
                    <th class="col-acoes">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($assuntos as $assunto)
                    <tr>
                        {{--<td>{{ $assunto->codAs }}</td>--}}
                        <td>{{ $assunto->Descricao }}</td>
                        <td class="col-acoes">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('assuntos.show', $assunto->codAs) }}" class="btn btn-info" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('assuntos.edit', $assunto->codAs) }}" class="btn btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('assuntos.destroy', $assunto->codAs) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este assunto?')">
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
            {{ $assuntos->links() }}
        </div>
    @endif
@endsection
