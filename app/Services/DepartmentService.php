<?php

namespace App\Services;

use App\Repositories\Department\DepartmentRepository;

class DepartmentService
{
    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function getCompanyWithDepartment()
    {
        return $this->departmentRepository->getAllDepartmentWithEmployee();
    }

    public function getDepartmentById($id)
    {
        return $this->departmentRepository->show($id);
    }

    public function getSubDepartmentById($id)
    {
        return $this->departmentRepository->showSubDepartmentWithEmployee($id);
    }

    public function update($id, array $data)
    {
        return $this->departmentRepository->update($id, $data);
    }
}
