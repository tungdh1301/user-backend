<?php

namespace App\Services;

use App\Repositories\Company\CompanyRepository;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompanyWithDepartment()
    {
        return $this->companyRepository->getAllCompanyWithDepartment();
    }
}
