<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Endereco;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $endereco = Endereco::firstOrCreate([
            'cep' => '60353190',
            'logradouro' => 'Rua Exemplo',
            'bairro' => 'Bairro Teste',
            'cidade' => 'Fortaleza',
            'estado' => 'CE',
        ]);

        Cliente::create([
            'nome_completo' => 'Cliente Exemplo',
            'cpf' => '06630436385',
            'email' => 'cliente@example.com',
            'telefone' => '85999999999',
            'endereco_id' => $endereco->id,
        ]);
    }
}
