<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository extends BaseRepository
{
    /**
     * Set model database
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
    }

    /**
     * Get list company
     *
     * @return Collection
     */
    public function getAllCompanyWithDepartment()
    {
        return $this->model
            ->with('departments', 'departments.subDepartment')
            ->get();
    }
}
