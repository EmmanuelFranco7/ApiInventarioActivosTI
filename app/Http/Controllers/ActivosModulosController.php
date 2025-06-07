<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivosModulosService;
use App\Http\Request\ActivosModulos\StoreActivosModulosRequest;
use App\Http\Request\ActivosModulos\UpdateActivosModulosRequest;
use App\Http\Resources\ActivosModulos\ActivosModulosResource;
use App\Http\Resources\ActivosModulos\ActivosModulosResourceCollection;

class ActivosModulosController extends Controller
{
    public function __construct(private ActivosModulosService $service) {}

    public function index(Request $request)
    {
        return new ActivosModulosResourceCollection($this->service->getAll(new \App\DTO\GetAllParams()));
    }

    public function show($id)
    {
        return new ActivosModulosResource($this->service->getById($id));
    }

    public function store(StoreActivosModulosRequest $request)
    {
        return new ActivosModulosResource($this->service->create($request->validated()));
    }

    public function update(UpdateActivosModulosRequest $request, $id)
    {
        return new ActivosModulosResource($this->service->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Registro eliminado',
            'data' => $this->service->delete($id)
        ]);
    }
}
