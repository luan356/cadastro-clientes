<?php

namespace App\Services;

use App\Repositories\ClienteRepositoryInterface;
use App\Services\CepService;
use Illuminate\Support\Facades\DB;
use Exception;

class ClienteService
{
    protected $clienteRepository;
    protected $cepService;

    public function __construct(
        ClienteRepositoryInterface $clienteRepository,
        CepService $cepService
    ) {
        $this->clienteRepository = $clienteRepository;
        $this->cepService = $cepService;
    }

    public function cadastrar(array $data)
    {
        return DB::transaction(function () use ($data) {
            $endereco = $this->cepService->buscarEndereco($data['cep']);
            if (!$endereco) {
                throw new Exception('CEP inválido.');
            }

            $data['endereco'] = $endereco['street'] ?? '';
            $data['bairro'] = $endereco['neighborhood'] ?? '';
            $data['cidade'] = $endereco['city'] ?? '';
            $data['estado'] = $endereco['state'] ?? '';

            return $this->clienteRepository->create($data);
        });
    }

    public function atualizar(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            if (isset($data['cep'])) {
                $endereco = $this->cepService->buscarEndereco($data['cep']);
                if (!$endereco) {
                    throw new Exception('CEP inválido.');
                }

                $data['endereco'] = $endereco['street'] ?? '';
                $data['bairro'] = $endereco['neighborhood'] ?? '';
                $data['cidade'] = $endereco['city'] ?? '';
                $data['estado'] = $endereco['state'] ?? '';
            }

            return $this->clienteRepository->update($id, $data);
        });
    }

    public function buscarPorId($id)
{
    return $this->clienteRepository->findById($id);
}


public function listar(array $filtros = [])
{
    return $this->clienteRepository->listar($filtros);}


    public function deletar(int $id)
{
    return $this->clienteRepository->delete($id);
}

}
