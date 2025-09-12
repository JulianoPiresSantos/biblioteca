<?php

namespace App\Services;

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Assunto;
use App\Http\Traits\FormatadorTrait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LivroService
{
    use FormatadorTrait;

    public function store(array $data): Livro
    {
        try {
            DB::beginTransaction();

            //throw new \PDOException('Simulação de erro de conexão com o banco de dados.');
            $data['Valor'] = $this->retornaValorNumericoParaBD($data['Valor']);

            $livro = Livro::create($data);

            // Salva nas tabelas de junção/associativas
            $livro->autores()->sync($data['autores']);
            $livro->assuntos()->sync($data['assuntos']);

            DB::commit();

            return $livro;
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro ao salvar o autor no banco de dados.');
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro de conexão com o banco de dados.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Ocorreu um erro ao tentar criar o livro.');

        }

    }

    public function update(Livro $livro, array $data) : Livro
    {
        try {
            DB::beginTransaction();

            $data['Valor'] = $this->retornaValorNumericoParaBD($data['Valor']);

            $livro->update($data);

            $livro->autores()->sync($data['autores']);
            $livro->assuntos()->sync($data['assuntos']);

            DB::commit();

            return $livro;
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro de conexão com o banco de dados.');
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro de conexão com o banco de dados.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Ocorreu um erro ao tentar criar o livro.');
        }
    }

}
