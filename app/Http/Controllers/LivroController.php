<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\LivroService;
use Illuminate\View\View;


class LivroController extends Controller
{
    public function __construct(private LivroService $livroService)
    {
    }

    public function index(Request $request)
    {
        $livrosBusca = Livro::with('autores', 'assuntos');

        if ($request->has('search') && !empty($request->search)) {

            $livrosBusca->where('Titulo', 'ilike', '%' . $request->search . '%');
        }

        $livrosBusca->orderByRaw("
            CASE
                WHEN updated_at IS NOT NULL THEN 1
                WHEN created_at IS NOT NULL THEN 2
                ELSE 3
            END,
            updated_at DESC NULLS LAST,
            created_at DESC NULLS LAST,
            \"CodL\" ASC
        ");

        $perPage = $request->input('perPage', 5);
        $livros = $livrosBusca->paginate($perPage)->appends($request->all());

        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.create', compact('autores', 'assuntos'));
    }


    public function store(LivroRequest $request): RedirectResponse
    {
        try {
            $this->livroService->store($request->all());
            return redirect()
                ->route('livros.index')
                ->with('success', 'Livro adicionado com sucesso!');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect()
                    ->route('livros.index')
                    ->withErrors(['error' => 'Ocorreu um erro ao tentar adicionar o livro.']);
        }
    }

    public function edit(Livro $livro): View
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    public function update(LivroRequest $request, Livro $livro): RedirectResponse
    {
        try {
            $this->livroService->update($livro, $request->all());

            return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Ocorreu um erro ao tentar atualizar o livro.']);
        }
    }

    public function show(Livro $livro)
    {
        $livro->load('autores', 'assuntos');

        return view('livros.show', compact('livro'));
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
