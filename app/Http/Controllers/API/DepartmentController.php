<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = $this->departmentService->getCompanyWithDepartment();
        return response()->json([
            'status' => STT_SUCCESS,
            'message' => MSG_SUCCESS,
            'departments' => $departments
        ], STT_SUCCESS);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = $this->departmentService->getDepartmentById($id);

        if (!$department) {
            return response()->json([
                'status' => STT_404,
                'error' => MSG_404
            ], STT_404);
        }

        return response()->json([
            'status' => STT_SUCCESS,
            'message' => MSG_SUCCESS,
            'department' => $department
        ], STT_SUCCESS);
    }

    /**
     * Display the specified resource.
     */
    public function showSubDepartment(string $id)
    {
        $subDepartment = $this->departmentService->getSubDepartmentById($id);

        if (!$subDepartment) {
            return response()->json([
                'status' => STT_404,
                'error' => MSG_404
            ], STT_404);
        }

        return response()->json([
            'status' => STT_SUCCESS,
            'message' => MSG_SUCCESS,
            'department' => $subDepartment
        ], STT_SUCCESS);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSubDepartment(Request $request, string $id)
    {
        $subDepartment = $this->departmentService->getSubDepartmentById($id);
        if (!$subDepartment) {
            return response()->json([
                'status' => STT_404,
                'error' => MSG_404
            ], STT_404);
        } else {
            try {
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'parent_id' => 'required',
                ]);

                $this->departmentService->update($id, $validatedData);

                return response()->json([
                    'status' => STT_SUCCESS,
                    'message' => MSG_SUCCESS
                ], STT_SUCCESS);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => STT_ERROR,
                    'error' => MSG_ERROR . $e->getMessage()
                ], 500);
            }
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = $this->departmentService->getDepartmentById($id);
        if (!$department) {
            return response()->json([
                'status' => STT_404,
                'error' => MSG_404
            ], STT_404);
        } else {
            try {
                $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'company' => 'required',
                ]);

                $this->departmentService->update($id, $validatedData);

                return response()->json([
                    'status' => STT_SUCCESS,
                    'message' => MSG_SUCCESS
                ], STT_SUCCESS);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => STT_ERROR,
                    'error' => MSG_ERROR . $e->getMessage()
                ], 500);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
