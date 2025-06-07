<?php

namespace App\Repositories;

use App\Models\TipoMantenimiento;

class TipoMantenimientoRepository
{
    public function getAll(array $filters = [], array $fields = ['*'])
    {
        $query = TipoMantenimiento::query();

        foreach ($filters as $key => $value) {
            if (!is_null($value)) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }

        return $query->select($fields)->paginate(config('app.pagination_count', 10));
    }

    public function findById($id)
    {
        return TipoMantenimiento::find($id);
    }

    public function create(array $data): TipoMantenimiento
    {
        return TipoMantenimiento::create($data);
    }

    public function update($id, array $data): ?TipoMantenimiento
    {
        $item = TipoMantenimiento::find($id);
        if ($item) {
            $item->update($data);
        }

        return $item;
    }

    public function delete($id): bool
    {
        $item = TipoMantenimiento::find($id);
        return $item ? $item->delete() : false;
    }
}
