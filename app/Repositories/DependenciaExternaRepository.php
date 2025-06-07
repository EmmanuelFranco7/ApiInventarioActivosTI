<?php

namespace App\Repositories;

use App\Models\DependenciaExterna;
use App\DTO\GetAllParams;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DependenciaExternaRepository
{
    public function __construct(private DependenciaExterna $model)
    {}

    /**
     * Obtener todos los registros con filtros y paginación opcional.
     */
    public function getAll(GetAllParams $params): LengthAwarePaginator|Collection
    {
        $arrayFilters = $params->arrayFilters ?? [];
        $perPage = $params->perPage ?? DEFAULT_PER_PAGE;
        $filterType = $params->filterType ?? 'and';
        $pagination = $params->pagination ?? false;
        $fields = $params->fields ?? ['*'];

        $query = $this->model->query();

        foreach ($arrayFilters as $key => $value) {
            if (!empty($value)) {
                if ($filterType === 'or') {
                    $query->orWhere($key, 'LIKE', '%' . $value . '%');
                } else {
                    $query->where($key, $value);
                }
            }
        }

        if ($perPage > MAX_PER_PAGE) {
            $perPage = MAX_PER_PAGE;
        }

        if (filter_var($pagination, FILTER_VALIDATE_BOOLEAN) === true) {
            return $query->select($fields)->paginate($perPage);
        } else {
            $perPage = MAX_PER_PAGE;
        }

        return $query->select($fields)->limit($perPage)->get();
    }

    /**
     * Contar registros totales.
     */
    public function countRecords(): int
    {
        return $this->model->count();
    }

    /**
     * Buscar por ID.
     */
    public function find(int $id, array $fields = ['*']): ?DependenciaExterna
    {
        return $this->model->select($fields)->find($id);
    }

    /**
     * Crear nuevo registro.
     */
    public function create(array $data): DependenciaExterna
    {
        return $this->model->create($data);
    }

    /**
     * Actualizar registro por ID.
     */
    public function update(int $id, array $data): ?DependenciaExterna
    {
        $registro = $this->model->find($id);
        if ($registro) {
            $registro->update($data);
        }
        return $registro;
    }

    /**
     * Eliminar registro por ID.
     */
    public function delete(int $id): ?DependenciaExterna
    {
        $registro = $this->model->find($id);
        if ($registro) {
            $registro->delete();
        } else {
            throw new ModelNotFoundException("Dependencia externa no encontrada.");
        }
        return $registro;
    }
}
