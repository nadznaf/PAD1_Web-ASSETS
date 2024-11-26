<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class dataAspirasiController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        
        $dataAspirasi = Aspirasi::latest()->paginate(perPage: 5);
        return view('admin.dataAspirasi', compact('dataAspirasi', 'admin'));
    }

    public function destroy($id)
    {
        // Temukan artikel yang akan dihapus
        $aspirasi = Aspirasi::findOrFail($id);

        // Hapus artikel dari database
        $aspirasi->delete();

        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil dihapus');
    }
}
