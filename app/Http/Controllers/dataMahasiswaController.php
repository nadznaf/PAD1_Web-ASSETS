<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class dataMahasiswaController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataMahasiswa = Mahasiswa::paginate(5);
        return view('admin.dataMahasiswa', compact('dataMahasiswa', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMahasiswa' => 'required',
            'nimMahasiswa' => 'required|unique:mahasiswa,nim_mhs',
            'fotoMhs' => 'nullable|image|mimes:jpeg,png|max:2048',
        ]);
    
        $data = [
            'nama_mhs' => $request->namaMahasiswa,
            'nim_mhs' => $request->nimMahasiswa,
        ];
    
        if ($request->hasFile('fotoMhs')) {
            $file = $request->file('fotoMhs');
            $path = $file->store('datamahasiswa', 'public');
            $data['foto_profil_mhs'] = basename($path);
        }
    
        Mahasiswa::create($data);
    
        return redirect()->route('admin.datamahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'namaMhs' => 'nullable',
            'nimMhs' => 'nullable|unique:mahasiswa,nim_mhs,' . $mahasiswa->id_mhs . ',id_mhs',
            'fotoMhs' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);        
    
        // Cek jika nama baru berbeda dari yang ada di database
        if ($request->namaMhs !== $mahasiswa->nama_mhs) {
            $mahasiswa->nama_mhs = $request->namaMhs;
        }
    
        // Cek jika NIM baru berbeda dari yang ada di database
        if ($request->nimMhs && $request->nimMhs !== $mahasiswa->nim_mhs) {
            $mahasiswa->nim_mhs = $request->nimMhs;
        }
    
        // Cek jika ada upload foto baru
        if ($request->hasFile('fotoMhsEdit')) {
            // Hapus foto lama jika ada
            if ($mahasiswa->foto_profil_mhs) {
                Storage::delete('public/datamahasiswa/' . $mahasiswa->foto_profil_mhs);
            }
            
    
            // Simpan foto baru
            $file = $request->file('fotoMhsEdit');
            $path = $file->store('datamahasiswa', 'public');
            $mahasiswa->foto_profil_mhs = basename($path);

        }
    
        // Simpan perubahan hanya jika ada perubahan data
        if ($mahasiswa->isDirty()) {
            $mahasiswa->save();
            return redirect()->route('admin.datamahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
        }
    
        return redirect()->route('admin.datamahasiswa.index')->with('info', 'Tidak ada perubahan pada data mahasiswa.');
    }
    

    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->foto_profil_mhs) {
            Storage::delete('public/datamahasiswa/' . $mahasiswa->foto_profil_mhs);
        }

        $mahasiswa->delete();

        return redirect()->route('admin.datamahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}