<?php

use App\Http\Controllers\Bai2Controller;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TruyVanController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [Bai2Controller::class, 'index']);

Route::get('/', [EmployeesController::class, 'index'])->name('index');
Route::get('create', [EmployeesController::class, 'create'])->name('create');
Route::post('store', [EmployeesController::class, 'store'])->name('store');
Route::get('edit/{id}', [EmployeesController::class, 'edit'])->name('edit');
Route::put('update/{id}', [EmployeesController::class, 'update'])->name('update');
Route::delete('destroy/{id}', [EmployeesController::class, 'destroy'])->name('destroy');