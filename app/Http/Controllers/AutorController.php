<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorRequest;
use App\Models\Assunto;
use App\Models\Autor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::all();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(AutorRequest $request)
    {
        try {
            DB::beginTransaction();

            Autor::create($request->all());

            DB::commit();

            return redirect()->route('autores.index')->with('success', 'Autor adicionado com sucesso!');
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro ao salvar o autor no banco de dados.']);
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro de conexão com o banco de dados.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao tentar adicionar o autor.']);
        }
    }

    public function edit(Autor $autor)
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(AutorRequest $request, Autor $autor)
    {
        try {
            DB::beginTransaction();

            $autor->update($request->all());

            DB::commit();

            return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso!');
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro ao atualizar o autor no banco de dados.']);
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro de conexão com o banco de dados.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao tentar atualizar o autor.']);
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
