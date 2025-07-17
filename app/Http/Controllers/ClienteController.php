<?php

namespace App\Http\Controllers;



use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ClienteUpdateRequest;
use App\Services\ClienteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function store(ClienteRequest  $request)
    {
        $cliente = $this->clienteService->cadastrar($request->validated());
        return response()->json($cliente, 201);
    }

    public function update(ClienteUpdateRequest $request, $id)
    {
        $cliente = $this->clienteService->atualizar($id, $request->validated());
        return response()->json($cliente);
    }

    public function show($id)
{
    $cliente = $this->clienteService->buscarPorId($id);

    if (!$cliente) {
        return response()->json(['message' => 'Cliente não encontrado'], 404);
    }

    return response()->json($cliente, 200);
}

public function index(Request $request): JsonResponse
{
    $clientes = $this->clienteService->listar($request->all());
    return response()->json($clientes);
}

public function destroy(int $id): JsonResponse
{
    $deletado = $this->clienteService->deletar($id);

    if ($deletado) {
        return response()->json(['mensagem' => 'Cliente deletado com sucesso.'], 200);
    }

    return response()->json(['mensagem' => 'Não foi possível deletar o cliente.'], 400);
}
}
