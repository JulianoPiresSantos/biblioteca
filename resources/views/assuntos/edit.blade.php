@extends('layouts.app')

@section('title', 'Editar Assunto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-tags me-2"></i>Editar assunto</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('relatorios.livros') }}" class="btn btn-secondary btn-sm">
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
    <form action="{{ route('assuntos.update', $assunto->codAs) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">
                Descrição<span class="text-danger">*</span>
            </label>
            <input type="text" name="Descricao" id="descricao" class="form-control" value="{{ old('Nome', $assunto->Descricao) }}">
        </div>
        <div class="d-flex justify-content-beginning">
            <a href="{{ route('assuntos.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check me-1"></i> Atualizar
            </button>
        </div>
    </form>
@endsection
