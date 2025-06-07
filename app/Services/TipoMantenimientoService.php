<?php

namespace App\Services;

use App\DTO\GetAllParams;
use App\Repositories\TipoMantenimientoRepository;

class TipoMantenimientoService
{
    public function __construct(
        private TipoMantenimientoRepository $repository
    ) {}

    public function getAll(GetAllParams $params)
    {
        return $this->repository->getAll(
            filters: $params->arrayFilters,
            fields: $params->fields
        );
    }

    public function getById(string $id)
    {
        return $this->repository->findById($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }
}
