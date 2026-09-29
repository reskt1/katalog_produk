<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan Form Login
    public function showLogin() {
        return view('login');
    }

     // Proses Logika Masuk / Validasi Akun
    public function login(Request $request) {
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek apakah email & password cocok dengan database
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin'); // Jika sukses, lempar ke Dashboard Admin
        }

        // Jika salah, kembali ke form login dengan pesan kesalahan (Syarat Bab B)
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }
    // Proses Keluar / Logout
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home'); // Setelah logout kembali ke Beranda
    }
}
