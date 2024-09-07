@extends('layouts.app')

@section('title', 'Bem-vindo')

@section('content')
    <div class="container text-center mt-5">
        <h1>Bem-vindo ao Sistema de Gerenciamento de Biblioteca</h1>
        <p>Esse sistema permite gerenciar livros, autores e assuntos de forma eficiente.</p>

        <a href="{{ route('livros.index') }}" class="btn btn-primary mt-3">
            Ver Lista de Livros
        </a>
    </div>
@endsection
