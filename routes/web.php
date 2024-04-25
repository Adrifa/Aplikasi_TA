<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ScanAbsensiController;
use App\Http\Controllers\SettingJamController;
use App\Http\Controllers\StatusJabatanController;
use App\Models\Departement;
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
//absensi
Route::get('/absensis', [AbsensiController::class, 'index'])->name('absensis.index');
Route::get('/absensis/create', [AbsensiController::class, 'create'])->name('absensis.create');
Route::post('/absensis', [AbsensiController::class, 'store'])->name('absensis.store');
Route::get('/absensis/{id}/edit', [AbsensiController::class, 'edit'])->name('absensis.edit');
Route::put('/absensis/{id}', [AbsensiController::class, 'update'])->name('absensis.update');
Route::delete('/absensis/{id}', [AbsensiController::class, 'destroy'])->name('absensis.destroy');
//scan
Route::get('/scan', [ScanAbsensiController::class, 'index'])->name('scan');
Route::post('/scan/scanabsensi', [ScanAbsensiController::class, 'scanabsensi'])->name('scanabsensi.submit');
Route::get('/scan/scanabsensiview', [ScanAbsensiController::class, 'scanabsensiview'])->name('scanabsensiview');
//settingjam
Route::resource('settingjams', SettingJamController::class);
//statusjabatan
Route::resource('statusjabatan', StatusJabatanController::class);
//gaji
Route::resource('gaji', GajiController::class);

