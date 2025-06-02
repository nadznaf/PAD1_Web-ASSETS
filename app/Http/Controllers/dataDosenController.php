<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class dataDosenController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataDosen = Dosen::latest()->paginate(5);
        return view('admin.dataDosen', compact('dataDosen', 'admin'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'namaDosen' => 'required',
                'nikaDosen' => 'required|unique:dosen_pebimbing,nika_dosen',
                'fotoDosen' => 'nullable|image|mimes:jpeg,png,svg,jpg',
            ],
            // Error message:
            [
                'namaDosen.required' => 'Nama dosen harus diisi.',
                'nikaDosen.unique' => 'NIKA dosen sudah terdaftar.',
                'fotoDosen.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            ]
        );

        $data = [
            'nama_dosen' => $request->namaDosen,
            'nika_dosen' => $request->nikaDosen,
        ];

        if ($request->hasFile('fotoDosen')) {
            $file = $request->file('fotoDosen');
            $path = $file->store('datadosen', 'public');
            $data['foto_profil_dosen'] = basename($path);
        }

        Dosen::create($data);

        return redirect()->route('admin.datadosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    public function update(Request $request, string $dosen)
    {
        $dosen = Dosen::find($dosen);
        $request->validate(
            [
                'namaDosen' => 'nullable',
                'nikaDosen' => 'nullable|unique:dosen_pebimbing,nika_dosen,' . $dosen->id_dosen . ',id_dosen',
                'fotoDosen' => 'nullable|image|mimes:jpeg,png,jpg,svg',
            ],
            // Error message:
            [
                'nikaDosen.unique' => 'NIKA dosen sudah terdaftar.',
                'fotoDosen.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
            ]
        );

        // Cek jika nama baru berbeda dari yang ada di database
        if ($request->namaDosen !== $dosen->nama_dosen) {
            $dosen->nama_dosen = $request->namaDosen;
        }

        // Cek jika NIM baru berbeda dari yang ada di database
        if ($request->nikaDosen && $request->nikaDosen !== $dosen->nika_dosen) {
            $dosen->nika_dosen = $request->nikaDosen;
        }

        // Cek jika ada upload foto baru
        if ($request->hasFile('fotoDosenEdit')) {
            // Hapus foto lama jika ada
            if ($dosen->foto_profil_dosen) {
                Storage::disk('public')->delete('datadosen/' . $dosen->foto_profil_dosen);
            }

            // Simpan foto baru
            $file = $request->file('fotoDosenEdit');
            $path = $file->store('datadosen', 'public');
            $dosen->foto_profil_dosen = basename($path);
        }

        // Simpan perubahan hanya jika ada perubahan data
        if ($dosen->isDirty()) {
            $dosen->save();
            return redirect()->route('admin.datadosen.index')->with('success', 'Data dosen berhasil diperbarui.');
        }

        return redirect()->route('admin.datadosen.index')->with('info', 'Tidak ada perubahan pada data dosen.');
    }


    public function destroy(string $dosen)
    {
        $dosen = Dosen::find($dosen);
        if ($dosen->foto_profil_dosen) {
            Storage::disk('public')->delete('datadosen/' . $dosen->foto_profil_dosen);
        }

        $dosen->delete();

        return redirect()->route('admin.datadosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }
}
