<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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
});