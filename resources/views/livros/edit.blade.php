@extends('layouts.app')

@section('title', 'Editar Livro')

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

    <h1>Editar Livro</h1>

    <form action="{{ route('livros.update', $livro->CodL) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input
                type="text"
                name="Titulo"
                id="titulo"
                class="form-control"
                value="{{ old('Titulo', $livro->Titulo) }}"
            >
        </div>

        <div class="form-group mb-3">
            <label for="editora">Editora</label>
            <input
                type="text"
                name="Editora"
                id="editora"
                class="form-control"
                value="{{ old('Editora', $livro->Editora) }}"
            >
        </div>

        <div class="form-group mb-3">
            <label for="edicao">Edição</label>
            <input
                type="number"
                name="Edicao"
                id="edicao"
                class="form-control"
                value="{{ old('Edicao', $livro->Edicao) }}"
            >
        </div>

        <div class="form-group mb-3">
            <label for="ano_publicacao">Ano de Publicação</label>
            <input
                type="text"
                name="AnoPublicacao"
                id="ano_publicacao"
                class="form-control"
                value="{{ old('AnoPublicacao', $livro->AnoPublicacao) }}"
            >
        </div>

        <div class="form-group mb-3">
            <label for="valor">Valor (R$)</label>
            <input
                type="text"
                name="Valor"
                id="valor"
                class="form-control"
                value="{{ old('Valor', $livro->Valor) }}"
            >
        </div>

        <!-- Seção de seleção múltipla para Autores -->
        <div class="form-group mb-3">
            <label for="autores">Autores</label>
            <select name="autores[]" id="autores" class="form-control" multiple>
                <option></option> <!-- Placeholder -->
                @foreach($autores as $autor)
                    <option value="{{ $autor->CodAu }}"
                        {{ in_array($autor->CodAu, old('autores', $livro->autores->pluck('CodAu')->toArray())) ? 'selected' : '' }}>
                        {{ $autor->Nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Seção de seleção múltipla para Assuntos -->
        <div class="form-group mb-3">
            <label for="assuntos">Assuntos</label>
            <select name="assuntos[]" id="assuntos" class="form-control" multiple>
                <option></option> <!-- Placeholder -->
                @foreach($assuntos as $assunto)
                    <option value="{{ $assunto->codAs }}"
                        {{ in_array($assunto->codAs, old('assuntos', $livro->assuntos->pluck('codAs')->toArray())) ? 'selected' : '' }}>
                        {{ $assunto->Descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        /* retira o calendário */
        .ui-datepicker-calendar {
            display: none;
        }
        /*.ui-datepicker .ui-datepicker-buttonpane .ui-datepicker-close {
            display: none;
        }*/
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#autores').select2({
                placeholder: 'Selecione os autores',
                width: '100%'
            });

            $('#assuntos').select2({
                placeholder: 'Selecione os assuntos',
                width: '100%'
            });

            $('#valor').mask('000.000.000,00', {reverse: true});

            $.datepicker.setDefaults({
                closeText: 'Concluído',
                currentText: 'Hoje',
                dateFormat: 'yy',
            });
            $('#ano_publicacao').datepicker({
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy',
                yearRange: '1900:2100',
                onClose: function(dateText, inst) {
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, 1, 1));
                },
                beforeShow: function(input, inst) {
                    $(inst.dpDiv).addClass('year-only');
                    $(".ui-datepicker-month").hide();
                }
            }).focus(function () {
                $(".ui-datepicker-month").hide();
                $(".ui-datepicker-calendar").hide();
            });
        });
    </script>
@endpush
