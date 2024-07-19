<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ],
        [
            'g-recaptcha-response.required' => 'Harap isi captcha.',
            'g-recaptcha-response.captcha' => 'Captcha yang anda masukkan salah.',
        ]);

        $credentials = $request->only('email', 'password');

        // Coba autentikasi sebagai admin
        $admin = User::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            Session::put('name', strtoupper($admin->name)); // Ganti 'nama' dengan nama kolom yang sesuai
            Session::put('email', $admin->email); // Ganti 'email' dengan nama kolom yang sesuai
            return redirect()->route('dashboard.index'); // Pastikan rute ini benar
        }

        $pegawai = Pegawai::where('email', $credentials['email'])->first();
        if ($pegawai && Hash::check($credentials['password'], $pegawai->password)) {
            Auth::guard('pegawai')->login($pegawai);
            Session::put('id', $pegawai->id); // Ganti 'nama' dengan nama kolom yang sesuai
            Session::put('name', strtoupper($pegawai->namapegawai)); // Ganti 'nama' dengan nama kolom yang sesuai
            Session::put('email', $pegawai->email); // Ganti 'email' dengan nama kolom yang sesuai
            // return view('user.index');
            return redirect()->route('user.index'); // Pastikan rute ini benar
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    } //


    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('pegawai')->check()) {
            Auth::guard('pegawai')->logout();
        }

        Session::flush();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Pastikan rute ini benar
    }
}



