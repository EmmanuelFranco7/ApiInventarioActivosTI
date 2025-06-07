<?php

namespace App\Repositories;

use App\Models\TipoInterfaz;
use App\DTO\GetAllParams;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TipoInterfazRepository
{{
    public function __construct(private TipoInterfaz $model) {{}}

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

    public function find(int $id, array $fields = ['*']): ?TipoInterfaz
    {{
        return $this->model->select($fields)->find($id);
    }}

    public function create(array $data): TipoInterfaz
    {{
        return $this->model->create($data);
    }}

    public function update(int $id, array $data): ?TipoInterfaz
    {{
        $entity = $this->model->find($id);
        if ($entity) {{
            $entity->update($data);
        }}
        return $entity;
    }}

    public function delete(int $id): ?TipoInterfaz
    {{
        $entity = $this->model->find($id);
        if ($entity) {{
            $entity->delete();
        }}
        return $entity;
    }}
}}
