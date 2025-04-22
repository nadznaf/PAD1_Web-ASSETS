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
        $dataColorPallete = ColorPallete::latest()->with('kabinet')->paginate(5);
        $dataKabinet = Kabinet::all(); // Mengambil data dosen untuk dropdown
        return view('admin.dataColorPalleteKabinet', compact('dataColorPallete', 'dataKabinet', 'admin'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'primaryColor' => 'required',
                'secondaryColor' => 'required',
                'id_kabinet' => 'required',
            ],
            // error messsage:
            [
                'primaryColor.required' => 'Data ini perlu diisi',
                'secondaryColor.required' => 'Data ini perlu diisi',
                'id_kabinet.required' => 'Data ini perlu diisi',
            ]
        );

        $data = [
            'primary_color' => $request->primaryColor,
            'secondary_color' => $request->secondaryColor,
            'id_kabinet' => $request->id_kabinet,
        ];

        ColorPallete::create($data);

        return redirect()->route('admin.datacolorpallete.index')->with('success', 'Data color pallete berhasil ditambahkan.');
    }

    public function update(Request $request, string $colorPallete)
    {
        $colorPallete = ColorPallete::find($colorPallete);

        $request->validate(
            [
                'id_kabinet' => 'required',
            ],
            // error messsage:
            [
                'id_kabinet.required' => 'Data ini perlu diisi',
            ]
        );

        $colorPallete->primary_color = $request->primaryColor;
        $colorPallete->secondary_color = $request->secondaryColor;
        $colorPallete->id_kabinet = $request->id_kabinet;


        $colorPallete->save();

        return redirect()->route('admin.datacolorpallete.index')->with('success', 'Data color pallete  berhasil diperbarui.');
    }

    public function destroy(string $colorPallete)
    {
        $colorPallete = ColorPallete::find($colorPallete);

        $colorPallete->delete();

        return redirect()->route('admin.datacolorpallete.index')->with('success', 'Data color pallete  berhasil dihapus.');
    }
}
