<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $livrosBusca = Livro::with('autores', 'assuntos');

        if ($request->has('search') && !empty($request->search)) {

            $livrosBusca->where('Titulo', 'like', '%' . $request->search . '%');
        }

        $livros = $livrosBusca->paginate(2)->appends($request->all());

        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.create', compact('autores', 'assuntos'));
    }

    public function store(LivroRequest $request)
    {
        try {
            DB::beginTransaction();

            //throw new \PDOException('Simulação de erro de conexão com o banco de dados.');

            $request->request->set(
                'Valor',
                str_replace(',', '.', str_replace('.', '', $request->Valor))
            );

            $livro = Livro::create($request->all());

            // Sincroniza autores e assuntos
            $livro->autores()->sync($request->input('autores', []));
            $livro->assuntos()->sync($request->input('assuntos', []));

            DB::commit();

            return redirect()->route('livros.index')->with('success', 'Livro adicionado com sucesso!');
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro ao salvar o livro no banco de dados.'])
                ->withInput();
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro de conexão com o banco de dados.']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Ocorreu um erro ao tentar adicionar o livro.'])
                >withInput();
        }
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.edit', compact('livro', 'autores', 'assuntos'));
    }

    public function update(LivroRequest $request, Livro $livro)
    {


        try {
            DB::beginTransaction();

            $request->request->set(
                'Valor',
                str_replace(',', '.', str_replace('.', '', $request->Valor))
            );

            $livro->update($request->all());

            $livro->autores()->sync($request->input('autores', []));
            $livro->assuntos()->sync($request->input('assuntos', []));

            DB::commit();

            return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro ao atualizar o livro no banco de dados.'])
                ->withInput();
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Erro de conexão com o banco de dados.'])
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            return redirect()
                ->back()
                ->withErrors(['error' => 'Ocorreu um erro ao tentar atualizar o livro.'])
                ->withInput();
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
