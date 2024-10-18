<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengembalikan view untuk halaman home
        return view('user.home');
    }

    public function about()
    {
        // Mengembalikan view untuk halaman about
        return view('user.about');
    }
}
