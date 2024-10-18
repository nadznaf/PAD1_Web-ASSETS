<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

