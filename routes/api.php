<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        "message" => "Welcome to Expense Tracker API"
    ]);
});

Route::post('/register', [UserController::class, 'register']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return response()->json(['message' => 'Email verified!']);
})->middleware(['auth:sanctum', 'signed'])->name('verification.verify');
