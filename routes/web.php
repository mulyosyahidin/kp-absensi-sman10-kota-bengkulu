<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Kelas;

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
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $userRole = auth()->user()->role;

    if ($userRole === 'admin') {
        return redirect()->route('admin.dashboard');
    }
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('jurusan', JurusanController::class);
        Route::get('/kelas/{kela}/wali-kelas', [KelasController::class, 'waliKelas'])->name('kelas.wali-kelas.select');
        Route::put('/kelas/{kela}/wali-kelas', [KelasController::class, 'updateWaliKelas'])->name('kelas.wali-kelas.update');
        Route::resource('kelas', KelasController::class);
        Route::resource('tahun-ajaran', TahunAjaranController::class);
        Route::resource('guru', GuruController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
