<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Katalog UMKM Siswa SMK</title>

<style>
     /* Gaya Dasar & Reset global */
        body {
            font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
        /* 🎨 DESAIN NAVBAR MODEREN */
        .modern-nav {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .nav-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .brand-logo {
            color: #ffffff;
            text-decoration: none;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .brand-logo span {
            color: #ffc107; /* Aksen warna emas untuk teks SMK */
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 15px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }

        .btn-admin-nav {
            background-color: #ffc107;
            color: #1e3c72 !important;
            font-weight: 700 !important;
            box-shadow: 0 2px 6px rgba(255, 193, 7, 0.3);
        }

        .btn-admin-nav:hover {
            background-color: #ffca2c;
            transform: translateY(-1px);
        }
                /* 🏡 GAYA TAMBAHAN KHUSUS BERANDA */
        .hero-section {
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
            color: #ffffff;
            padding: 80px 0;
            text-align: center;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .hero-title {
            font-size: 42px;
            fw-bold: 800;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
        }

        .hero-subtitle {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.85);
            max-width: 700px;
            margin: 0 auto 35px auto;
            line-height: 1.6;
        }

        .btn-hero {
            background-color: #ffc107;
            color: #1e3c72;
            padding: 14px 32px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 50px;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
            transition: all 0.3s ease;
        }

        .btn-hero:hover {
            background-color: #ffca2c;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 193, 7, 0.5);
        }

        .feature-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            margin-top: -40px;
            padding: 0 20px;
            justify-content: center;
        }

        .feature-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            flex: 1;
            min-width: 280px;
            max-width: 350px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            box-sizing: border-box;
            transition: all 0.3s ease;
            border: 1px solid rgba(0,0,0,0.02);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 15px;
            display: inline-block;
        }

        .feature-card h5 {
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 10px 0;
            color: #1e3c72;
        }

        .feature-card p {
            font-size: 14px;
            color: #6c757d;
            margin: 0;
            line-height: 1.5;
        }

        footer {
            background: #1e3c72;
            color: rgba(255,255,255,0.7);
            text-align: center;
            padding: 20px 0;
            margin-top: 60px;
            font-size: 14px;
        }
                /* 🎒 GAYA TAMBAHAN KHUSUS KATALOG PRODUK */
        .page-header {
            margin-bottom: 30px;
        }
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1e3c72;
            margin: 0 0 5px 0;
        }
        .page-subtitle {
            font-size: 15px;
            color: #6c757d;
            margin: 0;
        }

        /* Form Pencarian Premium */
        .search-box-wrapper {
            display: flex;
            background: #ffffff;
            padding: 6px;
            border-radius: 50px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border: 1px solid #e1e5eb;
        }
        .search-input {
            flex: 1;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 50px;
            outline: none;
        }
        .btn-search {
            background: #1e3c72;
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-search:hover {
            background: #2a5298;
        }
        .btn-reset-search {
            background: #6c757d;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-right: 5px;
            display: flex;
            align-items: center;
        }

        /* Grid Toko Online & Kartu */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -12px;
        }
        .product-card-wrapper {
            flex: 0 0 25%;
            padding: 12px;
            box-sizing: border-box;
        }
        @media (max-width: 992px) { .product-card-wrapper { flex: 0 0 50%; } }
        @media (max-width: 576px) { .product-card-wrapper { flex: 0 0 100%; } }

        .premium-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border: 1px solid #eef2f5;
            display: flex;
            flex-direction: column;
            height: 100%;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .premium-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }
        .card-img-placeholder {
            background: #e9ecef;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
        }
        .card-info-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .category-pill {
            background: #eef2f5;
            color: #495057;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 4px;
            align-self: flex-start;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .product-title {
            font-size: 17px;
            font-weight: 700;
            color: #2d3748;
            margin: 0 0 6px 0;
            line-height: 1.4;
        }
        .product-code {
            font-size: 12px;
            color: #a0aec0;
            margin: 0 0 15px 0;
        }
        .card-footer-info {
            margin-top: auto;
        }
        .product-price {
            font-size: 18px;
            font-weight: 800;
            color: #dc3545;
            margin: 0 0 12px 0;
        }
        .stock-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #718096;
        }
        .btn-view-detail {
            background: transparent;
            color: #1e3c72;
            border: 1.5px solid #1e3c72;
            padding: 6px 16px;
            border-radius: 6px;
            font-weight: 700;
            text-decoration: none;
            font-size: 13px;
            transition: all 0.2s;
        }
        .btn-view-detail:hover {
            background: #1e3c72;
            color: #ffffff;
        }

        /* Notifikasi Alert Moderen */
        .modern-alert {
            background-color: #e3faf2;
            color: #0ca678;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 25px;
            border-left: 4px solid #0ca678;
        }
                /* 📦 GAYA TAMBAHAN KHUSUS DETAIL PRODUK */
        .detail-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f5;
            padding: 40px;
            margin: 40px auto;
            max-width: 900px;
        }

        .detail-row {
            display: flex;
            flex-wrap: wrap;
            margin: -20px;
        }

        .detail-col-visual {
            flex: 0 0 40%;
            padding: 20px;
            box-sizing: border-box;
        }

        .detail-col-info {
            flex: 0 0 60%;
            padding: 20px;
            box-sizing: border-box;
            text-align: left;
        }

        @media (max-width: 768px) {
            .detail-col-visual, .detail-col-info {
                flex: 0 0 100%;
            }
        }

        .visual-preview-box {
            background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
            height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 7rem;
            border-radius: 12px;
            border: 1px solid #e1e5eb;
            box-shadow: inset 0 2px 8px rgba(0,0,0,0.02);
        }

        .detail-title {
            font-size: 32px;
            font-weight: 800;
            color: #2d3748;
            margin: 0 0 8px 0;
            line-height: 1.2;
        }

        .detail-code-badge {
            font-size: 13px;
            color: #718096;
            margin-bottom: 25px;
        }

        .detail-price-tag {
            font-size: 28px;
            font-weight: 800;
            color: #dc3545;
            margin: 0 0 25px 0;
            background: #fff5f5;
            display: inline-block;
            padding: 8px 20px;
            border-radius: 8px;
            border-left: 4px solid #dc3545;
        }

        .info-section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1e3c72;
            margin: 0 0 10px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-description-text {
            color: #4a5568;
            line-height: 1.7;
            font-size: 15px;
            margin: 0;
        }

        .detail-stock-indicator {
            font-size: 15px;
            margin-bottom: 30px;
            color: #4a5568;
        }

        .btn-back-katalog {
            background: #212529;
            color: #ffffff;
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            transition: background 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .btn-back-katalog:hover {
            background: #343a40;
        }
                /* 🛠️ GAYA TAMBAHAN KHUSUS DASHBOARD ADMIN */
        .admin-header-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            border: 1px solid #eef2f5;
        }

        /* Tabel Ringkas & Modern */
        .modern-table-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            border: 1px solid #eef2f5;
            overflow: hidden;
            margin-bottom: 40px;
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        .admin-table th {
            background-color: #1e3c72;
            color: #ffffff;
            padding: 15px 20px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .admin-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #eef2f5;
            font-size: 14px;
            color: #4a5568;
        }
        .admin-table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Tombol Aksi Mini & Rapi */
        .btn-action {
            display: inline-block;
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }
        .btn-action-view { background: #e3f2fd; color: #0d6efd; }
        .btn-action-view:hover { background: #0d6efd; color: #ffffff; }

        .btn-action-edit { background: #fff3cd; color: #ffc107; }
        .btn-action-edit:hover { background: #ffc107; color: #212529; }

        .btn-action-delete { background: #f8d7da; color: #dc3545; }
        .btn-action-delete:hover { background: #dc3545; color: #ffffff; }

        /* Banner Notifikasi Sukses */
        .alert-success-modern {
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 25px;
            border-left: 4px solid #0f5132;
            font-weight: 500;
        }
                /* 📝 GAYA TAMBAHAN KHUSUS FORMULIR ADMIN (CREATE & EDIT) */
        .form-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f5;
            padding: 40px;
            margin: 40px auto;
            max-width: 650px;
        }

        .form-group-modern {
            margin-bottom: 20px;
        }

        .form-label-modern {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .form-control-modern {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            color: #4a5568;
            background-color: #ffffff;
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            box-sizing: border-box;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-control-modern:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 0 3px rgba(30, 60, 114, 0.15);
        }

        /* Layout Input Berdampingan */
        .form-row-modern {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .form-col-modern {
            flex: 1;
            margin-bottom: 0;
        }

        /* Banner Error Validasi */
        .alert-error-modern {
            background-color: #fff5f5;
            color: #c53030;
            padding: 16px 20px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 25px;
            border-left: 4px solid #c53030;
        }
                /* 🔐 GAYA TAMBAHAN KHUSUS HALAMAN LOGIN */
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            padding: 20px 0;
        }

        .login-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #eef2f5;
            padding: 40px;
            width: 100%;
            max-width: 420px;
            box-sizing: border-box;
            text-align: center;
        }

        .login-icon {
            font-size: 50px;
            margin-bottom: 15px;
            display: inline-block;
            background: #f1f5f9;
            width: 90px;
            height: 90px;
            line-height: 90px;
            border-radius: 50%;
            color: #1e3c72;
        }

</style>
</head>
<body>

    <!-- Navigasi / Menu yang Konsisten (Syarat Bab B) -->
     <!-- NAVIGASI BARU YANG LEBIH INDAH -->
    <nav class="modern-nav">
        <div class="nav-container">
            <a class="brand-logo" href="{{ route('home') }}">
                🛍️ UMKM Resky <span>Azzamy</span>
            </a>

            <ul class="nav-menu">
                <li>
                    <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li>
                    <a class="nav-link {{ Route::is('katalog.*') ? 'active' : '' }}" href="{{ route('katalog.index') }}">Katalog Produk</a>
                </li>
                <li>
                    <a class="nav-link btn-admin-nav {{ Route::is('admin.*') ? 'active' : '' }}" href="{{ route('admin.index') }}">Dashboard Admin</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Konten Dinamis -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <small>&copy; 2026 Katalog UMKM Siswa SMK. Semua Hak Dilindungi.</small>
        </div>
    </footer>

    <!-- Bootstrap 5 JS via CDN -->
    <script src="https://jsdelivr.net"></script>
</body>
</html>
