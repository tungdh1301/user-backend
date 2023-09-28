<?php

namespace App\Services;

use App\Repositories\Employee\EmployeeRepository;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAllEmployee()
    {
        return $this->employeeRepository->getAllEmployees();
    }
}
