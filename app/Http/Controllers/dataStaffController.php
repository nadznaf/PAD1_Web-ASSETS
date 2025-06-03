<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\Divisi;
use App\Models\Staff;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class dataStaffController extends Controller
{
    public function index()
    {
        $admin = Auth::guard(name: 'admin')->user();
        $dataStaff = Staff::latest()->with('mahasiswa', 'divisi')->paginate(5);
        $dataKabinet = Kabinet::orderBy('created_at', 'desc')->get(); //Mengambil data kabinet dari waktu pembuatan terbaru
        $dataMahasiswa = Mahasiswa::orderBy('nama_mhs', 'asc')->get(); // Mengambil data mahasiswa dan mengurutkan secara ascending
        return view('admin.dataStaff', compact('dataStaff', 'dataMahasiswa', 'dataKabinet', 'admin'));
    }

    public function getDivisi(Request $request)
    {
        $divisi = Divisi::where('id_kabinet', $request->id_kabinet)->get();

        return response()->json($divisi);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id_divisi' => 'required',
                'id_mahasiswa' => 'required',
                'namaJabatan' => 'required',
            ],
            // Error message:
            [
                'namaJabatan.required' => 'Nama staff harus diisi.',
                'id_divisi.required' => 'Asal divisi harus diisi.',
                'id_mhs.required' => 'Mahasiswa harus diisi.',
            ]
        );

        $mhs = Mahasiswa::find($request->id_mahasiswa);
        $data = [
            'nama_jabatan' => $request->namaJabatan,
            'id_divisi' => $request->id_divisi,
            'id_mhs' => $request->id_mahasiswa,
            'foto_pose_staff' => $mhs->foto_profil_mhs
        ];
        Staff::create($data);

        return redirect()->route('admin.datastaff.index')->with('success', 'Data staff berhasil ditambahkan.');
    }

    public function update(Request $request, string $staff)
    {
        $staff = Staff::find($staff);
        $staff->nama_jabatan = $request->namaJabatan;
        $staff->id_divisi = $request->id_divisi;
        $staff->id_mhs = $request->id_mahasiswa;

        $staff->save();

        return redirect()->route('admin.datastaff.index')->with('success', 'Data staff berhasil diperbarui.');
    }

    public function destroy(string $staff)
    {
        $staff = Staff::find($staff);

        $staff->delete();

        return redirect()->route('admin.datastaff.index')->with('success', 'Data staff berhasil dihapus.');
    }
}
