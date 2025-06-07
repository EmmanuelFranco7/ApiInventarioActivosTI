<?php

namespace App\Services;

use App\Repositories\TipoAplicativoRepository;
use App\DTO\GetAllParams;

class TipoAplicativoService
{
    public function __construct(private TipoAplicativoRepository $repository) {}

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
