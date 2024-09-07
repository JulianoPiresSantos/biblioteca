@extends('layouts.app')

@section('title', 'Detalhes do Livro')

@section('content')
    <h1>Detalhes do Livro</h1>

    <div class="card mb-3">
        <div class="card-header">
            <h3>{{ $livro->Titulo }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Editora:</strong> {{ $livro->Editora }}</p>
            <p><strong>Edição:</strong> {{ $livro->Edicao }}</p>
            <p><strong>Ano de Publicação:</strong> {{ $livro->AnoPublicacao }}</p>
            <p><strong>Valor (R$):</strong> {{ number_format($livro->Valor, 2, ',', '.') }}</p>
        </div>
        <div class="card-footer">
            <p><strong>Autores:</strong></p>
            <ul>
                @foreach ($livro->autores as $autor)
                    <li>{{ $autor->Nome }}</li>
                @endforeach
            </ul>
            <p><strong>Assuntos:</strong></p>
            <ul>
                @foreach ($livro->assuntos as $assunto)
                    <li>{{ $assunto->Descricao }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('livros.index') }}" class="btn btn-primary">Voltar à lista</a>
@endsection
