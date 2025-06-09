<?php

namespace App\Http\Controllers;

use App\Http\Request\ActivoTecnologia\StoreActivoTecnologiaRequest;
use App\Http\Request\ActivoTecnologia\UpdateActivoTecnologiaRequest;
use App\Services\ActivoTecnologiaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\ActivoTecnologia\ActivoTecnologiaResource;
use App\Http\Resources\ActivoTecnologia\ActivoTecnologiaResourceCollection;
use App\DTO\GetAllParams;

class ActivoTecnologiaController extends Controller
{
    public function __construct(private ActivoTecnologiaService $service) {}

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

        $registros = new ActivoTecnologiaResourceCollection($this->service->getAll($params));
        return response()->json($registros, 200);
    }

    public function store(StoreActivoTecnologiaRequest $request): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->create($data);

        return response()->json([
            'message' => 'Registro guardado con éxito',
            'data' => new ActivoTecnologiaResource($registro)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = $this->service->getById($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(new ActivoTecnologiaResource($registro));
    }

    public function update(UpdateActivoTecnologiaRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->update($id, $data);

        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => new ActivoTecnologiaResource($registro)
        ]);
    }

    public function destroy(string $id): JsonResponse
    {
        $registro = $this->service->delete($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(['message' => 'Registro eliminado con éxito']);
    }

    private function getFilters(Request $request): array
    {
        return [
            'id' => $request->query('id'),
            'activo_informacion_id' => $request->query('activo_informacion_id'),
            'tecnologia_id' => $request->query('tecnologia_id'),
            'created_at' => $request->query('created_at'),
            'updated_at' => $request->query('updated_at'),
        ];
    }
}
