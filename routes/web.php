<?php

use App\Http\Controllers\dataArtikelController;
use App\Http\Controllers\dataDokumentasiController;
use App\Http\Controllers\dataMahasiswaController;
use App\Http\Controllers\dataDosenController;
use App\Http\Controllers\dataKabinetController;
use App\Http\Controllers\dataDivisiController;
use App\Http\Controllers\dataColorPalleteController;
use App\Http\Controllers\dataPelaksanaController;
use App\Http\Controllers\dataStaffController;
use App\Http\Controllers\dataProkerController;
use App\Http\Controllers\dataAspirasiController;
use App\Http\Controllers\detailMahasiswaDanDosenController;
use App\Http\Controllers\ProkerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KabinetController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;

Route::post('pull', function (Request $request) {
    if ($request->code != env('GIT_KEY')) {
        abort(403);
    }
    $output = null;
    $returnVar = null;
    exec('cd ' . base_path() . ' && git pull 2>&1', $output, $returnVar);
    return implode("\n", $output);
})->withoutMiddleware(VerifyCsrfToken::class);
Route::post('migrate', function (Request $request) {
    if ($request->code != env('GIT_KEY')) {
        abort(403);
    }
    $output = null;
    $returnVar = null;
    exec('cd ' . base_path() . ' && php artisan migrate 2>&1', $output, $returnVar);
    return implode("\n", $output);
})->withoutMiddleware(VerifyCsrfToken::class);
Route::post('migrate-back', function (Request $request) {
    if ($request->code != env('GIT_KEY')) {
        abort(403);
    }
    $output = null;
    $returnVar = null;
    exec('cd ' . base_path() . ' && php artisan migrate:rollback 2>&1', $output, $returnVar);
    return implode("\n", $output);
})->withoutMiddleware(VerifyCsrfToken::class);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kabinet/{id}', [KabinetController::class, 'show'])->name('kabinet.show');
Route::get('/kabinet/{id}/struktur-kepengurusan', [KabinetController::class, 'strukturKabinet'])->name('kabinet.struktur');

Route::get('/proker/{id}', [ProkerController::class, 'detailProker'])->name('proker.show');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{id}', [ArtikelController::class, 'detailArtikel'])->name('artikel.show');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::post('/aspirasi/store', [AboutController::class, 'store'])->name('aspirasi.store');

Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [LoginRegisterController::class, 'dashboard'])->name('dashboard');
        Route::resource('student', dataMahasiswaController::class)->only(['index', 'store', 'update', 'destroy'])->names('datamahasiswa');
        Route::resource('lecture', dataDosenController::class)->only(['index', 'store', 'update', 'destroy'])->names('datadosen');
        Route::resource('cabinet', dataKabinetController::class)->only(['index', 'store', 'update', 'destroy'])->names('datakabinet');
        Route::resource('division', dataDivisiController::class)->only(['index', 'store', 'update', 'destroy'])->names('datadivisi');
        Route::resource('pallete', dataColorPalleteController::class)->only(['index', 'store', 'update', 'destroy'])->names('datacolorpallete');
        Route::resource('staff', dataStaffController::class)->only(['index', 'store', 'update', 'destroy'])->names('datastaff');
        Route::resource('program', dataProkerController::class)->only(['index', 'store', 'update', 'destroy'])->names('dataproker');
        Route::resource('documentation', dataDokumentasiController::class)->only(['index', 'store', 'update', 'destroy'])->names('datadokumentasi');
        Route::resource('pelaksana', dataPelaksanaController::class)->only(['index', 'store', 'update', 'destroy'])->names('datapelaksana');
        Route::resource('article', dataArtikelController::class)->only(['index', 'store', 'update', 'destroy'])->names('artikel');
        Route::resource('aspirasi', dataArtikelController::class)->only(['index', 'destroy'])->names('aspirasi');
        Route::get('mahasiswa/search', [dataStaffController::class, 'search'])->name('mahasiswa.search');
        Route::post('get-divisi', [dataStaffController::class, 'getDivisi'])->name('get.divisi');
        Route::post('get-proker', [dataProkerController::class, 'getProker'])->name('get.proker');
    });
});
