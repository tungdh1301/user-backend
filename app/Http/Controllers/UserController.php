<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->getAllUsers();
        $status = 200;
        $message = 'Get list success';

        return response()->json([
            'status' => $status,
            'message' => $message,
            'users' => $users
        ], $status);
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
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'status' => 'required',
                'email' => 'required|email|unique:users,email',
            ]);

            $this->userService->createUser($validatedData);

            return response()->json(['message' => MSG_SUCCESS], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => MSG_ERROR . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->getUserById($id);

        if (!$user) {
            return response()->json(['error' => MSG_404], 404);
        }

        return response()->json(['user' => $user], 200);
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
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'status' => 'required',
                'email' => 'required|email|unique:users,email',
            ]);

            $user = $this->userService->updateUser($id, $validatedData);

            if (!$user) {
                return response()->json(['error' => MSG_404], 404);
            }

            return response()->json(['message' => MSG_SUCCESS], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => MSG_ERROR . $e->getMessage()], 500);
        }
    }

    /**
     * Remove users.
     */
    public function destroy(string $id)
    {
        $result = $this->userService->deleteUser($id);

        if (!$result) {
            return response()->json(['error' => MSG_404], 404);
        }

        return response()->json(['message' => MSG_SUCCESS], 200);
    }
}
