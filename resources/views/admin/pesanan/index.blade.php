<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - BookHaven Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700|poppins:600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8b4513;
            --primary-dark: #6d3610;
            --primary-light: #a0522d;
            --secondary: #d2691e;
            --accent: #cd853f;
            --success: #28a745;
            --warning: #f59e0b;
            --danger: #dc3545;
            --info: #3b82f6;
            --purple: #8b5cf6;
            --dark: #2c2416;
            --gray-900: #1a1a1a;
            --gray-800: #2c2416;
            --gray-700: #4a3f35;
            --gray-600: #6b5d4f;
            --gray-500: #8b7355;
            --gray-400: #a89985;
            --gray-300: #d4c4b0;
            --gray-200: #e8dcc8;
            --gray-100: #f5f0e8;
            --gray-50: #faf8f5;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-50);
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        /* Sidebar Toggle */
        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 14px;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background: var(--primary-dark);
        }

        .sidebar-toggle i {
            font-size: 18px;
        }

        /* Collapsible Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -280px;
            width: 280px;
            height: 100vh;
            background: var(--white);
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            transition: left 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-header {
            padding: 24px 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-brand {
            flex: 1;
        }

        .sidebar-title {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-title i {
            font-size: 20px;
        }

        .sidebar-subtitle {
            font-size: 13px;
            opacity: 0.9;
        }

        .sidebar-close {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: background 0.2s ease;
        }

        .sidebar-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .sidebar-menu {
            padding: 16px 12px;
        }

        .menu-section {
            margin-bottom: 8px;
        }

        .menu-section-title {
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 14px 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            text-decoration: none;
            color: var(--gray-600);
            transition: all 0.2s ease;
            border-radius: 10px;
            margin: 2px 0;
            font-weight: 500;
        }

        .menu-item:hover {
            background: var(--gray-100);
            color: var(--primary);
        }

        .menu-item.active {
            background: rgba(139, 69, 19, 0.1);
            color: var(--primary);
            font-weight: 600;
        }

        .menu-icon {
            margin-right: 12px;
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
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
            background: var(--white);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--gray-200);
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 22px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--gray-50);
            padding: 8px 16px 8px 8px;
            border-radius: 50px;
            border: 1px solid var(--gray-200);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 15px;
        }

        .user-details {
            line-height: 1.3;
        }

        .welcome-text {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 14px;
            display: block;
        }

        .role-badge {
            background: var(--primary);
            color: white;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--gray-500);
            text-decoration: none;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 10px;
            transition: all 0.2s ease;
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            cursor: pointer;
        }

        .logout-btn:hover {
            color: var(--danger);
            background: rgba(220, 53, 69, 0.1);
            border-color: rgba(220, 53, 69, 0.3);
        }

        /* Main Content */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px 24px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-header-info {
            flex: 1;
        }

        .page-title {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title-icon {
            width: 44px;
            height: 44px;
            background: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .page-subtitle {
            color: var(--gray-500);
            font-size: 15px;
            margin-left: 56px;
        }

        /* Success/Error Messages */
        .success-message {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.2);
            color: #155724;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message i {
            font-size: 18px;
            color: var(--success);
        }

        .error-message {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.2);
            color: #721c24;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-message i {
            font-size: 18px;
            color: var(--danger);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            padding: 24px;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: flex-start;
            gap: 16px;
            transition: all 0.2s ease;
        }

        .stat-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            flex-shrink: 0;
        }

        .stat-icon.total {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }

        .stat-icon.pending {
            background: linear-gradient(135deg, var(--warning), #fbbf24);
        }

        .stat-icon.processing {
            background: linear-gradient(135deg, var(--info), #60a5fa);
        }

        .stat-icon.success {
            background: linear-gradient(135deg, var(--success), #34d399);
        }

        .stat-content {
            flex: 1;
        }

        .stat-value {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            line-height: 1.2;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Orders Container */
        .orders-container {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }

        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-title i {
            color: var(--primary);
        }

        /* Orders Table */
        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th,
        .orders-table td {
            padding: 16px 24px;
            text-align: left;
            border-bottom: 1px solid var(--gray-100);
        }

        .orders-table th {
            background: var(--gray-50);
            font-weight: 600;
            color: var(--gray-700);
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .orders-table td {
            font-size: 14px;
            color: var(--gray-700);
        }

        .orders-table tr:hover {
            background: var(--gray-50);
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            font-weight: 600;
            color: var(--primary);
        }

        .customer-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .customer-name {
            font-weight: 600;
            color: var(--gray-800);
        }

        .customer-email {
            font-size: 12px;
            color: var(--gray-500);
        }

        .order-total {
            font-weight: 700;
            color: var(--gray-900);
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #b45309;
        }

        .status-success {
            background: rgba(40, 167, 69, 0.1);
            color: #15803d;
        }

        .status-processing {
            background: rgba(59, 130, 246, 0.1);
            color: #1d4ed8;
        }

        .status-shipped {
            background: rgba(139, 92, 246, 0.1);
            color: #6d28d9;
        }

        .status-completed {
            background: rgba(40, 167, 69, 0.1);
            color: #15803d;
        }

        .status-rejected {
            background: rgba(220, 53, 69, 0.1);
            color: #b91c1c;
        }

        /* Buttons */
        .btn {
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-sm {
            padding: 8px 14px;
            font-size: 12px;
            border-radius: 8px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            background: var(--gray-100);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .empty-icon i {
            font-size: 32px;
            color: var(--gray-400);
        }

        .empty-state h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 8px;
        }

        .empty-state p {
            color: var(--gray-500);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 32px;
        }

        .pagination a,
        .pagination span {
            padding: 10px 16px;
            border: 1px solid var(--gray-200);
            text-decoration: none;
            color: var(--gray-600);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .pagination a:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination .current {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination .disabled {
            color: var(--gray-300);
            cursor: not-allowed;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 12px;
                text-align: center;
                padding: 0 16px;
            }

            .user-menu {
                flex-direction: column;
                gap: 10px;
            }

            .main-container {
                padding: 20px 16px;
            }

            .page-header {
                flex-direction: column;
            }

            .page-title {
                font-size: 22px;
            }

            .page-subtitle {
                margin-left: 0;
                margin-top: 8px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-value {
                font-size: 22px;
            }

            .orders-table {
                font-size: 12px;
            }

            .orders-table th,
            .orders-table td {
                padding: 12px 16px;
            }

            .sidebar-toggle {
                top: 16px;
                left: 16px;
            }

            /* Table scroll on mobile */
            .table-wrapper {
                overflow-x: auto;
            }
        }

        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-300);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-400);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const sidebarClose = document.getElementById('sidebarClose');
            const body = document.body;

            function openSidebar() {
                sidebar.classList.add('open');
                sidebarOverlay.classList.add('show');
                sidebarToggle.style.opacity = '0';
                sidebarToggle.style.visibility = 'hidden';
                if (window.innerWidth > 768) {
                    body.classList.add('sidebar-open');
                }
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                sidebarOverlay.classList.remove('show');
                sidebarToggle.style.opacity = '1';
                sidebarToggle.style.visibility = 'visible';
                body.classList.remove('sidebar-open');
            }

            if (sidebarToggle) sidebarToggle.addEventListener('click', openSidebar);
            if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
            if (sidebarClose) sidebarClose.addEventListener('click', closeSidebar);
        });
    </script>
</head>
<body>
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <div class="sidebar-title"><i class="fas fa-book-open"></i> BookHaven</div>
                <div class="sidebar-subtitle">Admin Control Panel</div>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">Menu Utama</div>
                <a href="{{ route('admin.dashboard') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-th-large"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-section-title">Manajemen</div>
                <a href="{{ route('admin.user.index') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-users"></i></span>
                    <span class="menu-text">Kelola Pengguna</span>
                </a>
                <a href="{{ route('admin.buku.index') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-book"></i></span>
                    <span class="menu-text">Kelola Buku</span>
                </a>
                <a href="{{ route('admin.kategori.index') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-folder"></i></span>
                    <span class="menu-text">Kelola Kategori</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-section-title">Transaksi</div>
                <a href="{{ route('admin.pesanan.index') }}" class="menu-item active">
                    <span class="menu-icon"><i class="fas fa-shopping-bag"></i></span>
                    <span class="menu-text">Kelola Pesanan</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-book-reader"></i>
                BookHaven Admin
            </div>
            <div class="user-menu">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->Nama_Lengkap ?? 'A', 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <span class="welcome-text">{{ Auth::user()->Nama_Lengkap ?? 'Admin' }}</span>
                        <span class="role-badge">{{ Auth::user()->Role ?? 'Admin' }}</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-container">
        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="page-header">
            <div class="page-header-info">
                <h1 class="page-title">
                    <div class="page-title-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    Kelola Pesanan
                </h1>
                <p class="page-subtitle">Kelola dan pantau semua pesanan di BookHaven</p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $pesanan->count() }}</div>
                    <div class="stat-label">Total Pesanan</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $pesanan->whereIn('Status', ['Pending', 'Menunggu Konfirmasi'])->count() }}</div>
                    <div class="stat-label">Menunggu Konfirmasi</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon processing">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $pesanan->where('Status', 'Diproses')->count() }}</div>
                    <div class="stat-label">Sedang Diproses</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-value">{{ $pesanan->where('Status', 'Selesai')->count() }}</div>
                    <div class="stat-label">Selesai</div>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="orders-container">
            <div class="table-header">
                <h2 class="table-title">
                    <i class="fas fa-list"></i>
                    Daftar Pesanan
                </h2>
            </div>

            @if($pesanan->count() > 0)
                <div class="table-wrapper">
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
                                        <span class="order-id">#{{ str_pad($order->id_transaksi, 6, '0', STR_PAD_LEFT) }}</span>
                                    </td>
                                    <td>
                                        <div class="customer-info">
                                            <span class="customer-name">{{ $order->nama_customer }}</span>
                                            <span class="customer-email">{{ $order->Email }}</span>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($order->Tanggal_Transaksi)->format('d M Y, H:i') }}</td>
                                    <td>
                                        <span class="order-total">Rp {{ number_format($order->Total_harga, 0, ',', '.') }}</span>
                                    </td>
                                    <td>
                                        @if($order->Status_Pembayaran == 'Menunggu')
                                            <span class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                Menunggu
                                            </span>
                                        @elseif($order->Status_Pembayaran == 'Menunggu Verifikasi')
                                            <span class="status-badge status-pending">
                                                <i class="fas fa-hourglass-half"></i>
                                                Menunggu Verifikasi
                                                @if($order->Bukti_Pembayaran)
                                                    <i class="fas fa-image" title="Ada bukti pembayaran"></i>
                                                @endif
                                            </span>
                                        @elseif($order->Status_Pembayaran == 'Berhasil')
                                            <span class="status-badge status-success">
                                                <i class="fas fa-check"></i>
                                                Berhasil
                                            </span>
                                        @else
                                            <span class="status-badge status-rejected">
                                                <i class="fas fa-times"></i>
                                                Gagal
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->Status == 'Pending')
                                            <span class="status-badge status-pending">
                                                <i class="fas fa-clock"></i>
                                                Pending
                                            </span>
                                        @elseif($order->Status == 'Menunggu Konfirmasi')
                                            <span class="status-badge status-pending">
                                                <i class="fas fa-hourglass-half"></i>
                                                Menunggu Konfirmasi
                                            </span>
                                        @elseif($order->Status == 'Diproses')
                                            <span class="status-badge status-processing">
                                                <i class="fas fa-cog fa-spin"></i>
                                                Diproses
                                            </span>
                                        @elseif($order->Status == 'Dikirim')
                                            <span class="status-badge status-shipped">
                                                <i class="fas fa-truck"></i>
                                                Dikirim
                                            </span>
                                        @elseif($order->Status == 'Selesai')
                                            <span class="status-badge status-completed">
                                                <i class="fas fa-check-circle"></i>
                                                Selesai
                                            </span>
                                        @else
                                            <span class="status-badge status-rejected">
                                                <i class="fas fa-ban"></i>
                                                Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.pesanan.show', $order->id_transaksi) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($pesanan->hasPages())
                    <nav class="pagination">
                        {{-- Previous --}}
                        @if ($pesanan->onFirstPage())
                            <span class="disabled"><i class="fas fa-chevron-left"></i></span>
                        @else
                            <a href="{{ $pesanan->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($pesanan->getUrlRange(1, $pesanan->lastPage()) as $page => $url)
                            @if ($page == $pesanan->currentPage())
                                <span class="current">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next --}}
                        @if ($pesanan->hasMorePages())
                            <a href="{{ $pesanan->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                        @else
                            <span class="disabled"><i class="fas fa-chevron-right"></i></span>
                        @endif
                    </nav>
                @endif
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Belum Ada Pesanan</h3>
                    <p>Pesanan akan muncul di sini setelah customer melakukan pembelian.</p>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
