<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class dataArtikelController extends Controller
{

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataArtikel = Artikel::latest()->paginate(5);
        return view('admin.dataArtikel', compact('dataArtikel', 'admin'));
    }

    // Store (Create) Logic
    public function store(Request $request)
    {
        $request->validate([
            'judulArtikel' => 'required|string|max:255',
            'penulisArtikel' => 'required|string|max:255',
            'kontenArtikel' => 'required|string',
            'fotoSampulArtikel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'tautanArtikel' => 'nullable',
            'tanggal_terbit' => 'nullable|date',
        ]);

        $artikel = new Artikel();
        $artikel->judul_artikel = $request->judulArtikel;
        $artikel->nama_penulis = $request->penulisArtikel;
        $artikel->konten_artikel = $request->kontenArtikel;
        $artikel->tautan_artikel_resmi = $request->tautanArtikel;
        $artikel->tanggal_terbit = $request->tanggalTerbit; 

        if ($request->hasFile('fotoSampulArtikel')) {
            $path = $request->file('fotoSampulArtikel')->store('artikel', 'public');
            $artikel->foto_sampul_artikel = basename($path);
        }

        $artikel->save();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    // Update Logic
    public function update(Request $request, $id)
    {
        $request->validate([
            'judulArtikel' => 'required|string|max:255',
            'penulisArtikel' => 'required|string|max:255',
            'kontenArtikel' => 'required|string',
            'fotoSampulArtikel' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'tautanArtikel' => 'nullable',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->judul_artikel = $request->judulArtikel;
        $artikel->nama_penulis = $request->penulisArtikel;
        $artikel->konten_artikel = $request->kontenArtikel;
        $artikel->tautan_artikel_resmi = $request->tautanArtikel;

        if ($request->hasFile('fotoSampulArtikel')) {
            // Hapus file lama jika ada
            if ($artikel->foto_sampul_artikel) {
                Storage::disk('public')->delete($artikel->foto_sampul_artikel);
            }
            $path = $request->file('fotoSampulArtikel')->store('artikel', 'public');
            $artikel->foto_sampul_artikel = basename($path);
        }

        $artikel->save();
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    // DELETE function
    public function destroy($id)
    {
        // Temukan artikel yang akan dihapus
        $artikel = Artikel::findOrFail($id);

        // Hapus file gambar dari storage jika ada
        if ($artikel->foto_sampul_artikel) {
            Storage::disk('public')->delete($artikel->foto_sampul_artikel);
        }

        // Hapus artikel dari database
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
