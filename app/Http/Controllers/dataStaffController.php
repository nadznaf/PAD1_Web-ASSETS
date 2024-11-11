<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use App\Models\Staff;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class dataStaffController extends Controller
{
    public function index()
    {
        $admin = Auth::guard(name: 'admin')->user();
        $dataStaff = Staff::latest()->with('mahasiswa','divisi')->paginate(5);
        $dataKabinet = Kabinet::orderBy('created_at', 'desc')->get(); //Mengambil data kabinet dari waktu pembuatan terbaru
        $dataMahasiswa = Mahasiswa::orderBy('nama_mhs', 'asc')->get(); // Mengambil data mahasiswa dan mengurutkan secara ascending
        return view('admin.dataStaff', compact('dataStaff','dataMahasiswa', 'dataKabinet', 'admin'));
    }

    public function getDivisi(Request $request)
    {
        $divisi = Divisi::where('id_kabinet', $request->id_kabinet)->get();
            
        return response()->json($divisi);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_divisi' => 'required',
            'id_mahasiswa' => 'required',
            'namaJabatan' => 'required',
            'tugasStaff' => 'required',
            'fotoPoseStaff' => 'nullable|image|mimes:jpg,jpeg,png,svg',
        ], 
        // Error message:
        [
            'namaJabatan.required' => 'Nama staff harus diisi.',
            'tugasStaff.required' => 'Tugas staff harus diisi.',
            'id_divisi.required' => 'Asal divisi harus diisi.',
            'id_mhs.required' => 'Mahasiswa harus diisi.',
            'fotoPoseStaff.image' => 'File harus berupa gambar.',
            'fotoPoseStaff.mimes' => 'Gambar harus berformat jpg, jpeg, svg, atau png.',
        ]);

        
        $data = [
            'nama_jabatan' => $request->namaJabatan,
            'tugas_staff' => $request->tugasStaff,
            'id_divisi' => $request->id_divisi,
            'id_mhs' => $request->id_mahasiswa,
        ];
        
        if ($request->hasFile('fotoPoseStaff')) {
            $file = $request->file('fotoPoseStaff');
            $path = $file->store('datastaff', 'public');
            $data['foto_pose_staff'] = basename($path);
        }
        Staff::create($data);
    
        return redirect()->route('admin.datastaff.index')->with('success', 'Data staff berhasil ditambahkan.');
    }

    public function update(Request $request, Staff $staff)
    {

        
        if ($request->hasFile('fotoPoseStaff')) {
            // Hapus foto lama jika ada
            if ($staff->foto_pose_staff) {
                Storage::delete('public/datastaff/' . $staff->foto_pose_staff);
            }
            
            // Simpan foto baru
            $file = $request->file('fotoPoseStaff');
            $path = $file->store('datastaff', 'public');
            $staff->foto_pose_staff = basename($path);
        }

        $staff->nama_jabatan = $request->namaJabatan;
        $staff->tugas_staff = $request->tugasStaff;
        $staff->id_divisi = $request->id_divisi;
        $staff->id_mhs = $request->id_mahasiswa;

        $staff->save();

        return redirect()->route('admin.datastaff.index')->with('success', 'Data staff berhasil diperbarui.');
    }

    public function destroy(Staff $staff)
    {

        $staff->delete();

        return redirect()->route('admin.datastaff.index')->with('success', 'Data staff berhasil dihapus.');
    }
}
