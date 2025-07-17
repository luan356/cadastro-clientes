<?php

namespace App\Repositories;

interface ClienteRepositoryInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function findById(int $id);
    public function listar(array $filtros = []);
    public function delete(int $id);
}
