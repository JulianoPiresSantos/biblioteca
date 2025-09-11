<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório Detalhado de Livros</title>
    <style>
       body {
           font-family: 'Helvetica', 'Arial', sans-serif;
           font-size: 12px;
           margin: 2.5cm 1.5cm 2cm 1.5cm;
       }

       header {
           position: fixed;
           top: 1cm;
           left: 1.5cm;
           right: 1.5cm;
           height: 1.5cm;
           display: flex;
           align-items: center;
           justify-content: flex-start;
       }

       header img {
           width: 100px;
           height: auto;
       }

       footer {
           position: fixed;
           bottom: -1cm;
           left: 0;
           right: 0;
           height: 1cm;
           text-align: center;
           font-size: 10px;
           color: #666;
       }

       .pagenum:before {
           content: counter(page);
       }

       .report-title {
           font-size: 16px;
           font-weight: bold;
           text-align: center;
           margin-top: 2cm;
           margin-bottom: 0.5cm;
       }

       table {
           width: 100%;
           border-collapse: collapse;
           margin-top: 0.2cm;
       }

       th, td {
           border: 1px solid #333;
           padding: 10px;
           vertical-align: top;
       }

       th {
           background-color: #eaeaea;
           text-align: center;
       }

       tr {
           page-break-inside: avoid;
       }

       thead {
           display: table-header-group;
       }

       tfoot {
           display: table-row-group;
       }

       @media print {
           .only-first-page {
               display: block;
           }
           .not-on-first-page {
               display: none;
           }
       }
    </style>
</head>
<body>

<header>
    <img src="{{ public_path('images/logo-pjerj-preto-com-texto-horizontal.png') }}" alt="Logo">
</header>

<footer>
    Página <span class="pagenum"></span>
    <div class="report-meta">Gerado em: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</div>
</footer>

<main>
    <div class="report-title only-first-page">Relatório</div>
    <table>
        <thead>
        <tr>
            <th>Autor</th>
            <th>Livro</th>
            <th>Editora</th>
            <th>Edição</th>
            <th>Ano de Publicação</th>
            <th>Assunto(s)</th>
        </tr>
        </thead>
        <tbody>
        {{--@foreach ($livros as $autor => $listaLivros)
            @foreach ($listaLivros as $livro)
                <tr>
                    <td>{{ $autor }}</td>
                    <td>{{ $livro->livro }}</td>
                    <td>{{ $livro->editoras }}</td>
                    <td>{{ $livro->edicao . "ª"}}</td>
                    <td>{{ $livro->ano_publicacao }}</td>
                    <td>{{ $livro->assuntos }}</td>
                </tr>
            @endforeach
        @endforeach--}}
        @foreach ($livros as $autor => $listaLivros)
            @foreach ($listaLivros as $i => $livro)
                <tr>
                    @if ($i == 0)
                        <td rowspan="{{ count($listaLivros) }}">
                            {{ $autor }}
                        </td>
                    @endif
                    <td>{{ $livro->livro }}</td>
                    <td>{{ $livro->editoras }}</td>
                    <td>{{ $livro->edicao . "ª"}}</td>
                    <td>{{ $livro->ano_publicacao }}</td>
                    <td>{{ $livro->assuntos }}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</main>

</body>
</html>
