{{--@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-table me-2"></i>Relatório</h2>
        <a href="{{ route('relatorios.livros') }}" class="btn btn-secondary btn-sm" title="PDF">
            <i class="fas fa-file-alt"></i> Relatório
        </a>
    </div>

    <div class="table-responsive">
        <table>
            <thead>
            <tr>
                <th>Autor</th>
                <th>Livro</th>
                <th>Editora</th>
                <th>Edição</th>
                <th>Ano de Publicação</th>
                <th>Assunto(s)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($livros as $autor => $listaLivros)
                @foreach ($listaLivros as $i => $livro)
                    <tr>
                        @if ($i == 0)
                            <td rowspan="{{ count($listaLivros) }}">
                                {{ $autor }}
                            </td>
                        @endif
                        <td>{{ $livro->livro }}</td>
                        <td>{{ $livro->editoras }}</td>
                        <td>{{ $livro->edicao . "ª"}}</td>
                        <td>{{ $livro->ano_publicacao }}</td>
                        <td>{{ $livro->assuntos }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('livros.index') }}" class="btn btn-primary mt-3">
        <i class="fas fa-arrow-left"></i> Voltar à lista
    </a>
@endsection--}}
@extends('layouts.app')

@section('title', 'Relatório')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-table me-2"></i>Relatório</h2>
        <a href="{{ route('relatorios.livros') }}" class="btn btn-secondary btn-sm" title="PDF">
            <i class="fas fa-file-alt"></i> Relatório
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle w-auto">
            <thead class="table-light">
            <tr>
                <th>Autor</th>
                <th>Livro</th>
                <th>Editora</th>
                <th>Edição</th>
                <th>Ano de Publicação</th>
                <th>Assunto(s)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($livros as $autor => $listaLivros)
                @foreach ($listaLivros as $i => $livro)
                    <tr>
                        @if ($i == 0)
                            <td rowspan="{{ count($listaLivros) }}">
                                {{ $autor }}
                            </td>
                        @endif
                        <td>{{ $livro->livro }}</td>
                        <td>{{ $livro->editoras }}</td>
                        <td>{{ $livro->edicao . "ª"}}</td>
                        <td>{{ $livro->ano_publicacao }}</td>
                        <td>{{ $livro->assuntos }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('livros.index') }}" class="btn btn-primary mt-3">
        <i class="fas fa-arrow-left"></i> Voltar à lista
    </a>
@endsection

