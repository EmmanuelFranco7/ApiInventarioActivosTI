<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\EstadoActivoService;
use App\DTO\GetAllParams;
use App\Http\Resources\EstadoActivo\EstadoActivoResource;
use App\Http\Resources\EstadoActivo\EstadoActivoResourceCollection;
use App\Http\Request\EstadoActivo\StoreEstadoActivoRequest;
use App\Http\Request\EstadoActivo\UpdateEstadoActivoRequest;

class EstadoActivoController extends Controller
{
    public function __construct(private EstadoActivoService $service) {}

    public function index(Request $request): JsonResponse
    {
        $params = new GetAllParams(
            perPage: $request->input('per_page', DEFAULT_PER_PAGE),
            arrayFilters: $request->input('arrayFilters', $this->getFilters($request)),
            pagination: $request->input('pagination', true),
            filterType: $request->input('filter_type', null),
            orderBy: $request->input('order_by', null),
            orderDirection: $request->input('order_direction', null),
            fields: $request->input('fields', ['*'])
        );

        $result = $this->service->getAll($params);
        return response()->json(new EstadoActivoResourceCollection($result));
    }

    public function store(StoreEstadoActivoRequest $request): JsonResponse
    {
        $data = $request->validated();
        $created = $this->service->create($data);

        return response()->json([
            'message' => 'Registro creado con éxito',
            'data' => new EstadoActivoResource($created)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $record = $this->service->getById($id);
        if (!$record) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(new EstadoActivoResource($record));
    }

    public function update(UpdateEstadoActivoRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $updated = $this->service->update($id, $data);

        if (!$updated) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => new EstadoActivoResource($updated)
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(['message' => 'Registro eliminado con éxito']);
    }

    private function getFilters(Request $request): array
    {
        return [
            'id' => $request->query('id'),
            'descripcion' => $request->query('descripcion'),
        ];
    }
}
