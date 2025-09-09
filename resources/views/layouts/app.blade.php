<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Biblioteca</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: row;
        }

        .sidebar {
            width: 220px;
            background-color: #343a40;
            padding: 20px 15px;
            color: #fff;
            min-height: 100vh;
        }

        .sidebar a {
            color: #adb5bd;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }

        .sidebar a.active,
        .sidebar a:hover {
            color: #fff;
            background-color: #495057;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .navbar-brand {
            font-size: 1.3rem;
            color: #fff;
            font-weight: bold;
        }
        .hover-shadow:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15) !important;
            transition: all 0.3s ease-in-out;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="mb-4">
        <a href="{{ route('welcome') }}" class="navbar-brand">
            <i class="fas fa-book-open"></i> Biblioteca
        </a>
    </div>
    <a href="{{ route('livros.index') }}" class="{{ request()->is('livros*') ? 'active' : '' }}">
        <i class="fas fa-book"></i> Livros
    </a>
    <a href="{{ route('autores.index') }}" class="{{ request()->is('autores*') ? 'active' : '' }}">
        <i class="fas fa-user"></i> Autores
    </a>
    <a href="{{ route('assuntos.index') }}" class="{{ request()->is('assuntos*') ? 'active' : '' }}">
        <i class="fas fa-tags"></i> Assuntos
    </a>
</div>

<div class="main-content">
    @include('message')
    @yield('content')
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>

