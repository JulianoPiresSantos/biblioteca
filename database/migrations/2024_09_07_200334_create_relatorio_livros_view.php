<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW relatorio_livros AS
            SELECT
                a."Nome" AS autor,
                l."Titulo" AS livro,
                l."Edicao" AS edicao,
                l."Valor" AS valor,
                STRING_AGG(DISTINCT l."Editora", \', \') AS editoras,
                l."AnoPublicacao" AS ano_publicacao,
                STRING_AGG(DISTINCT s."Descricao", \', \') AS assuntos
            FROM "Autor" a
                JOIN "Livro_Autor" la ON a."CodAu" = la."Autor_CodAu"
                JOIN "Livro" l ON la."Livro_CodL" = l."CodL"
                JOIN "Livro_Assunto" las ON l."CodL" = las."Livro_CodL"
                JOIN "Assunto" s ON las."Assunto_codAs" = s."codAs"
            GROUP BY a."Nome", l."Titulo", l."AnoPublicacao", l."Edicao", l."Valor";
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS relatorio_livros');
    }
};
