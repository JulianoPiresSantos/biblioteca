@extends('layouts.app')

@section('title', 'Detalhes do Autor')

@section('content')
    <h1>Detalhes do Autor</h1>

    <div class="card mb-3">
        <div class="card-header">
            <h3>{{ $autor->Nome }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Livros:</strong></p>
            @foreach ($autor->livros as $livro)
                <ul>
                    <li><strong>Título: </strong>{{ $livro->Titulo }}</li>
                    <li><strong>Editora: </strong>{{ $livro->Editora }}</li>
                    <li><strong>Edição: </strong>{{ $livro->Edicao }}</li>
                    <li><strong>Ano da Publicação: </strong>{{ $livro->AnoPublicacao }}</li>
                    <li><strong>Valor (R$): </strong>{{ number_format($livro->valor, 2, ',', '.') }}</li>
                </ul>
                <hr>
            @endforeach
        </div>
    </div>

    <a href="{{ route('autores.index') }}" class="btn btn-primary">Voltar à lista</a>
@endsection
