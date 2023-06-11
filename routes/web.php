<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Guru\AbsensiController;
use App\Http\Controllers\Guru\LaporanController;
use App\Http\Controllers\Guru\ProfileController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PelajaranController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Guru\KelasController as GuruKelasController;
use App\Http\Controllers\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Guru\PelajaranController as GuruPelajaranController;

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
    } else if ($userRole == 'guru') {
        return redirect()->route('guru.dashboard');
    }
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('jurusan', JurusanController::class);

        Route::get('/kelas/{kela}/wali-kelas', [KelasController::class, 'waliKelas'])->name('kelas.wali-kelas.select');
        Route::put('/kelas/{kela}/wali-kelas', [KelasController::class, 'updateWaliKelas'])->name('kelas.wali-kelas.update');
        Route::get('/kelas/{kela}/siswa', [KelasController::class, 'siswa'])->name('kelas.siswa.select');
        Route::put('/kelas/{kela}/siswa', [KelasController::class, 'updateSiswa'])->name('kelas.siswa.update');
        Route::resource('kelas', KelasController::class);

        Route::get('/tahun-ajaran/{tahun_ajaran}/jadikan-aktif', [TahunAjaranController::class, 'jadikanAktif'])->name('tahun-ajaran.jadikan-aktif');
        Route::resource('tahun-ajaran', TahunAjaranController::class);

        Route::post('/guru/import', [GuruController::class, 'import'])->name('guru.import');
        Route::resource('guru', GuruController::class);

        Route::get('/siswa/{siswa}/kelas', [SiswaController::class, 'kelas'])->name('siswa.kelas.select');
        Route::put('/siswa/{siswa}/kelas', [SiswaController::class, 'updateKelas'])->name('siswa.kelas.update');
        Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
        Route::resource('siswa', SiswaController::class);

        Route::get('/pelajaran/{pelajaran}/guru', [PelajaranController::class, 'guru'])->name('pelajaran.guru.select');
        Route::put('/pelajaran/{pelajaran}/guru', [PelajaranController::class, 'updateGuru'])->name('pelajaran.guru.update');
        Route::delete('/pelajaran/{pelajaran}/guru/{guru}', [PelajaranController::class, 'hapusGuru'])->name('pelajaran.guru.hapus-guru');
        Route::post('/pelajaran/import', [PelajaranController::class, 'import'])->name('pelajaran.import');
        Route::resource('pelajaran', PelajaranController::class);

        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    });

    Route::group(['prefix' => 'guru', 'as' => 'guru.', 'middleware' => ['role:guru']], function () {
        Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

        Route::resource('pelajaran', GuruPelajaranController::class)->only(['index', 'show']);
        Route::resource('kelas', GuruKelasController::class)->only(['index', 'show']);

        Route::get('/absensi/{kelas}/pelajaran', [AbsensiController::class, 'pelajaran'])->name('absensi.pelajaran');
        Route::get('/absensi/{kelas}/pelajaran/{pelajaran}/pertemuan', [AbsensiController::class, 'pertemuan'])->name('absensi.pertemuan');
        Route::get('/absensi/{kelas}/pelajaran/{pelajaran}/laporan', [AbsensiController::class, 'laporan'])->name('absensi.laporan');
        Route::get('/absensi/{absensi}/absensi', [AbsensiController::class, 'absensi'])->name('absensi.absensi');
        Route::post('/absensi/{absensi}/absensi', [AbsensiController::class, 'simpanAbsensi'])->name('absensi.simpan-absensi');
        Route::resource('absensi', AbsensiController::class);

        Route::get('/laporan/{kelas}/download-kelas', [LaporanController::class, 'downloadLaporanKelas'])->name('laporan.kelas');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
});

require __DIR__ . '/auth.php';
