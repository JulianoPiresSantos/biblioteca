@extends('layouts.app')

@section('title', 'Editar Autor')

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
    <h1>Editar Autor</h1>

    <form action="{{ route('autores.update', $autor->CodAu) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" name="Nome" id="nome" class="form-control" value="{{ $autor->Nome }}">
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
