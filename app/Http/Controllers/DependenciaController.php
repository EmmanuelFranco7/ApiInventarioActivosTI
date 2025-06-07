<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\Dependencias\StoreDependenciaRequest;
use App\Http\Request\Dependencias\UpdateDependenciaRequest;
use App\Services\DependenciaService;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;
//use Illuminate\Http\Request;


use App\Http\Resources\Dependencias\DependenciaResource;
use App\DTO\GetAllParams;
use App\Http\Resources\Dependencias\DependenciaResourceCollection;

class DependenciaController extends Controller
{
    public function __construct(private DependenciaService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        // $arrayFilters = $this->getFilters($request);


        $params = new GetAllParams(
            perPage: $request->input('per_page', DEFAULT_PER_PAGE),
            arrayFilters: $request->input('arrayFilters', $this->getFilters($request)),
            pagination: $request->input('pagination', true),
            filterType: $request->input('filter_type', null),
            orderBy: $request->input('order_by', null),
            orderDirection: $request->input('order_direction', null),
            fields: $request->input('fields', ['*'])
        );

        //dd($this->getFilters($request));

        // dd($this->service->getAll($params));
        $dependencias = new DependenciaResourceCollection($this->service->getAll($params));


        return response()->json($dependencias, 200);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDependenciaRequest $request): JsonResponse
    {
        $data = $request->validated(); //SOLAMENTE LOS DATOS VALIDADOS

        $response['message'] = 'Registro guardado con éxito';
        $dependencia = $this->service->create($data);

        $response['data'] = new DependenciaResource($dependencia);
        return response()->json($response, HTTP_CREATED); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $dependencia = $this->service->getById($id);
        if (!$dependencia) {
            return response()->json(['message' => 'Dependecias not found'], 404); // 404 Not Found
        }
        $dependencia = new DependenciaResource($dependencia);
        return response()->json($dependencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDependenciaRequest $request, string $id): JsonResponse
    {
        $response['message'] = 'Registro guardado con éxito';

        $data = $request->validated();
        $dependencia = $this->service->update($id, $data);
        if (!$dependencia) {
            return response()->json(['message' => 'Dependecias not found'], 404);
        }
        $response['data'] = new DependenciaResource($dependencia);
        // $source = new SourceResource($source);
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $dependencia = $this->service->delete($id);
        if (!$dependencia) {
            return response()->json(['message' => 'Dependecias not found'], 404);
        }
        return response()->json(['message' => 'Registro borrado correctamente']);
    }


    private function getFilters(Request $request): array
    {
        $arrayFilters = [];
        $arrayFilters['id'] = $request->query('id') ?: null;
        $arrayFilters['nombre_dependencia'] = $request->query('nombre_dependencia') ?: null;
        $arrayFilters['created_at'] = $request->query('created_at') ?: null;
        $arrayFilters['updated_at'] = $request->query('updated_at') ?: null;


        return $arrayFilters;
    }
}
