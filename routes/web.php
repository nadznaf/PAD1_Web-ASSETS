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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginRegisterController;


// Route::get('/home', function () {
//     return view('layouts.assets');
// })->name('home');

Route::get('/amara', function () {
    return view('layouts.app');
})->name('amara');

Route::get('/orion', function () {
    return view('layouts.app');
})->name('orion');

Route::get('/iris', function () {
    return view('layouts.app');
})->name('iris');

Route::get('/proker', function () {
    return view('layouts.app');
})->name('proker');

Route::get('/about', function () {
    return view('layouts.app');
})->name('about');


Route::get('/', [HomeController::class, 'index'])->name('home');


// Routes (in web.php)
Route::middleware('guest:admin')->group(function () {
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('login');
    Route::get('/register', [LoginRegisterController::class, 'register'])->name('register');
    Route::post('/store', [LoginRegisterController::class, 'store'])->name('store');
    Route::post('/authenticate', [LoginRegisterController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth:admin')->group(function() {
    Route::get('/admin/dashboard', [LoginRegisterController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout');
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');

// Route::get('/admin/datamahasiswa', function () {
//     return view('admin.dataMahasiswa');
// })->name('dataMahasiswa');

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datamahasiswa', [dataMahasiswaController::class, 'index'])->name('datamahasiswa.index');
        Route::post('/datamahasiswa', [dataMahasiswaController::class, 'store'])->name('datamahasiswa.store');
        Route::put('/datamahasiswa/{mahasiswa:id_mhs}', [dataMahasiswaController::class, 'update'])->name('datamahasiswa.update');
        Route::delete('/datamahasiswa/{mahasiswa:id_mhs}', [dataMahasiswaController::class, 'destroy'])->name('datamahasiswa.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datadosen', [dataDosenController::class, 'index'])->name('datadosen.index');
        Route::post('/datadosen', [dataDosenController::class, 'store'])->name('datadosen.store');
        Route::put('/datadosen/{dosen:id_dosen}', [dataDosenController::class, 'update'])->name('datadosen.update');
        Route::delete('/datadosen/{dosen:id_dosen}', [dataDosenController::class, 'destroy'])->name('datadosen.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datakabinet', [dataKabinetController::class, 'index'])->name('datakabinet.index');
        Route::post('/datakabinet', [dataKabinetController::class, 'store'])->name('datakabinet.store');
        Route::put('/datakabinet/{kabinet:id_kabinet}', [dataKabinetController::class, 'update'])->name('datakabinet.update');
        Route::delete('/datakabinet/{kabinet:id_kabinet}', [dataKabinetController::class, 'destroy'])->name('datakabinet.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datadivisi', [dataDivisiController::class, 'index'])->name('datadivisi.index');
        Route::post('/datadivisi', [dataDivisiController::class, 'store'])->name('datadivisi.store');
        Route::put('/datadivisi/{divisi:id_divisi}', [dataDivisiController::class, 'update'])->name('datadivisi.update');
        Route::delete('/datadivisi/{divisi:id_divisi}', [dataDivisiController::class, 'destroy'])->name('datadivisi.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datacolorpallete', [dataColorPalleteController::class, 'index'])->name('datacolorpallete.index');
        Route::post('/datacolorpallete', [dataColorPalleteController::class, 'store'])->name('datacolorpallete.store');
        Route::put('/datacolorpallete/{color_pallete:id_color_pallete}', [dataColorPalleteController::class, 'update'])->name('datacolorpallete.update');
        Route::delete('/datacolorpallete/{color_pallete:id_color_pallete}', [dataColorPalleteController::class, 'destroy'])->name('datacolorpallete.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datastaff', [dataStaffController::class, 'index'])->name('datastaff.index');
        Route::post('/datastaff', [dataStaffController::class, 'store'])->name('datastaff.store');
        Route::put('/datastaff/{staff:id_staff}', [dataStaffController::class, 'update'])->name('datastaff.update');
        Route::delete('/datastaff/{staff:id_staff}', [dataStaffController::class, 'destroy'])->name('datastaff.destroy');
        Route::post('/get-divisi', [dataStaffController::class, 'getDivisi'])->name('get.divisi');

        Route::get('/mahasiswa/search', [dataStaffController::class, 'search'])->name('mahasiswa.search');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dataproker', [dataProkerController::class, 'index'])->name('dataproker.index');
        Route::post('/dataproker', [dataProkerController::class, 'store'])->name('dataproker.store');
        Route::put('/dataproker/{proker:id_proker}', [dataProkerController::class, 'update'])->name('dataproker.update');
        Route::delete('/dataproker/{proker:id_proker}', [dataProkerController::class, 'destroy'])->name('dataproker.destroy');
        Route::post('/get-divisi', [dataProkerController::class, 'getDivisi'])->name('get.divisi');
        Route::post('/get-proker', [dataProkerController::class, 'getProker'])->name('get.proker');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datadokumentasi', [dataDokumentasiController::class, 'index'])->name('datadokumentasi.index');
        Route::post('/datadokumentasi', [dataDokumentasiController::class, 'store'])->name('datadokumentasi.store');
        Route::put('/datadokumentasi/{dokumentasi:id_dokumentasi}', [dataDokumentasiController::class, 'update'])->name('datadokumentasi.update');
        Route::delete('/datadokumentasi/{dokumentasi:id_dokumentasi}', [dataDokumentasiController::class, 'destroy'])->name('datadokumentasi.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/artikel', [dataArtikelController::class, 'index'])->name('artikel.index');
        Route::post('/artikel', [dataArtikelController::class, 'store'])->name('artikel.store');
        Route::put('/artikel/{artikel:id_artikel}', [dataArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/artikel/{artikel:id_artikel}', [dataArtikelController::class, 'destroy'])->name('artikel.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/datapelaksana', [dataPelaksanaController::class, 'index'])->name('datapelaksana.index');
        Route::post('/datapelaksana', [dataPelaksanaController::class, 'store'])->name('datapelaksana.store');
        Route::put('/datapelaksana/{pelaksana:id_pelaksana}', [dataPelaksanaController::class, 'update'])->name('datapelaksana.update');
        Route::delete('/datapelaksana/{pelaksana:id_pelaksana}', [dataPelaksanaController::class, 'destroy'])->name('datapelaksana.destroy');
    });
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/aspirasi', [dataAspirasiController::class, 'index'])->name('aspirasi.index');
        Route::post('/aspirasi', [dataAspirasiController::class, 'store'])->name('aspirasi.store');
        Route::delete('/aspirasi/{aspirasi:id_aspirasi}', [dataAspirasiController::class, 'destroy'])->name('aspirasi.destroy');
    });
});