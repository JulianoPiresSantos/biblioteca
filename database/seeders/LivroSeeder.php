<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserindo autores
        DB::table('Autor')->insert([
            ['Nome' => 'Isaac Asimov'],
            ['Nome' => 'Carl Sagan'],
            ['Nome' => 'George Orwell'],
            ['Nome' => 'Jane Austen'],
            ['Nome' => 'Agatha Christie'],
        ]);

        // Inserindo assuntos
        DB::table('Assunto')->insert([
            ['Descricao' => 'Ficção Científica'],
            ['Descricao' => 'Ciência'],
            ['Descricao' => 'Política'],
            ['Descricao' => 'Romance'],
            ['Descricao' => 'Mistério'],
        ]);

        // Inserindo livros
        DB::table('Livro')->insert([
            [
                'Titulo' => 'Fundação',
                'Editora' => 'Editora A',
                'Edicao' => 1,
                'AnoPublicacao' => '1951',
                'Valor' => 39.90
            ],
            [
                'Titulo' => 'Cosmos',
                'Editora' => 'Editora B',
                'Edicao' => 1,
                'AnoPublicacao' => '1980',
                'Valor' => 49.90
            ],
            [
                'Titulo' => '1984',
                'Editora' => 'Editora C',
                'Edicao' => 1,
                'AnoPublicacao' => '1949',
                'Valor' => 29.90
            ],
            [
                'Titulo' => 'Orgulho e Preconceito',
                'Editora' => 'Editora D',
                'Edicao' => 2,
                'AnoPublicacao' => '1813',
                'Valor' => 34.90
            ],
            [
                'Titulo' => 'Assassinato no Expresso do Oriente',
                'Editora' => 'Editora E',
                'Edicao' => 1,
                'AnoPublicacao' => '1934',
                'Valor' => 39.90
            ],
        ]);

        // Associando autores aos livros
        DB::table('Livro_Autor')->insert([
            ['Livro_CodL' => 1, 'Autor_CodAu' => 1],
            ['Livro_CodL' => 2, 'Autor_CodAu' => 2],
            ['Livro_CodL' => 3, 'Autor_CodAu' => 3],
            ['Livro_CodL' => 4, 'Autor_CodAu' => 4],
            ['Livro_CodL' => 5, 'Autor_CodAu' => 5]
        ]);

        // Associando assuntos aos livros
        DB::table('Livro_Assunto')->insert([
            ['Livro_CodL' => 1, 'Assunto_codAs' => 1],
            ['Livro_CodL' => 2, 'Assunto_codAs' => 2],
            ['Livro_CodL' => 3, 'Assunto_codAs' => 3],
            ['Livro_CodL' => 4, 'Assunto_codAs' => 4],
            ['Livro_CodL' => 5, 'Assunto_codAs' => 5]
        ]);
    }
}
