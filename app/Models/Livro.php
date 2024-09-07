<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'Livro';
    protected $primaryKey = 'CodL';

    protected $fillable = ['Titulo', 'Editora', 'Edicao', 'AnoPublicacao', 'Valor'];

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'Livro_Autor', 'Livro_CodL', 'Autor_CodAu');
    }

    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'Livro_Assunto', 'Livro_CodL', 'Assunto_codAs');
    }
}

