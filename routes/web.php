<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'pages.dashboard');

Route::controller(EmployeeController::class)
    ->group(function () {
        Route::get('/employees', 'index')->name('employee.index');
        Route::get('/parameter/create', 'create')->name('pages.parameter.create');
        Route::post('/parameter/store', 'store')->name('pages.parameter.store');
        Route::get('/parameter/{id}/edit', 'edit')->name('pages.parameter.edit');
        Route::put('/parameter/{id}/update', 'update')->name('pages.parameter.update');
        Route::delete('/parameter/{parameter}', 'destroy')->name('pages.parameter.destroy');
    });

Route::controller(DepartmentController::class)
    ->group(function () {
        Route::get('/departments', 'index')->name('department.index');
        Route::get('/parameter/create', 'create')->name('pages.parameter.create');
        Route::post('/parameter/store', 'store')->name('pages.parameter.store');
        Route::get('/parameter/{id}/edit', 'edit')->name('pages.parameter.edit');
        Route::put('/parameter/{id}/update', 'update')->name('pages.parameter.update');
        Route::delete('/parameter/{parameter}', 'destroy')->name('pages.parameter.destroy');
    });
