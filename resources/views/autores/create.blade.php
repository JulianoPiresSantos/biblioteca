@extends('layouts.app')

@section('title', 'Adicionar Autor')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-user-edit me-2"></i>Cadastrar Autor</h2>
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
    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">
                Nome <span class="text-danger">*</span>
            </label>
            <input type="text" name="Nome" id="nome" class="form-control" value="{{ old('Nome') }}">
        </div>

        <div class="d-flex justify-content-beginning">
            <a href="{{ route('autores.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check me-1"></i> Salvar
            </button>
        </div>
    </form>
@endsection
