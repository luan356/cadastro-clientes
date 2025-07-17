<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CpfValido;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome_completo' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'size:11', 'unique:clientes,cpf', new CpfValido()],
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'required|string|max:20',
            'cep' => 'required|string|size:8',
        ];
    }
}
