@extends('layouts.app')

@section('title', 'Adicionar Assunto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-tags me-2"></i>Cadastrar assunto</h2>
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
    <form action="{{ route('assuntos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Descrição" class="form-label">
                Descrição<span class="text-danger">*</span>
            </label>
            <input type="text" name="Descricao" id="descricao" class="form-control" value="{{ old('Descricao') }}" placeholder="Preencha novo assunto...">
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('assuntos.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check me-1"></i> Salvar
            </button>
        </div>
    </form>
@endsection

