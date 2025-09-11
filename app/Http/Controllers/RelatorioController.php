<?php

namespace App\Http\Controllers;

use App\Models\RelatorioLivro;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class RelatorioController extends Controller
{
    public function index()
    {
        $livrosBusca = RelatorioLivro::all()
            ->groupBy('autor');

        $livros = $livrosBusca;

        return view('livros.relatorios.relatorio', compact('livros'));
    }

    public function generateReport()
    {
        $livros = RelatorioLivro::all()
            ->groupBy('autor');

        $pdf = Pdf::loadView(
            'livros.relatorios.livros_pdf',
            compact('livros'))
            ->setPaper('a4', 'landscape');
        return $pdf->download('relatorio_livros_tjrj_' .  Carbon::now()->format('Y-m-d_H-i-s') . '.pdf');
    }

}
