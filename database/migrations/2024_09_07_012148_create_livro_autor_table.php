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
        Schema::create('Livro_Autor', function (Blueprint $table) {
            $table->foreignId('Livro_CodL')
                ->constrained('Livro', 'CodL')
                ->onDelete('cascade');
            $table->foreignId('Autor_CodAu')
                ->constrained('Autor', 'CodAu');
            $table->primary(['Livro_CodL', 'Autor_CodAu'])
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Livro_Autor');
    }
};
