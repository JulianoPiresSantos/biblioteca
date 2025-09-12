<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorRequest;
use App\Models\Assunto;
use App\Models\Autor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\AutorService;

class AutorController extends Controller
{
    protected AutorService $autorService;

    public function __construct(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }
    public function index(Request $request)
    {
        $autoresBusca = Autor::query();

        if ($request->has('search') && !empty($request->search)) {
            $autoresBusca->where('Nome', 'ilike', '%' . $request->search . '%');
        }

        $autoresBusca->orderByRaw("
            CASE
                WHEN updated_at IS NOT NULL THEN 1
                WHEN created_at IS NOT NULL THEN 2
                ELSE 3
            END,
            updated_at DESC NULLS LAST,
            created_at DESC NULLS LAST,
            \"CodAu\" ASC
        ");

        $perPage = $request->input('perPage', 5);
        $autores = $autoresBusca->paginate($perPage)->appends($request->all());

        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(AutorRequest $request)
    {
        try {
            $this->autorService->create($request->all());

            return redirect()->route('autores.index')
                ->with('success', 'Autor adicionado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(AutorRequest $request, Autor $autor)
    {
        try {
            $this->autorService->update($autor, $request->all());

            return redirect()->route('autores.index')
                ->with('success', 'Autor atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Autor $autor)
    {
        $autor->load('livros');

        return view('autores.show', compact('autor'));
    }

    public function destroy(Autor $autor)
    {
        // Se existir livro deste autor
        if ($autor->livros()->exists()) {
            return redirect()->route('autores.index')
                ->withErrors(['error' => 'O autor não pode ser deletado, pois está associado a um ou mais livros.']);
        }

        $autor->delete();
        return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso!');
    }
}
