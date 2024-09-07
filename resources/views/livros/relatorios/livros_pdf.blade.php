<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Livros</title>
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
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Relatório de Livros</h1>
<table class="table">
    <thead>
    <tr>
        <th>Autor</th>
        <th>Livros</th>
        <th>Editora</th>
        <th>Ano de Publicação</th>
        <th>Assuntos</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($livros as $livro)
        <tr>
            <td>{{ $livro->autor }}</td>
            <td>{{ $livro->livros }}</td>
            <td>{{ $livro->editoras }}</td>
            <td>{{ $livro->anospublicacao }}</td>
            <td>{{ $livro->assuntos }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
