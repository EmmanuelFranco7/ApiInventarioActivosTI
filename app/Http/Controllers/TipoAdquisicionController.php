<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\TipoAdquisicionService;
use App\DTO\GetAllParams;
use App\Http\Resources\TipoAdquisicion\TipoAdquisicionResource;
use App\Http\Resources\TipoAdquisicion\TipoAdquisicionResourceCollection;
use App\Http\Request\TipoAdquisicion\StoreTipoAdquisicionRequest;
use App\Http\Request\TipoAdquisicion\UpdateTipoAdquisicionRequest;

class TipoAdquisicionController extends Controller
{
    public function __construct(private TipoAdquisicionService $service) {}

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
        return response()->json(new TipoAdquisicionResourceCollection($result));
    }

    public function store(StoreTipoAdquisicionRequest $request): JsonResponse
    {
        $data = $request->validated();
        $created = $this->service->create($data);

        return response()->json([
            'message' => 'Registro creado con éxito',
            'data' => new TipoAdquisicionResource($created)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $record = $this->service->getById($id);
        if (!$record) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(new TipoAdquisicionResource($record));
    }

    public function update(UpdateTipoAdquisicionRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $updated = $this->service->update($id, $data);

        if (!$updated) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => new TipoAdquisicionResource($updated)
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
            'nombre' => $request->query('nombre'),
        ];
    }
}
