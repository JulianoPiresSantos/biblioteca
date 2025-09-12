<?php

namespace App\Http\Traits;

trait FormatadorTrait
{

    public function retornaValorNumericoParaBD(string $valor): float
    {
        return str_replace(',', '.', str_replace('.', '', $valor));
    }

    public function exibeValorDinheiro(int|float|string $valor): string
    {
        return 'R$' . number_format($valor, 2, ',', '.');
    }
}
