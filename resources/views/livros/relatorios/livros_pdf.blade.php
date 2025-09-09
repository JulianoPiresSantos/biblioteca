<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório Detalhado de Livros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
        }
        th {
            background-color: #eaeaea;
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Relatório Detalhado de Livros</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Autor</th>
            <th>Livro</th>
            <th>Editora(s)</th>
            <th>Ano de Publicação</th>
            <th>Assunto(s)</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($livros as $livro)
            <tr>
                <td>{{ $livro->autor }}</td>
                <td>{{ $livro->livro }}</td>
                <td>{{ $livro->editoras }}</td>
                <td>{{ $livro->ano_publicacao }}</td>
                <td>{{ $livro->assuntos }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

