<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Models\Aspirasi;
use App\Models\Divisi;
use App\Models\Dokumentasi;
use App\Models\Kabinet;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Pelaksana;
use App\Models\Proker;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginRegisterController extends Controller
{
    public function register()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email_admin' => 'required|email|max:250|unique:admin',
            'password' => 'required|confirmed|min:8'
        ]);

        $admin = Admin::create([
            'email_admin' => $request->email_admin,
            'password' => Hash::make($request->password)
        ]);

        Auth::guard('admin')->login($admin);
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard')
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email_admin' => 'required|email|max:250',
            'password' => 'required|min:8'
        ]);

        $remember = $request->has('remember-device');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'))
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email_admin' => 'The provided credentials do not match our records.',
        ])->onlyInput('email_admin');
    }

    public function dashboard()
    {
        if (Auth::guard('admin')->check()) {
            // Ambil data admin yang sedang login
            $admin = Auth::guard('admin')->user();

            $jumlahMahasiswa = Mahasiswa::count();
            $jumlahKabinet = Kabinet::count();
            $jumlahDivisi = Divisi::count();
            $jumlahStaff = Staff::count();
            $jumlahProker = Proker::count();
            $jumlahDokumentasi = Dokumentasi::count();
            $jumlahAspirasi = Aspirasi::count();

            // Kirim data admin ke view 'admin.dashboard'
            return view('admin.dashboard', compact(
                'admin',
                'jumlahMahasiswa',
                'jumlahKabinet',
                'jumlahDivisi',
                'jumlahStaff',
                'jumlahProker',
                'jumlahDokumentasi',
                'jumlahAspirasi'
            ));
        }

        return redirect()->route('login')->withErrors([
            'email_admin' => 'Please login to access the dashboard.'
        ])->onlyInput('email_admin');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have successfully logged out!');
    }
}
