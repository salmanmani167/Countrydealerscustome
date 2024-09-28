<?php

namespace App\Repositories;

use App\Models\Payroll;
use App\Repositories\BaseRepository;

class PayrollRepository extends BaseRepository
{
    /**
     * PermissionRepository constructor.
     *
     * @param  Permission  $model
     */
    public function __construct(Payroll $model)
    {
        $this->model = $model;
    }

    public function getAll($filters = [], $pagination = true, $status = '')
    {
        $query = $this->model::query();

        if (isset($filters['search']) && $filters['search']) {
            $query = $query->where('case_code', '=', $filters['search']);
        }
        if ($status) {
            $query = $query->where('status', true);
        }
        if ($pagination) {
            return $query->orderBy('id', 'desc')->paginate(Config('constants.PAGINATION_LIMIT'));
        }

        return $query->orderBy('id', 'desc')->get();
    }

    /**
     * @param  RoleData  $data
     * @return mixed
     */
    public function store($data = []): mixed
    {
        return $this->create($data);
    }

    /**
     * @param $donor
     * @return bool
     */
    public function destroy($id): bool
    {
        return $this->model->query()->where('id', $id)->delete();
    }

}
