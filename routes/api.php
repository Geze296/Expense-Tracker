<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        "message" => "Welcome to Expense Tracker API"
    ]);
});

Route::post('/register', [UserController::class, 'register']);

