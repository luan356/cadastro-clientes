<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;

class CepService
{
    public function buscarEndereco(string $cep): ?array
    {
        $response = Http::get("https://brasilapi.com.br/api/cep/v1/{$cep}");
        if ($response->successful()) {
            return $response->json();
        }
        return null;
    }
}

