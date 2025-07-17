<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CpfValido;

class ClienteUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clienteId = $this->route('cliente'); 

        return [
            'nome_completo' => 'sometimes|string|max:255',
            'cpf' => [
                'sometimes',
                'string',
                'size:11',
                "unique:clientes,cpf,{$clienteId}",
                new CpfValido()
            ],
            'email' => "sometimes|email|unique:clientes,email,{$clienteId}",
            'telefone' => 'sometimes|string|max:20',
            'cep' => 'sometimes|string|size:8',
        ];
    }
}
