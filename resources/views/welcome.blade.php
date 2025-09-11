@extends('layouts.app')

@section('title', 'Início')

@section('content')
    <div class="container-fluid">
        <div class="text-center mb-5">
            <h1 class="display-6 fw-semibold text-dark">
                <i class="fas fa-book-open text-primary me-2"></i> Biblioteca TJRJ
            </h1>
            <p class="text-muted">Acesso rápido:</p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-md-3">
                <a href="{{ route('livros.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 text-center p-4 hover-shadow">
                        <i class="fas fa-book fa-3x text-warning mb-3"></i>
                        <h5 class="text-dark">Livros</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('autores.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 text-center p-4 hover-shadow">
                        <i class="fas fa-user fa-3x text-primary mb-3"></i>
                        <h5 class="text-dark">Autores</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('assuntos.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 text-center p-4 hover-shadow">
                        <i class="fas fa-tags fa-3x text-success mb-3"></i>
                        <h5 class="text-dark">Assuntos</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('relatorios.livros') }}" class="text-decoration-none">
                    <div class="card shadow-sm h-100 text-center p-4 hover-shadow">
                        <i class="fas fa-table fa-3x text-danger mb-3"></i>
                        <h5 class="text-dark">Relatório</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

