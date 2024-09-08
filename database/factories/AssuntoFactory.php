<?php

namespace Database\Factories;

use App\Models\Assunto;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssuntoFactory extends Factory
{
    /**
     * O nome do modelo que a factory corresponde.
     *
     * @var string
     */
    protected $model = Assunto::class;

    /**
     * Definir o estado padrão do modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Descrição do assunto - 3 palavras
            'Descricao' => $this->faker->sentence(3),
        ];
    }
}
