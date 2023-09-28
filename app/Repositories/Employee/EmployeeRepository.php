<?php

namespace App\Repositories\Employee;

use App\Models\Employee;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class EmployeeRepository extends BaseRepository
{
    /**
     * Set model database
     *
     * @return string
     */
    public function model()
    {
        return Employee::class;
    }

    /**
     * Get list employee
     *
     * @return Collection
     */
    public function getAllEmployees()
    {
        return $this->model->all();
    }
}
