@extends('layouts.app')

@section('title', 'Adicionar Livro')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0"><i class="fas fa-book-medical me-2"></i>Cadastrar livro</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('relatorios.livros') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-file-alt"></i> Relatório
            </a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título<span class="text-danger">*</span></label>
            <input type="text" name="Titulo" id="titulo" class="form-control" value="{{ old('Titulo') }}" required>
        </div>
        <div class="mb-3">
            <label for="editora" class="form-label">Editora<span class="text-danger">*</span></label>
            <input type="text" name="Editora" id="editora" class="form-control" value="{{ old('Editora') }}">
        </div>
        <div class="mb-3">
            <label for="edicao" class="form-label">Edição<span class="text-danger">*</span></label>
            <input type="number" name="Edicao" id="edicao" class="form-control" value="{{ old('Edicao') }}">
        </div>
        <div class="mb-3">
            <label for="ano_publicacao" class="form-label">Ano de Publicação<span class="text-danger">*</span></label>
            <input type="text" name="AnoPublicacao" id="ano_publicacao" class="form-control" value="{{ old('AnoPublicacao') }}">
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$)<span class="text-danger">*</span></label>
            <input type="text" name="Valor" id="valor" class="form-control" value="{{ old('Valor') }}">
        </div>
        <div class="mb-3">
            <label for="autores" class="form-label">Autores<span class="text-danger">*</span></label>
            <select name="autores[]" id="autores" class="form-select" multiple>
                @foreach($autores as $autor)
                    <option value="{{ $autor->CodAu }}" {{ in_array($autor->CodAu, old('autores', [])) ? 'selected' : '' }}>
                        {{ $autor->Nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="assuntos" class="form-label">Assuntos<span class="text-danger">*</span></label>
            <select name="assuntos[]" id="assuntos" class="form-select" multiple>
                @foreach($assuntos as $assunto)
                    <option value="{{ $assunto->codAs }}" {{ in_array($assunto->codAs, old('assuntos', [])) ? 'selected' : '' }}>
                        {{ $assunto->Descricao }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-beginning">
            <a href="{{ route('livros.index') }}" class="btn btn-secondary me-2">
                <i class="fas fa-arrow-left me-1"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check me-1"></i> Salvar
            </button>
        </div>
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
        /* .ui-datepicker .ui-datepicker-buttonpane .ui-datepicker-close {
             display: none;
         }*/
    </style>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#autores').select2({
                placeholder: 'Selecione os autores',
            });
            $('#assuntos').select2({
                placeholder: 'Selecione os assuntos',
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
