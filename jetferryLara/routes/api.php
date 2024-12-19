<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('users', function () {
    try {
        $users = User::latest()->get();
        if ($users) {
            return response()->json([
                'status' => 200,
                "users" => $users,
            ], 200);
        }

    } catch (\Throwable $th) {
        return response()->json([
            "message" => $th->getMessage(),
            "status" => 500,
        ], 500);
    }
});
