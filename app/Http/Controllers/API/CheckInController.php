<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CheckInService;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    protected $checkinService;

    public function __construct(CheckInService $checkinService)
    {
        $this->checkinService = $checkinService;
    }

    public function index()
    {
        $checkins = $this->checkinService->getAll();
        return response()->json([
            'status' => STT_SUCCESS,
            'message' => MSG_SUCCESS,
            'checkins' => $checkins
        ], STT_SUCCESS);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'employee_id' => 'required',
            ]);

            $checkin = $this->checkinService->create($validatedData);
            return response()->json([
                'status' => STT_SUCCESS,
                'message' => $checkin
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => STT_ERROR,
                'error' => MSG_ERROR . $e->getMessage()], STT_ERROR);
        }
    }
}
