<?php

namespace App\Http\Controllers;

use App\Http\Request\ActivosInformacion\StoreActivosInformacionRequest;
use App\Http\Request\ActivosInformacion\UpdateActivosInformacionRequest;
use App\Services\ActivosInformacionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\ActivosInformacion\ActivosInformacionResource;
use App\Http\Resources\ActivosInformacion\ActivosInformacionResourceCollection;
use App\DTO\GetAllParams;

class ActivosInformacionController extends Controller
{
    public function __construct(private ActivosInformacionService $service) {}

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

        $registros = new ActivosInformacionResourceCollection($this->service->getAll($params));

        return response()->json($registros, 200);
    }

    public function store(StoreActivosInformacionRequest $request): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->create($data);

        return response()->json([
            'message' => 'Registro guardado con éxito',
            'data' => new ActivosInformacionResource($registro)
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $registro = $this->service->getById($id);
        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json(new ActivosInformacionResource($registro));
    }

    public function update(UpdateActivosInformacionRequest $request, string $id): JsonResponse
    {
        $data = $request->validated();
        $registro = $this->service->update($id, $data);

        if (!$registro) {
            return response()->json(['message' => 'Registro no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Registro actualizado con éxito',
            'data' => new ActivosInformacionResource($registro)
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
            'nombre_activo' => $request->query('nombre_activo'),
            'identificador' => $request->query('identificador'),
            'estado_activo_id' => $request->query('estado_activo_id'),
            'activo_datos_basicos_id' => $request->query('activo_datos_basicos_id'),
            'categoria_activo_id' => $request->query('categoria_activo_id'),
            'criticidad_interna_id' => $request->query('criticidad_interna_id'),
            'criticidad_externa_id' => $request->query('criticidad_externa_id'),
            'tipo_dato_personal_id' => $request->query('tipo_dato_personal_id'),
            'valor_confidencialidad_id' => $request->query('valor_confidencialidad_id'),
            'valor_integridad_id' => $request->query('valor_integridad_id'),
            'valor_disponibilidad_id' => $request->query('valor_disponibilidad_id'),
            'created_at' => $request->query('created_at'),
            'updated_at' => $request->query('updated_at'),
        ];
    }
}
