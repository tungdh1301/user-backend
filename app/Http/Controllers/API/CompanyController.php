<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyService->getCompanyWithDepartment();
        return response()->json([
            'status' => STT_SUCCESS,
            'message' => MSG_SUCCESS,
            'companies' => $companies
        ], STT_SUCCESS);
    }
}
