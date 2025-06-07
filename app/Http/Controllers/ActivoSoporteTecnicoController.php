<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivoSoporteTecnicoService;
use App\Http\Request\ActivoSoporteTecnico\StoreActivoSoporteTecnicoRequest;
use App\Http\Request\ActivoSoporteTecnico\UpdateActivoSoporteTecnicoRequest;
use App\Http\Resources\ActivoSoporteTecnico\ActivoSoporteTecnicoResource;
use App\Http\Resources\ActivoSoporteTecnico\ActivoSoporteTecnicoResourceCollection;

class ActivoSoporteTecnicoController extends Controller
{
    public function __construct(private ActivoSoporteTecnicoService $service) {}

    public function index(Request $request)
    {
        return new ActivoSoporteTecnicoResourceCollection($this->service->getAll(new \App\DTO\GetAllParams()));
    }

    public function show($id)
    {
        return new ActivoSoporteTecnicoResource($this->service->getById($id));
    }

    public function store(StoreActivoSoporteTecnicoRequest $request)
    {
        return new ActivoSoporteTecnicoResource($this->service->create($request->validated()));
    }

    public function update(UpdateActivoSoporteTecnicoRequest $request, $id)
    {
        return new ActivoSoporteTecnicoResource($this->service->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Registro eliminado',
            'data' => $this->service->delete($id)
        ]);
    }
}
