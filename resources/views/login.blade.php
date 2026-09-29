@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="container login-wrapper">

    <div class="login-card">
        <!-- Ikon Gembok Keamanan -->
        <div class="login-icon">🔐</div>

        <h3 style="font-size: 24px; font-weight: 800; color: #1e3c72; margin: 0 0 8px 0;">Login Admin</h3>
        <p style="font-size: 14px; color: #6c757d; margin: 0 0 30px 0;">Masukkan kredensial Anda untuk masuk ke panel pengelolaan data.</p>

        <!-- TAMPILAN PESAN ERROR JIKA KREDENSIAL SALAH (Syarat Bab B) -->
        @if ($errors->any())
            <div class="alert-error-modern" style="text-align: left; margin-bottom: 20px; padding: 12px 15px;">
                <ul style="margin: 0; padding-left: 15px; font-size: 13px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM AUTENTIKASI -->
        <form action="{{ route('login.proses') }}" method="POST" style="text-align: left;">
            @csrf

            <!-- Input Email -->
            <div class="form-group-modern">
                <label class="form-label-modern">Alamat Email Resmi</label>
                <input type="email" name="email" class="form-control-modern" placeholder="contoh@gmail.com" value="{{ old('email') }}" required autocomplete="email">
            </div>

            <!-- Input Password -->
            <div class="form-group-modern" style="margin-bottom: 25px;">
                <label class="form-label-modern">Kata Sandi (Password)</label>
                <input type="password" name="password" class="form-control-modern" placeholder="••••••••" required>
            </div>

            <!-- Tombol Submit Sign-In -->
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; font-size: 15px; font-weight: 700; border-radius: 8px; background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); box-shadow: 0 4px 12px rgba(30, 60, 114, 0.25);">
                Masuk ke Dashboard
            </button>
        </form>
    </div>

</div>
@endsection
