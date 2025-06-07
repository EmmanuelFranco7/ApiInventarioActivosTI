<?php

namespace App\Services;

//use App\Models\City;
use App\Repositories\DependenciaRepository;
use App\DTO\GetAllParams;

class DependenciaService
{
    public function __construct(private DependenciaRepository $repository)
    {}

    public function getAll(GetAllParams $params)
    {
        return $this->repository->getAll($params);
    }

   /* public function getAllFiltered(array $filters = [], array $fields = ['*'])
    {
        return $this->repository->getAllFiltered($filters, $fields);
    }*/

    public function getById($id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        // Puedes añadir lógica adicional aquí antes de crear,
        // como validaciones más complejas o manipulación de datos

        

        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        // Similar a createCountry, puedes añadir lógica adicional aquí

        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        // Puedes añadir lógica para manejar dependencias o
        // realizar acciones adicionales antes de eliminar

        // Considera usar transacciones si la eliminación
        // afecta a otras tablas relacionadas
        // DB::beginTransaction();
        // try {
        //     $this->repository->delete($id);
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     throw $e;
        // }

        return $this->repository->delete($id);
    }

    // Puedes agregar más métodos según las necesidades de tu aplicación
}
