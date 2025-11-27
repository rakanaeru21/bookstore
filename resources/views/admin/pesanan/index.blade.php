<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - BookHaven Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            transition: margin-left 0.3s ease;
        }

        /* Sidebar Toggle */
        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: #8b4513;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 12px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background: #6d3610;
            transform: scale(1.05);
        }

        /* Collapsible Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -280px;
            width: 280px;
            height: 100vh;
            background: white;
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: left 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #e8dcc8;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
        }

        .sidebar-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sidebar-subtitle {
            font-size: 14px;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: #2c2416;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .menu-item:hover {
            background: #f8f9fa;
            border-left-color: #8b4513;
            color: #8b4513;
        }

        .menu-item.active {
            background: #f8f9fa;
            border-left-color: #8b4513;
            color: #8b4513;
            font-weight: 600;
        }

        .menu-icon {
            margin-right: 12px;
            font-size: 18px;
            width: 20px;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Main content adjustment */
        body.sidebar-open {
            margin-left: 280px;
        }

        @media (max-width: 768px) {
            body.sidebar-open {
                margin-left: 0;
            }
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

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #a0522d 0%, #8b4513 100%);
            transform: translateY(-1px);
        }

        /* Alert Messages */
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin: 24px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #f0fdf4;
            border: 1px solid #22c55e;
            color: #15803d;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        /* Main Content */
        .main-content {
            padding: 48px 0;
            min-height: 80vh;
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 24px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #2c2416;
            margin-bottom: 32px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 2px 10px rgba(120, 53, 15, 0.06);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
            font-size: 24px;
            color: white;
        }

        .stat-icon.pending {
            background: #fbbf24;
        }

        .stat-icon.success {
            background: #22c55e;
        }

        .stat-icon.processing {
            background: #3b82f6;
        }

        .stat-icon.total {
            background: #78350f;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #2c2416;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            color: #78716c;
        }

        .orders-container {
            background: white;
            border-radius: 16px;
            border: 1px solid #e8dcc8;
            box-shadow: 0 4px 20px rgba(139, 69, 19, 0.08);
            overflow: hidden;
        }

        .table-header {
            background: #f8fafc;
            padding: 20px 24px;
            border-bottom: 1px solid #e8dcc8;
        }

        .table-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #2c2416;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th,
        .orders-table td {
            padding: 16px 24px;
            text-align: left;
            border-bottom: 1px solid #f1f5f9;
        }

        .orders-table th {
            background: #f8fafc;
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        .orders-table td {
            font-size: 14px;
        }

        .orders-table tr:hover {
            background: #fafaf9;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            min-width: 100px;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-success {
            background: #d1fae5;
            color: #065f46;
        }

        .status-processing {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-shipped {
            background: #e0e7ff;
            color: #3730a3;
        }

        .status-completed {
            background: #d1fae5;
            color: #065f46;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 6px;
        }

        .empty-state {
            text-align: center;
            padding: 64px 24px;
        }

        .empty-icon {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 16px;
        }

        .empty-title {
            font-size: 20px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .stat-icon.total {
            background: #8b4513;
        }

        @media (max-width: 768px) {
            .orders-table {
                font-size: 12px;
            }

            .orders-table th,
            .orders-table td {
                padding: 12px 16px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main-content {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 28px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar functionality
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            function toggleSidebar() {
                sidebar.classList.toggle('open');
                sidebarOverlay.classList.toggle('show');
                if (window.innerWidth > 768) {
                    body.classList.toggle('sidebar-open');
                }
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);
        });
    </script>
</head>
<body>
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-title">BookHaven</div>
            <div class="sidebar-subtitle">Admin Panel</div>
        </div>
        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-tachometer-alt"></i></span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.user.index') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-users"></i></span>
                <span>Kelola Pengguna</span>
            </a>
            <a href="{{ route('admin.buku.index') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-book"></i></span>
                <span>Kelola Buku</span>
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-tags"></i></span>
                <span>Kelola Kategori</span>
            </a>
            <a href="{{ route('admin.pesanan.index') }}" class="menu-item active">
                <span class="menu-icon"><i class="fas fa-clipboard-list"></i></span>
                <span>Kelola Pesanan</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">BookHaven Admin</div>
            <div class="user-menu">
                <span class="welcome-text">Selamat datang, {{ Auth::user()->Nama_Lengkap ?? 'Admin' }}</span>
                <span class="role-badge">{{ Auth::user()->Role ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn" style="background: none; border: none; cursor: pointer;">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
            <h1 class="page-title">Kelola Pesanan</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Statistics -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon total">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-value">{{ $pesanan->count() }}</div>
                    <div class="stat-label">Total Pesanan</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-value">{{ $pesanan->whereIn('Status', ['Pending', 'Menunggu Konfirmasi'])->count() }}</div>
                    <div class="stat-label">Menunggu Konfirmasi</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon processing">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <div class="stat-value">{{ $pesanan->where('Status', 'Diproses')->count() }}</div>
                    <div class="stat-label">Sedang Diproses</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon success">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="stat-value">{{ $pesanan->where('Status', 'Selesai')->count() }}</div>
                    <div class="stat-label">Selesai</div>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="orders-container">
                <div class="table-header">
                    <h2 class="table-title">Daftar Pesanan</h2>
                </div>

                @if($pesanan->count() > 0)
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Customer</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status Pembayaran</th>
                                <th>Status Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanan as $order)
                                <tr>
                                    <td>
                                        <strong>#{{ str_pad($order->id_transaksi, 6, '0', STR_PAD_LEFT) }}</strong>
                                    </td>
                                    <td>
                                        <div>
                                            <div style="font-weight: 600;">{{ $order->nama_customer }}</div>
                                            <div style="font-size: 12px; color: #78716c;">{{ $order->Email }}</div>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($order->Tanggal_Transaksi)->format('d M Y, H:i') }}</td>
                                    <td><strong>Rp {{ number_format($order->Total_harga, 0, ',', '.') }}</strong></td>
                                    <td>
                                        @if($order->Status_Pembayaran == 'Menunggu')
                                            <span class="status-badge status-pending">Menunggu</span>
                                        @elseif($order->Status_Pembayaran == 'Menunggu Verifikasi')
                                            <span class="status-badge status-pending">
                                                Menunggu Verifikasi
                                                @if($order->Bukti_Pembayaran)
                                                    <i class="fas fa-image" style="margin-left: 4px;" title="Ada bukti pembayaran"></i>
                                                @endif
                                            </span>
                                        @elseif($order->Status_Pembayaran == 'Berhasil')
                                            <span class="status-badge status-success">Berhasil</span>
                                        @else
                                            <span class="status-badge status-rejected">Gagal</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->Status == 'Pending')
                                            <span class="status-badge status-pending">Pending</span>
                                        @elseif($order->Status == 'Menunggu Konfirmasi')
                                            <span class="status-badge status-pending">Menunggu Konfirmasi</span>
                                        @elseif($order->Status == 'Diproses')
                                            <span class="status-badge status-processing">Diproses</span>
                                        @elseif($order->Status == 'Dikirim')
                                            <span class="status-badge status-shipped">Dikirim</span>
                                        @elseif($order->Status == 'Selesai')
                                            <span class="status-badge status-completed">Selesai</span>
                                        @else
                                            <span class="status-badge status-rejected">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pesanan.show', $order->id_transaksi) }}"
                                           class="btn btn-primary btn-small">
                                            <i class="fas fa-eye" style="margin-right: 4px;"></i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="empty-title">Belum Ada Pesanan</h3>
                        <p class="empty-description">Pesanan akan muncul di sini setelah customer melakukan pembelian.</p>
                    </div>
                @endif
            </div>
    </main>
</body>
</html>
