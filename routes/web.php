<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SuperAdmin\GudepController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\GugusDepan\GolonganGudepController;
use App\Http\Controllers\Backend\GugusDepan\PengujiGudepController;
use App\Http\Controllers\Backend\GugusDepan\PengurusGudepController;
use App\Http\Controllers\Backend\GugusDepan\PesertaDidikGudepController;
use App\Http\Controllers\Backend\SuperAdmin\JabatanController;
use App\Http\Controllers\Backend\GugusDepan\ProfileGudepController;
use App\Http\Controllers\Backend\SuperAdmin\AdminGudepController;
use App\Http\Controllers\Backend\SuperAdmin\GolonganController;
use App\Http\Controllers\Backend\Superadmin\PoinSKUController;
use App\Http\Controllers\Backend\Superadmin\TingkatanController;


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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::middleware('auth:user,account_super_admin,account_admin_gudep')->group(function () {
    route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::middleware('auth:account_super_admin')->group(function () {
    // Super Admin
    route::resource('/gudeps', GudepController::class);
    route::resource('/admin-gudeps', AdminGudepController::class);
    route::resource('/golongans', GolonganController::class);
    route::resource('/tingkatans', TingkatanController::class);
    route::resource('/poinskus', PoinSKUController::class);
    route::resource('/jabatans', JabatanController::class);

});

Route::middleware('auth:account_admin_gudep')->group(function () {
    // Gugus Depan
    Route::resource('/golongan-gudeps', GolonganGudepController::class);
    Route::resource('/profil-gudeps', ProfileGudepController::class);
    Route::resource('/pengurus-gudeps', PengurusGudepController::class);
    Route::resource('/penguji-gudeps', PengujiGudepController::class);
    Route::resource('/peserta-didik-gudeps', PesertaDidikGudepController::class);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
