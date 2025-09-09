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
        DB::table('Autor')->insert([
            ['Nome' => 'Isaac Asimov'],
            ['Nome' => 'Carl Sagan'],
            ['Nome' => 'George Orwell'],
            ['Nome' => 'Jane Austen'],
            ['Nome' => 'Agatha Christie'],
            ['Nome' => 'J.K. Rowling'],
            ['Nome' => 'Stephen King'],
            ['Nome' => 'Mark Twain'],
            ['Nome' => 'Ernest Hemingway'],
            ['Nome' => 'Virginia Woolf'],
        ]);

        DB::table('Assunto')->insert([
            ['Descricao' => 'Ficção Científica'],
            ['Descricao' => 'Ciência'],
            ['Descricao' => 'Política'],
            ['Descricao' => 'Romance'],
            ['Descricao' => 'Mistério'],
            ['Descricao' => 'Fantasia'],
            ['Descricao' => 'Terror'],
            ['Descricao' => 'Aventura'],
            ['Descricao' => 'Biografia'],
            ['Descricao' => 'Modernismo'],
        ]);

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
            [
                'Titulo' => 'Harry Potter e a Pedra Filosofal',
                'Editora' => 'Editora F',
                'Edicao' => 1,
                'AnoPublicacao' => '1997',
                'Valor' => 44.90
            ],
            [
                'Titulo' => 'O Iluminado',
                'Editora' => 'Editora G',
                'Edicao' => 1,
                'AnoPublicacao' => '1977',
                'Valor' => 38.90
            ],
            [
                'Titulo' => 'As Aventuras de Tom Sawyer',
                'Editora' => 'Editora H',
                'Edicao' => 1,
                'AnoPublicacao' => '1876',
                'Valor' => 27.90
            ],
            [
                'Titulo' => 'O Velho e o Mar',
                'Editora' => 'Editora I',
                'Edicao' => 1,
                'AnoPublicacao' => '1952',
                'Valor' => 31.90
            ],
            [
                'Titulo' => 'Mrs. Dalloway',
                'Editora' => 'Editora J',
                'Edicao' => 1,
                'AnoPublicacao' => '1925',
                'Valor' => 33.90
            ],
        ]);

        DB::table('Livro_Autor')->insert([
            ['Livro_CodL' => 1, 'Autor_CodAu' => 1],
            ['Livro_CodL' => 2, 'Autor_CodAu' => 2],
            ['Livro_CodL' => 3, 'Autor_CodAu' => 3],
            ['Livro_CodL' => 4, 'Autor_CodAu' => 4],
            ['Livro_CodL' => 5, 'Autor_CodAu' => 5],
            ['Livro_CodL' => 6, 'Autor_CodAu' => 6],
            ['Livro_CodL' => 7, 'Autor_CodAu' => 7],
            ['Livro_CodL' => 8, 'Autor_CodAu' => 8],
            ['Livro_CodL' => 9, 'Autor_CodAu' => 9],
            ['Livro_CodL' => 10, 'Autor_CodAu' => 10],
        ]);

        DB::table('Livro_Assunto')->insert([
            ['Livro_CodL' => 1, 'Assunto_codAs' => 1],
            ['Livro_CodL' => 2, 'Assunto_codAs' => 2],
            ['Livro_CodL' => 3, 'Assunto_codAs' => 3],
            ['Livro_CodL' => 4, 'Assunto_codAs' => 4],
            ['Livro_CodL' => 5, 'Assunto_codAs' => 5],
            ['Livro_CodL' => 6, 'Assunto_codAs' => 6],
            ['Livro_CodL' => 7, 'Assunto_codAs' => 7],
            ['Livro_CodL' => 8, 'Assunto_codAs' => 8],
            ['Livro_CodL' => 9, 'Assunto_codAs' => 9],
            ['Livro_CodL' => 10, 'Assunto_codAs' => 10],
        ]);
    }
}
