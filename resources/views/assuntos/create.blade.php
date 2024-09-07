@extends('layouts.app')

@section('title', 'Adicionar Assunto')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Adicionar Novo Assunto</h1>

    <form action="{{ route('assuntos.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
