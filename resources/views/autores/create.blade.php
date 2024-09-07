@extends('layouts.app')

@section('title', 'Adicionar Autor')

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
    <h1>Adicionar Novo Autor</h1>

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="Nome" id="nome" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
