<?php

use App\Http\Controllers\dataMahasiswaController;
use App\Http\Controllers\dataDosenController;
use App\Http\Controllers\dataKabinetController;
use App\Http\Controllers\dataDivisiController;
use App\Http\Controllers\dataColorPalleteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KabinetController;

// Route::get('/', function () {
//     return view('user.home');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/kabinet', [KabinetController::class, 'index'])->name('kabinet');


Route::get('/detailMahasiswa', function () {
    return view('user.detailMahasiswa');
})->name('detailMahasiswa');

Route::get('/kabinet/{id}', [dataKabinetController::class, 'show'])->name('kabinet.show');

Route::get('/kepengurusan', function () {
    return view('user.kepengurusan');
})->name('kepengurusan');

Route::get('/proker', function () {
    return view('user.proker');
})->name('proker');

// Route::get('/artikel', function () {
//     return view('user.artikel');
// })->name('artikel');

// Route::get('/kabinet/{id}', [artikelController::class, 'show'])->name('kabinet.show');

Route::get('/detailArtikel', function () {
    return view('user.detailArtikel');
})->name('detailArtikel');

// Route::get('/about', function () {
//     return view('user.about');
// })->name('about');


// Route::get('/', [HomeController::class, 'index'])->name('home');


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
