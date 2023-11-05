<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SuperAdmin\GudepController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;
use App\Http\Controllers\Backend\GugusDepan\JabatanController;
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
    return view('backend.dashboard.index');
});

route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Super Admin
route::resource('/gudeps', GudepController::class);
route::resource('/golongans', GolonganController::class);
route::resource('/tingkatans', TingkatanController::class);
route::resource('/poinskus', PoinSKUController::class);


// Gugus Depan
route::resource('/jabatans', JabatanController::class);