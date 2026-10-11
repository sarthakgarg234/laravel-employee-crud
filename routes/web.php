<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('employees.index');
    }

    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return redirect()->route('employees.index');
    })->name('home');

    Route::resource('employees', EmployeeController::class);

    Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy');
    
});