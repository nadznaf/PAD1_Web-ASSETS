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
        $dataAspirasi = Aspirasi::latest()->paginate(5);
        return view('admin.dataAspirasi', compact('dataAspirasi', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'judul_aspirasi' => 'required|string|max:255',
            'isi_aspirasi' => 'required|string',
        ]);

        $aspirasi = new Aspirasi();
        $aspirasi->nama_pengirim = $request->nama_pengirim;
        $aspirasi->judul_aspirasi = $request->judul_aspirasi;
        $aspirasi->isi_aspirasi = $request->isi_aspirasi;


        $aspirasi->save();
        return redirect()->route('admin.aspirasi.index')->with('success', 'Aspirasi berhasil ditambahkan.');
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
