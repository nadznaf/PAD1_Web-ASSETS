<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabinet;
use App\Models\ColorPallete;
use Illuminate\Support\Facades\Auth;

class dataColorPalleteController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $dataColorPallete = ColorPallete::with('kabinet')->paginate(5);
        $dataKabinet = Kabinet::all(); // Mengambil data dosen untuk dropdown
        return view('admin.dataColorPalleteKabinet', compact('dataColorPallete', 'dataKabinet', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'primaryColor' => 'required',
            'secondaryColor' => 'required',
            'id_kabinet' => 'required',
        ]);
    
        $data = [
            'primary_color' => $request->primaryColor,
            'secondary_color' => $request->secondaryColor,
            'id_kabinet' => $request->id_kabinet,
        ];
    
        ColorPallete::create($data);
    
        return redirect()->route('admin.datacolorpallete.index')->with('success', 'Data color pallete berhasil ditambahkan.');
    }

    public function update(Request $request, ColorPallete $colorPallete)
    {
        $colorPallete->primary_color = $request->primaryColor;
        $colorPallete->secondary_color = $request->secondaryColor;
        $colorPallete->id_kabinet = $request->id_kabinet;


        $colorPallete->save();

        return redirect()->route('admin.datacolorpallete.index')->with('success', 'Data color pallete  berhasil diperbarui.');
    }

    public function destroy( ColorPallete $colorPallete)
    {

        $colorPallete->delete();

        return redirect()->route('admin.datacolorpallete.index')->with('success', 'Data color pallete  berhasil dihapus.');
    }
}
