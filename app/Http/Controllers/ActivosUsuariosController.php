<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivosUsuariosService;
use App\Http\Request\ActivosUsuarios\StoreActivosUsuariosRequest;
use App\Http\Request\ActivosUsuarios\UpdateActivosUsuariosRequest;
use App\Http\Resources\ActivosUsuarios\ActivosUsuariosResource;
use App\Http\Resources\ActivosUsuarios\ActivosUsuariosResourceCollection;

class ActivosUsuariosController extends Controller
{
    public function __construct(private ActivosUsuariosService $service) {}

    public function index(Request $request)
    {
        return new ActivosUsuariosResourceCollection($this->service->getAll(new \App\DTO\GetAllParams()));
    }

    public function show($id)
    {
        return new ActivosUsuariosResource($this->service->getById($id));
    }

    public function store(StoreActivosUsuariosRequest $request)
    {
        return new ActivosUsuariosResource($this->service->create($request->validated()));
    }

    public function update(UpdateActivosUsuariosRequest $request, $id)
    {
        return new ActivosUsuariosResource($this->service->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Registro eliminado',
            'data' => $this->service->delete($id)
        ]);
    }
}
