<?php

namespace Tests\Feature;

use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LivroTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function um_livro_pode_ser_criado()
    {
        // Arrange: Cria autores e assuntos para relacionar com o livro
        $autor = Autor::factory()->create();
        $assunto = Assunto::factory()->create();

        // Act: Faz uma requisição para criar um livro
        $response = $this->post('/livros', [
            'Titulo' => 'Livro de Teste',
            'Editora' => 'Editora Teste',
            'Edicao' => 1,
            'AnoPublicacao' => 2023,
            'Valor' => 100.50,
            'autores' => [$autor->CodAu],
            'assuntos' => [$assunto->codAs],
        ]);

        // Assert: Verifica se o livro foi criado no banco de dados
        $this->assertDatabaseHas('Livro', [
            'Titulo' => 'Livro de Teste',
            'Editora' => 'Editora Teste',
        ]);

        // Verifica se o relacionamento foi salvo
        $livro = Livro::where('Titulo', 'Livro de Teste')->first();
        $this->assertTrue($livro->autores->contains($autor));
        $this->assertTrue($livro->assuntos->contains($assunto));

        // Verifica o redirecionamento
        $response->assertRedirect(route('livros.index'));
    }
}
