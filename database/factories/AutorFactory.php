<?php

namespace Database\Factories;

use App\Models\Autor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    /**
     * O nome do modelo que a factory corresponde.
     *
     * @var string
     */
    protected $model = Autor::class;

    /**
     * Definir o estado padrão do modelo.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            //Cria um nome qualquer
            'Nome' => $this->faker->name,
        ];
    }
}
