<?php

use App\Models\Departement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;

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

Route::get('/', function () {
    return view('login.index');
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


Route::get('dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index');
//pegawai
Route::get('/pegawais', [PegawaiController::class, 'index'])->name('pegawais.index');
Route::get('/pegawais/create', [PegawaiController::class, 'create'])->name('pegawais.create');
Route::post('/pegawais', [PegawaiController::class, 'store'])->name('pegawais.store');
Route::get('/pegawais/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawais.edit');
Route::put('/pegawais/{id}', [PegawaiController::class, 'update'])->name('pegawais.update');
Route::delete('/pegawais/{id}', [PegawaiController::class, 'destroy'])->name('pegawais.destroy');
//departments

Route::get('/departements', [DepartementController::class, 'index'])->name('departements.index');
Route::get('/departements/create', [DepartementController::class, 'create'])->name('departements.create');
Route::post('/departements', [DepartementController::class, 'store'])->name('departements.store');
Route::get('/departements/{id}/edit', [DepartementController::class, 'edit'])->name('departements.edit');
Route::put('/departements/{id}', [DepartementController::class, 'update'])->name('departements.update');
Route::delete('/departements/{id}', [DepartementController::class, 'destroy'])->name('departements.destroy');


