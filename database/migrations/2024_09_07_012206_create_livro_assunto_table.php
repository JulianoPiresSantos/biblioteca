<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Livro_Assunto', function (Blueprint $table) {
            $table->foreignId('Livro_CodL')->constrained('Livro', 'CodL');
            $table->foreignId('Assunto_codAs')->constrained('Assunto', 'codAs');
            $table->primary(['Livro_CodL', 'Assunto_codAs']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Livro_Assunto');
    }
};
