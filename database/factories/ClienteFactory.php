<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    protected $model = \App\Models\Cliente::class;

    public function definition()
    {
        return [
            'nome_completo' => $this->faker->name(),
            'cpf' => $this->faker->unique()->numerify('###########'), // 11 dígitos numéricos
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'endereco_id' => null, // Você pode associar um endereço se quiser, ou deixar null
        ];
    }
}
