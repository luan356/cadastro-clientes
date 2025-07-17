<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase; // reseta o banco entre os testes
use Illuminate\Support\Facades\Http; // para mockar chamadas HTTP
use App\Models\Cliente;

class ClienteApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_criar_cliente()
    {
        // Mock da resposta da BrasilAPI para o CEP informado no payload
        Http::fake([
            'https://brasilapi.com.br/api/cep/v1/60353190' => Http::response([
                'cep' => '60353190',
                'state' => 'CE',
                'city' => 'Fortaleza',
                'neighborhood' => 'Jangurussu',
                'street' => 'Rua Exemplo',
            ], 200),
        ]);

        $payload = [
            "nome_completo" => "Teste DEV Luan",
            "cpf" => "06630436385",
            "email" => "teste@example.com",
            "telefone" => "85999999999",
            "cep" => "60353190"
        ];

        $response = $this->postJson('/api/clientes', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                    "nome_completo" => "Teste DEV Luan",
                    "cpf" => "06630436385",
                    "email" => "teste@example.com",
                    "telefone" => "85999999999",
                 ]);

        $this->assertDatabaseHas('clientes', [
            'cpf' => '06630436385'
        ]);
    }

    public function test_atualizar_cliente()
    {
        // Também mocka a chamada para a BrasilAPI no update
        Http::fake([
            'https://brasilapi.com.br/api/cep/v1/60353190' => Http::response([
                'cep' => '60353190',
                'state' => 'CE',
                'city' => 'Fortaleza',
                'neighborhood' => 'Jangurussu',
                'street' => 'Rua Exemplo',
            ], 200),
        ]);

        $cliente = Cliente::factory()->create([
            'cpf' => '06630436385',
            'nome_completo' => 'Teste DEV Luan',
            'email' => 'antigo@example.com',
            'telefone' => '85988888888',
        ]);

        $payload = [
            'nome_completo' => 'Nome Atualizado',
            'email' => 'novoemail@example.com',
            'telefone' => '85999999999',
            'cep' => '60353190'
        ];

        $response = $this->putJson("/api/clientes/{$cliente->id}", $payload);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'nome_completo' => 'Nome Atualizado',
                     'email' => 'novoemail@example.com',
                     'telefone' => '85999999999',
                 ]);

        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'nome_completo' => 'Nome Atualizado',
            'email' => 'novoemail@example.com',
        ]);
    }
}
