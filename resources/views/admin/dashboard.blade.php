<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BookHaven</title>
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
            background: #f8f9fa;
            color: #2c2416;
            line-height: 1.6;
        }

        /* Header */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            font-size: 24px;
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
            background: #8b4513;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .logout-btn {
            color: #dc3545;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .logout-btn:hover {
            color: #a71e2a;
        }

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #6b5d4f;
            margin-bottom: 40px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            background: #8b4513;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #2c2416;
            margin-bottom: 4px;
        }

        .stat-label {
            color: #6b5d4f;
            font-weight: 500;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 24px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            background: #f8f9fa;
            border: 2px solid #e8dcc8;
            border-radius: 12px;
            text-decoration: none;
            color: #2c2416;
            font-weight: 500;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background: #8b4513;
            color: white;
            border-color: #8b4513;
        }

        .action-icon {
            font-size: 18px;
        }

        /* Recent Activity */
        .recent-activity {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-avatar {
            width: 40px;
            height: 40px;
            background: #8b4513;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            color: #2c2416;
            margin-bottom: 4px;
        }

        .activity-time {
            color: #6b5d4f;
            font-size: 14px;
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
                font-size: 28px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">BookHaven Admin</div>
            <div class="user-menu">
                <span class="welcome-text">Selamat datang, {{ $user->Nama_Lengkap }}</span>
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

        <h1 class="page-title">Dashboard Admin</h1>
        <p class="page-subtitle">Kelola sistem BookHaven dengan mudah dan efisien</p>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number">{{ $totalUsers }}</div>
                <div class="stat-label">Total Pengguna</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🔑</div>
                <div class="stat-number">{{ $totalAdmins }}</div>
                <div class="stat-label">Total Admin</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📚</div>
                <div class="stat-number">0</div>
                <div class="stat-label">Total Buku</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-number">0</div>
                <div class="stat-label">Total Transaksi</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2 class="section-title">Aksi Cepat</h2>
            <div class="actions-grid">
                <a href="#" class="action-btn">
                    <span class="action-icon">👥</span>
                    <span>Kelola Pengguna</span>
                </a>
                <a href="#" class="action-btn">
                    <span class="action-icon">📚</span>
                    <span>Kelola Buku</span>
                </a>
                <a href="#" class="action-btn">
                    <span class="action-icon">🏷️</span>
                    <span>Kelola Kategori</span>
                </a>
                <a href="#" class="action-btn">
                    <span class="action-icon">📊</span>
                    <span>Lihat Laporan</span>
                </a>
                <a href="#" class="action-btn">
                    <span class="action-icon">🔧</span>
                    <span>Pengaturan</span>
                </a>
                <a href="/" class="action-btn">
                    <span class="action-icon">🏠</span>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h2 class="section-title">Aktivitas Terbaru</h2>

            <div class="activity-item">
                <div class="activity-avatar">A</div>
                <div class="activity-content">
                    <div class="activity-text">Sistem telah berhasil dimuat</div>
                    <div class="activity-time">Baru saja</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-avatar">🔧</div>
                <div class="activity-content">
                    <div class="activity-text">Dashboard admin siap digunakan</div>
                    <div class="activity-time">Baru saja</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-avatar">📊</div>
                <div class="activity-content">
                    <div class="activity-text">Database telah terkonfigurasi</div>
                    <div class="activity-time">Baru saja</div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
