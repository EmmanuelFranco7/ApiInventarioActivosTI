<?php

namespace App\Services;

use App\Repositories\EstadoActivoRepository;
use App\DTO\GetAllParams;

class EstadoActivoService
{
    public function __construct(private EstadoActivoRepository $repository) {}

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
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
