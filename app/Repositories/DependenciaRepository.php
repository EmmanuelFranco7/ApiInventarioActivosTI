<?php
namespace App\Repositories;

use App\Models\Dependencia;
use App\DTO\GetAllParams;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DependenciaRepository
{
    //private const DEFAULT_PER_PAGE = 15;
    //private const MAX_PER_PAGE = 100;

    public function __construct(private Dependencia $model)
    {}

    /**
     * Get all users with optional filters and pagination.
     *
     * @param GetAllParams $params
     * @return LengthAwarePaginator|Collection
     */
    public function getAll(GetAllParams $params): LengthAwarePaginator|Collection
    {
        $arrayFilters = $params->arrayFilters ?? [];
        $perPage = $params->perPage ?? DEFAULT_PER_PAGE;
        $filterType = $params->filterType ?? 'and';
        $pagination = $params->pagination ?? false;
        $fields = $params->fields ?? ['*'];
        //dd($filterType);
        $query = $this->model->query();

       

        foreach ($arrayFilters as $key => $value) {
            if (!empty($value)) {
                if ($filterType === 'or') {
                    $query->orWhere($key, 'LIKE', '%' . $value . '%'); //OR
                } else { //and for default
                    //dd($value);
                    $query->where($key, $value);//AND
                }
            }
        }

        if ($perPage > MAX_PER_PAGE) {
            $perPage = MAX_PER_PAGE; //100
        }


        
        if (filter_var($pagination, FILTER_VALIDATE_BOOLEAN)==true) { //
            //dd($pagination);
            return $query->select($fields)->paginate($perPage);
        } else {
            $perPage = MAX_PER_PAGE;
        }

        return $query->select($fields)->limit($perPage)->get();
    }

    /**
     * Count the total number of Source records.
     *
     * @return int
     */
    public function countRecords(): int
    {
        return $this->model->count();
    }

    /**
     * Find a Source by ID.
     *
     * @param int $id
     * @param array $fields
     * @return Source|null
     */
    public function find(int $id, array $fields = ['*']): ?Dependencia
    {
        return $this->model->select($fields)->find($id);
    }

    /**
     * Create a new Source.
     *
     * @param array $data
     * @return Source
     */
    public function create(array $data): Dependencia
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing Source by ID.
     *
     * @param int $id
     * @param array $data
     * @return Source|null
     */
    public function update(int $id, array $data): ?Dependencia
    {
        $Dependecia = $this->model->find($id);
        if ($Dependecia) {
            $Dependecia->update($data);
        }
        return $Dependecia;
    }

    /**
     * Delete a Source by ID.
     *
     * @param int $id
     * @return Source|null
     * @throws ModelNotFoundException
     */
    public function delete(int $id): ?Dependencia
    {
        $Dependecia = $this->model->find($id);
        if ($Dependecia) {
            $Dependecia->delete();
        } else {
            throw new ModelNotFoundException("Dependencia no Encontrada");
        }
        return $Dependecia;
}
}