<?php

namespace App\Http\Controllers;

use App\Models\RelatorioLivro;
use PDF;

class RelatorioController extends Controller
{
    public function generateReport()
    {
        $livros = RelatorioLivro::all();

        $pdf = PDF::loadView('livros.relatorios.livros_pdf', compact('livros'))->setPaper('a4', 'landscape');
        return $pdf->download('relatorio_de_livros.pdf');
    }

}
