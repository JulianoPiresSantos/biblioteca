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
                        a."Nome" AS Autor,
                        array_agg(DISTINCT l."Titulo") AS Livros,
                        array_agg(DISTINCT l."Editora") AS Editoras,
                        array_agg(DISTINCT l."AnoPublicacao") AS AnosPublicacao,
                        array_agg(DISTINCT s."Descricao") AS Assuntos
                    FROM "Autor" a
                        JOIN "Livro_Autor" la ON a."CodAu" = la."Autor_CodAu"
                        JOIN "Livro" l ON la."Livro_CodL" = l."CodL"
                        JOIN "Livro_Assunto" las ON l."CodL" = las."Livro_CodL"
                        JOIN "Assunto" s ON las."Assunto_codAs" = s."codAs"
                    GROUP BY a."Nome";
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
