<?php

namespace App\Repositories;

use App\Models\TipoLicencia;
use App\DTO\GetAllParams;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TipoLicenciaRepository
{{
    public function __construct(private TipoLicencia $model) {{}}

    public function getAll(GetAllParams $params): LengthAwarePaginator|Collection
    {{
        $query = $this->model->query();
        $arrayFilters = $params->arrayFilters ?? [];
        $perPage = $params->perPage ?? DEFAULT_PER_PAGE;
        $filterType = $params->filterType ?? 'and';
        $pagination = $params->pagination ?? false;
        $fields = $params->fields ?? ['*'];

        foreach ($arrayFilters as $key => $value) {{
            if (!empty($value)) {{
                if ($filterType === 'or') {{
                    $query->orWhere($key, 'LIKE', "%$value%");
                }} else {{
                    $query->where($key, $value);
                }}
            }}
        }}

        if ($perPage > MAX_PER_PAGE) {{
            $perPage = MAX_PER_PAGE;
        }}

        if (filter_var($pagination, FILTER_VALIDATE_BOOLEAN)) {{
            return $query->select($fields)->paginate($perPage);
        }}

        return $query->select($fields)->limit($perPage)->get();
    }}

    public function find(int $id, array $fields = ['*']): ?TipoLicencia
    {{
        return $this->model->select($fields)->find($id);
    }}

    public function create(array $data): TipoLicencia
    {{
        return $this->model->create($data);
    }}

    public function update(int $id, array $data): ?TipoLicencia
    {{
        $entity = $this->model->find($id);
        if ($entity) {{
            $entity->update($data);
        }}
        return $entity;
    }}

    public function delete(int $id): ?TipoLicencia
    {{
        $entity = $this->model->find($id);
        if ($entity) {{
            $entity->delete();
        }}
        return $entity;
    }}
}}
