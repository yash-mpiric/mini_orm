<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Models\Company;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    });
});

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);

// routes/web.php
Route::get('/companies/{id}', 'CompanyController@show')->name('companies.show');
// routes/web.php
Route::get('/companies/{id}', 'CompanyController@showAnotherWay')->name('companies.show.another');



Route::get('/dashboard', function () {
    $companies = Company::all();
    return view('dashboard', compact('companies'));
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
});

Auth::routes(['register' => false]);

Route::get('login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');