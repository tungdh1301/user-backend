<?php

namespace App\Repositories\Department;

use App\Models\Department;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class DepartmentRepository extends BaseRepository
{
    /**
     * Set model database
     *
     * @return string
     */
    public function model()
    {
        return Department::class;
    }

    /**
     * Get list department
     *
     * @return Collection
     */
    public function getAllDepartmentWithEmployee()
    {
        return $this->model
            ->with('subDepartment', 'subDepartment.employees')
            ->whereNull('parent_id')
            ->get();
    }

    /**
     * Show department
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->model
            ->with('subDepartment', 'subDepartment.employees')
            ->whereNull('parent_id')
            ->find($id);
    }

    /**
     * Show sub department
     *
     * @param $id
     * @return mixed
     */
    public function showSubDepartmentWithEmployee($id)
    {
        return $this->model
            ->with('employees')
            ->whereNull('company_id')
            ->find($id);
    }

    /**
     * Update sub department
     *
     * @param $id
     * @param array $data
     * @return bool|mixed|null
     */
    public function update($id, array $data)
    {
        $department = $this->model->find($id);

        if (!$department) {
            return null;
        }

        $department->update($data);

        return $department;
    }
}
