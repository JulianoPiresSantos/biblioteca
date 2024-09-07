<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoRequest;
use App\Models\Assunto;
use App\Models\Livro;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AssuntoController extends Controller
{
    public function index()
    {
        $assuntos = Assunto::all();
        return view('assuntos.index', compact('assuntos'));
    }

    public function create()
    {
        return view('assuntos.create');
    }

    public function store(AssuntoRequest $request)
    {
        try {
            DB::beginTransaction();

            Assunto::create($request->all());

            DB::commit();

            return redirect()->route('assuntos.index')->with('success', 'Assunto adicionado com sucesso!');
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro ao salvar o assunto no banco de dados.']);
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro de conexão com o banco de dados.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao tentar adicionar o assunto.']);
        }
    }

    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', compact('assunto'));
    }

    public function update(AssuntoRequest $request, Assunto $assunto)
    {
        try {
            DB::beginTransaction();

            $assunto->update($request->all());

            DB::commit();

            return redirect()->route('assuntos.index')->with('success', 'Assunto atualizado com sucesso!');
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro ao atualizar o assunto no banco de dados.']);
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro de conexão com o banco de dados.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Ocorreu um erro ao tentar atualizar o assunto.']);
        }
    }

    public function show(Assunto $assunto)
    {
        $assunto->load('livros');

        return view('assuntos.show', compact('assunto'));
    }

    public function destroy(Assunto $assunto)
    {
        // Se existir livro deste assunto
        if ($assunto->livros()->exists()) {
            return redirect()->route('assuntos.index')
                ->withErrors(['error' => 'O assunto não pode ser deletado, pois está associado a um ou mais livros.']);
        }
        $assunto->delete();
        return redirect()->route('assuntos.index')->with('success', 'Assunto excluído com sucesso!');
    }
}
