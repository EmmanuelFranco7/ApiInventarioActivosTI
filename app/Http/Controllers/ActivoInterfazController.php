<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivoInterfazService;
use App\Http\Request\ActivoInterfaz\StoreActivoInterfazRequest;
use App\Http\Request\ActivoInterfaz\UpdateActivoInterfazRequest;
use App\Http\Resources\ActivoInterfaz\ActivoInterfazResource;
use App\Http\Resources\ActivoInterfaz\ActivoInterfazResourceCollection;

class ActivoInterfazController extends Controller
{
    public function __construct(private ActivoInterfazService $service) {}

    public function index(Request $request)
    {
        return new ActivoInterfazResourceCollection($this->service->getAll(new \App\DTO\GetAllParams()));
    }

    public function show($id)
    {
        return new ActivoInterfazResource($this->service->getById($id));
    }

    public function store(StoreActivoInterfazRequest $request)
    {
        return new ActivoInterfazResource($this->service->create($request->validated()));
    }

    public function update(UpdateActivoInterfazRequest $request, $id)
    {
        return new ActivoInterfazResource($this->service->update($id, $request->validated()));
    }

    public function destroy($id)
    {
        return response()->json([
            'message' => 'Registro eliminado',
            'data' => $this->service->delete($id)
        ]);
    }
}
