<?php

namespace App\Services;

use App\Models\Assunto;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AssuntoService
{
    /**
     * Cria um assunto no banco de dados
     *
     * @param array $data
     * @return Assunto
     * @throws \Exception|\PDOException|QueryException
     */
    public function create(array $data): Assunto
    {
        try {
            DB::beginTransaction();

            $autor = Assunto::create($data);

            DB::commit();

            return $autor;
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro ao salvar o assunto no banco de dados.');
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro de conexão com o banco de dados.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Ocorreu um erro ao tentar adicionar o assunto.');
        }
    }

    /**
     * Atualiza um assunto no banco de dados
     *
     * @param Assunto $assunto
     * @param array $data
     * @return Assunto
     * @throws \Exception|\PDOException|QueryException
     */
    public function update(Assunto $assunto, array $data): Assunto
    {
        try {
            DB::beginTransaction();

            $updateData = array_merge($assunto->toArray(), $data);
            $assunto->update($updateData);

            DB::commit();
            return $assunto;
        } catch (QueryException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro ao atualizar o autor no banco de dados.');
        } catch (\PDOException $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Erro de conexão com o banco de dados.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new \Exception('Ocorreu um erro ao tentar atualizar o autor.');
        }
    }
}
