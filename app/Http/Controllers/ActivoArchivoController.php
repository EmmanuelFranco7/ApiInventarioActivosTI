<?php

namespace App\Http\Controllers;

use App\Http\Request\ActivoArchivo\StoreActivoArchivoRequest;
use App\Http\Request\ActivoArchivo\UpdateActivoArchivoRequest;
use App\Services\ActivoArchivoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\ActivoArchivo\ActivoArchivoResource;
use App\Http\Resources\ActivoArchivo\ActivoArchivoResourceCollection;
use App\DTO\GetAllParams;

class ActivoArchivoController extends Controller
{
    public function __construct(private ActivoArchivoService $service) {}

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

        $registros = new ActivoArchivoResourceCollection($this->service->getAll($params));

        return response()->json($registros, 200);
    }

    public function store(StoreActivoArchivoRequest $request): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->create($data);

        return response()->json([
            'message' => 'Registro guardado con éxito',
            'data' => new ActivoArchivoResource($registro)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = $this->service->getById($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(new ActivoArchivoResource($registro));
    }

    public function update(UpdateActivoArchivoRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->update($id, $data);

        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => new ActivoArchivoResource($registro)
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
            'tipo' => $request->query('tipo'),
            'directorio' => $request->query('directorio'),
            'url' => $request->query('url'),
            'descripcion' => $request->query('descripcion'),
            'observaciones' => $request->query('observaciones'),
            'created_at' => $request->query('created_at'),
            'updated_at' => $request->query('updated_at'),
        ];
    }
}
