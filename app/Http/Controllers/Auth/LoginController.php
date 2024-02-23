<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use ApiResponse;
    public function showLoginPage()
    {
        try {
            return view('Auth.login');
        } catch (\Throwable $th) {
            return abort(500, $th->getMessage());
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('authToken')->plainTextToken;
            return $this->apiResponse(['token' => $token],'success', 200);
        }
        return $this->apiResponse(null,'unauthenticated', 401);

    }

    function checkValidToken(Request $request)
    {
        $user=Auth::guard('sanctum')->user();
        if($user){
            return $this->apiResponse(null,'valid token', 200);
        }
        return $this->apiResponse(null,'unauthenticated', 401);
    }

    public function logout()
    {

        $user=Auth::guard('sanctum')->user();
        if($user){
            $user->tokens()->delete();
            return $this->apiResponse(null,'logout success', 200);
        }
        return $this->apiResponse(null,'unauthenticated', 401);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
