@extends('layouts.app')

@section('title', 'Informações do Assunto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-tag me-2"></i>Assunto</h2>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle w-auto">
            <tbody>
            <tr>
                <th class="text-end">Descrição:</th>
                <td>{{ $assunto->Descricao }}</td>
            </tr>
            <tr>
                <th class="text-end align-top">Livros:</th>
                <td>
                    @forelse ($assunto->livros as $livro)
                        <table class="table table-sm table-bordered mb-4">
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
                                <th>Ano da Publicação:</th>
                                <td>{{ $livro->AnoPublicacao }}</td>
                            </tr>
                            <tr>
                                <th>Valor:</th>
                                <td>{{ "R$" . number_format($livro->Valor, 2, ',', '.') }}</td>
                            </tr>
                            </tbody>
                        </table>
                    @empty
                        <p class="mb-0">Nenhum livro relacionado a este assunto.</p>
                    @endforelse
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('assuntos.index') }}" class="btn btn-primary mt-3">
        <i class="fas fa-arrow-left"></i> Voltar à lista
    </a>
@endsection

