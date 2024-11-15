<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;

class KepengurusanController extends Controller
{
    public function index()
    {
        $dataKabinet = Kabinet::all();
        return view('user.kepengurusan', compact('dataKabinet'));
    }
}
