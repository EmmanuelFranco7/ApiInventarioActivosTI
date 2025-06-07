<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Services\ActivoSoporteFuncionalService;
use App\Http\Request\ActivoSoporteFuncional\StoreActivoSoporteFuncionalRequest;
use App\Http\Request\ActivoSoporteFuncional\UpdateActivoSoporteFuncionalRequest;
use App\Http\Resources\ActivoSoporteFuncional\ActivoSoporteFuncionalResource;
use App\Http\Resources\ActivoSoporteFuncional\ActivoSoporteFuncionalResourceCollection;
use App\DTO\GetAllParams;

class ActivoSoporteFuncionalController extends Controller
{
    public function __construct(private ActivoSoporteFuncionalService $service) {}

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

        $data = new ActivoSoporteFuncionalResourceCollection($this->service->getAll($params));
        return response()->json($data, 200);
    }

    public function store(StoreActivoSoporteFuncionalRequest $request): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->create($data);

        return response()->json([
            'message' => 'Registro creado exitosamente.',
            'data' => new ActivoSoporteFuncionalResource($registro)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = $this->service->getById($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(new ActivoSoporteFuncionalResource($registro));
    }

    public function update(UpdateActivoSoporteFuncionalRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->update($id, $data);

        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Registro actualizado exitosamente.',
            'data' => new ActivoSoporteFuncionalResource($registro)
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = $this->service->delete($id);

        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(['message' => 'Registro eliminado exitosamente.']);
    }

    private function getFilters(Request $request): array
    {
        return [
            'id' => $request->query('id'),
            'usuario_id' => $request->query('usuario_id'),
            'proveedor_id' => $request->query('proveedor_id'),
            'activo_informacion_id' => $request->query('activo_informacion_id'),
            'ciudad_id' => $request->query('ciudad_id'),
            'created_at' => $request->query('created_at'),
        ];
    }
}
