<?php

namespace App\Services;

use App\Repositories\DependenciaExternaRepository;
use App\DTO\GetAllParams;

class DependenciaExternaService
{
    public function __construct(private DependenciaExternaRepository $repository)
    {}

    public function getAll(GetAllParams $params)
    {
        return $this->repository->getAll($params);
    }

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        // Puedes agregar validaciones o transformación de datos aquí
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        // Puedes incluir lógica adicional aquí
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        // Puedes añadir validaciones o lógica relacionada a relaciones
        return $this->repository->delete($id);
    }

    // Puedes añadir métodos personalizados según necesidad
}
