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
            position: relative;
        }

        header {
            position: fixed;
            top: 0.5cm; /* Ajusta a distância do topo */
            left: 1.5cm; /* Margem esquerda igual à do body */
            right: 1.5cm; /* Margem direita igual à do body */
            height: 2cm;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0; /* Remove padding extra */
        }

        header img {
            width: 180px; /* Reduz tamanho do logo para não ocupar muito espaço */
            height: auto;
        }

        .titulo {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
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
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 50px;
            /*margin-bottom: 10px;*/
            text-align: center;
        }

        .report-meta {
            font-size: 12px;
            margin-bottom: 20px;
           /* margin-bottom: 50px;*/
            text-align: right;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            /*padding: 5px;*/
            /*padding: 10px;*/
            padding: 11px;
            vertical-align: top;
        }

        th {
            background-color: #eaeaea;
            text-align: center;
        }

        tr, td, th {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>

<header>
    <img src="{{ public_path('images/logo-pjerj-preto-com-texto-horizontal.png') }}" alt="Logo">
    {{--<div class="titulo">Tribunal de Justiça do Estado do Rio de Janeiro</div>--}}
</header>

<footer>
    Página <span class="pagenum"></span>
    <div class="report-meta">Gerado em: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</div>
</footer>

<main>
    <div class="titulo" style="text-align: center; font-size: 14px; font-weight: bold; margin-bottom: 5px;">
        Tribunal de Justiça do Estado do Rio de Janeiro
    </div>
    <div class="report-title">Relatório de Livros</div>
    {{--<div class="report-meta">Gerado em: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}</div>--}}

    <table>
        <thead>
        <tr>
            <th>Autor</th>
            <th>Livro</th>
            <th>Editora</th>
            <th>Ano de Publicação</th>
            <th>Assunto(s)</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($livros as $autor => $listaLivros)
            <tbody style="page-break-inside: avoid;">
            <tr>
                <td rowspan="{{ count($listaLivros) }}">
                    {{ $autor }}
                </td>
            @foreach ($listaLivros as $i => $livro)
                @if ($i > 0)
                    <tr>
                        @endif
                        <td>{{ $livro->livro }}</td>
                        <td>{{ $livro->editoras }}</td>
                        <td>{{ $livro->ano_publicacao }}</td>
                        <td>{{ $livro->assuntos }}</td>
                    </tr>
                    @endforeach
            </tbody>
            @endforeach
            {{--</tbody>--}}
    </table>
</main>

</body>
</html>
