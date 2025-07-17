<?php

namespace App\Repositories\Eloquent;

use App\Models\Cliente;
use App\Repositories\ClienteRepositoryInterface;

class ClienteRepository implements ClienteRepositoryInterface
{
    public function create(array $data)
    {
        return Cliente::create($data);
    }

    public function update(int $id, array $data)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($data);
        return $cliente;
    }

    public function findById(int $id)
    {
        // Use find para não lançar exceção, mas retornar null se não achar
        return Cliente::with('endereco')->find($id);
    }

    public function listar(array $filtros = [])
    {
        $query = Cliente::with('endereco');

        if (!empty($filtros['nome_completo'])) {
            $query->where('nome_completo', 'like', '%' . $filtros['nome_completo'] . '%');
        }

        if (!empty($filtros['cpf'])) {
            $query->where('cpf', $filtros['cpf']);
        }

        if (!empty($filtros['cep'])) {
            $query->whereHas('endereco', function ($q) use ($filtros) {
                $q->where('cep', $filtros['cep']);
            });
        }

        return $query->paginate(10);
    }

    public function delete(int $id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente->delete();
    }
}
