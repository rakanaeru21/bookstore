<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BookHaven</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background: linear-gradient(135deg, #f5f1e8 0%, #e8dcc8 100%);
            color: #2c2416;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #8b4513;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .welcome-text {
            font-weight: 500;
            color: #2c2416;
        }

        .role-badge {
            background: linear-gradient(135deg, #8b4513, #6d3610);
            color: white;
            padding: 6px 16px;
            border-radius: 25px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(139, 69, 19, 0.3);
        }

        .logout-btn {
            color: #dc3545;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
            padding: 8px 16px;
            border-radius: 6px;
            border: 1px solid #dc3545;
        }

        .logout-btn:hover {
            background: #dc3545;
            color: white;
        }

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .hero-section {
            text-align: center;
            margin-bottom: 60px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #2c2416;
            margin-bottom: 16px;
            line-height: 1.2;
        }

        .page-subtitle {
            font-size: 20px;
            color: #6b5d4f;
            margin-bottom: 32px;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #8b4513;
            color: white;
            box-shadow: 0 6px 20px rgba(139, 69, 19, 0.3);
        }

        .btn-primary:hover {
            background: #6d3610;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: #8b4513;
            border: 2px solid #8b4513;
        }

        .btn-outline:hover {
            background: #8b4513;
            color: white;
        }

        /* Features Section */
        .features-section {
            margin: 80px 0;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #2c2416;
            text-align: center;
            margin-bottom: 50px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }

        .feature-card {
            background: white;
            padding: 40px 32px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 24px;
            background: linear-gradient(135deg, #8b4513, #6d3610);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3);
        }

        .feature-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 16px;
        }

        .feature-description {
            color: #6b5d4f;
            line-height: 1.8;
        }

        /* Profile Section */
        .profile-section {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            margin: 40px 0;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 32px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #8b4513, #6d3610);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            font-weight: 700;
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3);
        }

        .profile-info h3 {
            font-size: 24px;
            color: #2c2416;
            margin-bottom: 4px;
        }

        .profile-info p {
            color: #6b5d4f;
        }

        .profile-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .detail-item {
            padding: 16px 0;
            border-bottom: 1px solid #e8dcc8;
        }

        .detail-label {
            font-weight: 600;
            color: #8b4513;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .detail-value {
            color: #2c2416;
            font-size: 16px;
        }

        /* Success Message */
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .success-message::before {
            content: "✓";
            font-weight: bold;
            color: #28a745;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }

            .user-menu {
                flex-direction: column;
                gap: 12px;
            }

            .main-container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 36px;
            }

            .page-subtitle {
                font-size: 18px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .profile-header {
                flex-direction: column;
                text-align: center;
            }

            .profile-details {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">BookHaven</div>
            <div class="user-menu">
                <span class="welcome-text">Hai, {{ $user->Nama_Lengkap }}</span>
                <span class="role-badge">{{ $user->Role }}</span>
                <a href="/logout" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
            </div>
        </div>
    </header>

    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Main Content -->
    <main class="main-container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hero Section -->
        <section class="hero-section">
            <h1 class="page-title">Selamat Datang di BookHaven</h1>
            <p class="page-subtitle">Jelajahi dunia literatur tanpa batas bersama kami</p>
            <div class="cta-buttons">
                <a href="/" class="btn btn-primary">Jelajahi Buku</a>
                <a href="#profile" class="btn btn-outline">Lihat Profil</a>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <h2 class="section-title">Fitur Unggulan untuk Anda</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📚</div>
                    <h3 class="feature-title">Koleksi Tak Terbatas</h3>
                    <p class="feature-description">Akses ribuan buku dari berbagai genre dan penulis favorit Anda kapan saja.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">⭐</div>
                    <h3 class="feature-title">Rekomendasi Personal</h3>
                    <p class="feature-description">Dapatkan rekomendasi buku yang disesuaikan dengan preferensi baca Anda.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3 class="feature-title">Akses Instan</h3>
                    <p class="feature-description">Beli dan baca buku favorit Anda dalam hitungan detik.</p>
                </div>
            </div>
        </section>

        <!-- Profile Section -->
        <section class="profile-section" id="profile">
            <div class="profile-header">
                <div class="profile-avatar">{{ substr($user->Nama_Lengkap, 0, 1) }}</div>
                <div class="profile-info">
                    <h3>Profil Anda</h3>
                    <p>Informasi akun dan preferensi Anda</p>
                </div>
            </div>

            <div class="profile-details">
                <div class="detail-item">
                    <div class="detail-label">Nama Lengkap</div>
                    <div class="detail-value">{{ $user->Nama_Lengkap }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Username</div>
                    <div class="detail-value">{{ $user->Username }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">{{ $user->Email }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">No. Handphone</div>
                    <div class="detail-value">{{ $user->NoHp }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Alamat</div>
                    <div class="detail-value">{{ $user->Alamat }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Role</div>
                    <div class="detail-value">{{ $user->Role }}</div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
