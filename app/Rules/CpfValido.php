<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfValido implements Rule
{
    public function passes($attribute, $value): bool
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $value);

        // CPF deve ter 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // CPF inválido conhecido
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Cálculo do primeiro dígito verificador
        for ($t = 9; $t < 11; $t++) {
            $soma = 0;
            for ($c = 0; $c < $t; $c++) {
                $soma += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $soma) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function message(): string
    {
        return 'O CPF informado é inválido.';
    }
}
