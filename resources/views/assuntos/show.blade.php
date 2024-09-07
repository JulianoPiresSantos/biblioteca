@extends('layouts.app')

@section('title', 'Detalhes do Assunto')

@section('content')
    <h1>Detalhes do Assunto</h1>

    <div class="card mb-3">
        <div class="card-header">
            <h3>{{ $assunto->Descricao }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Livros:</strong></p>
            @forelse ($assunto->livros as $livro)
                <ul>
                    <li><strong>Título: </strong>{{ $livro->Titulo }}</li>
                    <li><strong>Editora: </strong>{{ $livro->Editora }}</li>
                    <li><strong>Edição: </strong>{{ $livro->Edicao }}</li>
                    <li><strong>Ano da Publicação: </strong>{{ $livro->AnoPublicacao }}</li>
                    <li><strong>Valor (R$): </strong>{{ number_format($livro->valor, 2, ',', '.') }}</li>
                </ul>
                <hr>
            @empty
                <p>Não há Livros cadastrados para este Assunto</p>
            @endforelse
        </div>
    </div>

    <a href="{{ route('assuntos.index') }}" class="btn btn-primary">Voltar à lista</a>
@endsection
