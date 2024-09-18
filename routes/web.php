<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserCollection;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:api'])->get('/users', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'getUser']);
Route::post('/users/add', [UserController::class, 'saveUser']);
Route::put('/users/update', [UserController::class, 'updateUser']);
