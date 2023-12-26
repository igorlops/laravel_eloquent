<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Home;
use App\Http\Controllers\InativarFuncionario;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class )->name('home');

// No laravel usando o resource ele substitue Todos os métodos acima
Route::resource('clients', ClientController::class);
Route::resource('employees',EmployeeController::class);
Route::resource('projects',ProjectController::class);

Route::get('/employee/{employee}/inativar',InativarFuncionario::class)->name('employees.inativar');