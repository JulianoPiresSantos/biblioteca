@extends('layouts.app')

@section('title', 'Informações do Livro')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-book me-2"></i>Livro</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle w-auto">
            <tbody>
            <tr>
                <th>Título:</th>
                <td>{{ $livro->Titulo }}</td>
            </tr>
            <tr>
                <th>Editora:</th>
                <td>{{ $livro->Editora }}</td>
            </tr>
            <tr>
                <th>Edição:</th>
                <td>{{ $livro->Edicao . "ª"}}</td>
            </tr>
            <tr>
                <th>Ano de Publicação:</th>
                <td>{{ $livro->AnoPublicacao }}</td>
            </tr>
            <tr>
                <th>Valor:</th>
                <td>{{ "R$" . number_format($livro->Valor, 2, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Autores:</th>
                <td>
                    <ul class="mb-0">
                        @foreach ($livro->autores as $autor)
                            <li>{{ $autor->Nome }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Assuntos:</th>
                <td>
                    <ul class="mb-0">
                        @foreach ($livro->assuntos as $assunto)
                            <li>{{ $assunto->Descricao }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('livros.index') }}" class="btn btn-primary mt-3">
        <i class="fas fa-arrow-left"></i> Voltar à lista
    </a>
@endsection

