<?php

namespace App\Services;

use App\Models\Autor;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AutorService
{
    /**
     * Cria um autor no banco de dados
     *
     * @param array $data
     * @return Autor
     * @throws \Exception|\PDOException|QueryException
     */
    public function create(array $data): Autor
    {
        try {
            DB::beginTransaction();

            $autor = Autor::create($data);

            DB::commit();

            return $autor;
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
            throw new \Exception('Ocorreu um erro ao tentar adicionar o autor.');
        }
    }

    /**
     * Atualiza um autor no banco de dados
     *
     * @param Autor $autor
     * @param array $data
     * @return Autor
     * @throws \Exception|\PDOException|QueryException
     */
    public function update(Autor $autor, array $data): Autor
    {
        try {
            DB::beginTransaction();

            $updateData = array_merge($autor->toArray(), $data);
            //assim segura o old value
            $autor->update($updateData);
            /*$autor->update($data);*/

            DB::commit();

            return $autor;
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
