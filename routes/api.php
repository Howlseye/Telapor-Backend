<?php

use App\Http\Controllers\LaporanController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Registrasi
Route::post('/register', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if ($user) {
        return response()->json([
            'message' => 'Email sudah terdaftar'
        ], 401);
    } else {
        $newUser = User::create([
            'namaLengkap' => $request->namaLengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            'role'=> $request->role,
        ]);
    }
    return response()->json([
        'message' => 'Registrasi Berhasil'
    ], 201);
});

// Login
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Login Gagal'], 401);
    }
    $token = $user->createToken('auth_token')->plainTextToken;
    return response()->json([
        'message' => 'Login Berhasil',
        'token' => $token,
        'user' => $user
    ], 201);
});

//logout
Route::post('/logout', function (Request $request) {
    $request->user()->currentAccessToken()->delete();
    return response()->json([
        'message' => 'Logout Berhasil'
    ]);;
})->middleware('auth:sanctum');

//profile
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function (Request $request) {
        return response()->json($request->user());
    });
    Route::put('/profile', function (Request $request) {
        $user = $request->user();
        $user->namaLengkap = $request->namaLengkap;
        $existingUser = User::where('email', $request->email)->where('id', '!=', $user->id)->first();
        if ($existingUser) {
            return response()->json([
                'message' => 'Email sudah dipakai user lain'
            ], 409);
        }
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return response()->json([
            'message' => 'Profile Berhasil Diperbarui',
            'user' => $user
        ]);
    });
});

//Laporan
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::post('/laporan', [LaporanController::class, 'store']);
    Route::get('/laporan/{id}', [LaporanController::class, 'show']);
    Route::put('/laporan/{id}', [LaporanController::class, 'update']);
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy']);
});
