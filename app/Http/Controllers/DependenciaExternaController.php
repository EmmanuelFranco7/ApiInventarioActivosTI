<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\DependenciasExternas\StoreDependenciaExternaRequest;
use App\Http\Request\DependenciasExternas\UpdateDependenciaExternaRequest;
use App\Services\DependenciaExternaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Resources\DependenciasExternas\DependenciaExternaResource;
use App\Http\Resources\DependenciasExternas\DependenciaExternaResourceCollection;
use App\DTO\GetAllParams;

class DependenciaExternaController extends Controller
{
    public function __construct(private DependenciaExternaService $service) {}

    /**
     * Display a listing of the resource.
     */
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

        $dependencias = new DependenciaExternaResourceCollection($this->service->getAll($params));
        return response()->json($dependencias, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDependenciaExternaRequest $request): JsonResponse
    {
        $data = $request->validated();

        $dependencia = $this->service->create($data);

        return response()->json([
            'message' => 'Registro guardado con éxito',
            'data' => new DependenciaExternaResource($dependencia)
        ], HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $dependencia = $this->service->getById($id);

        if (!$dependencia) {
            return response()->json(['message' => 'Dependencia externa no encontrada'], 404);
        }

        return response()->json(new DependenciaExternaResource($dependencia));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDependenciaExternaRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $dependencia = $this->service->update($id, $data);

        if (!$dependencia) {
            return response()->json(['message' => 'Dependencia externa no encontrada'], 404);
        }

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => new DependenciaExternaResource($dependencia)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $dependencia = $this->service->delete($id);

        if (!$dependencia) {
            return response()->json(['message' => 'Dependencia externa no encontrada'], 404);
        }

        return response()->json(['message' => 'Registro borrado correctamente']);
    }

    /**
     * Extrae filtros desde query params
     */
    private function getFilters(Request $request): array
    {
        return [
            'id' => $request->query('id'),
            'activo_informacion_id' => $request->query('activo_informacion_id'),
            'nombre_dependencia' => $request->query('nombre_dependencia'),
            'created_at' => $request->query('created_at'),
            'updated_at' => $request->query('updated_at'),
        ];
    }
}
