<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroApiController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $livros = Livro::all();
        return response()->json($livros);
    }
}
