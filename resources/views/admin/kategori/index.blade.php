<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - BookHaven</title>
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

        .page-actions {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        /* Buttons */
        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
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

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-sm {
            padding: 8px 14px;
            font-size: 13px;
            border-radius: 8px;
        }

        /* Search Section */
        .search-section {
            background: var(--white);
            padding: 20px 24px;
            border-radius: 16px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
        }

        .search-form {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .search-input-wrapper {
            flex: 1;
            position: relative;
        }

        .search-input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
        }

        .search-input {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 1px solid var(--gray-200);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
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

        /* Categories Grid */
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .category-card {
            background: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            transition: all 0.2s ease;
        }

        .category-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .category-icon {
            width: 100%;
            height: 120px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            position: relative;
            overflow: hidden;
        }

        .category-info {
            padding: 20px;
        }

        .category-name {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 12px;
        }

        .category-meta {
            font-size: 13px;
            color: var(--gray-600);
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .category-meta i {
            width: 16px;
            color: var(--gray-400);
        }

        .book-count {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 600;
            color: var(--primary);
            background: rgba(139, 69, 19, 0.1);
            padding: 6px 12px;
            border-radius: 20px;
            margin: 12px 0 16px;
        }

        .category-actions {
            display: flex;
            gap: 8px;
            padding-top: 16px;
            border-top: 1px solid var(--gray-100);
        }

        .category-actions .btn {
            flex: 1;
            justify-content: center;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
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
            margin-bottom: 24px;
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
            .categories-grid {
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

            .page-actions {
                width: 100%;
            }

            .page-actions .btn {
                flex: 1;
                justify-content: center;
            }

            .search-form {
                flex-direction: column;
            }

            .search-input-wrapper {
                width: 100%;
            }

            .search-form .btn {
                width: 100%;
                justify-content: center;
            }

            .categories-grid {
                grid-template-columns: 1fr;
            }

            .category-actions {
                flex-direction: column;
            }

            .sidebar-toggle {
                top: 16px;
                left: 16px;
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
                <a href="{{ url('/admin/user') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-users"></i></span>
                    <span class="menu-text">Kelola Pengguna</span>
                </a>
                <a href="{{ route('admin.buku.index') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-book"></i></span>
                    <span class="menu-text">Kelola Buku</span>
                </a>
                <a href="{{ route('admin.kategori.index') }}" class="menu-item active">
                    <span class="menu-icon"><i class="fas fa-folder"></i></span>
                    <span class="menu-text">Kelola Kategori</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-section-title">Transaksi</div>
                <a href="{{ url('/admin/pesanan') }}" class="menu-item">
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
                        {{ strtoupper(substr(auth()->user()->Nama_Lengkap, 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <span class="welcome-text">{{ auth()->user()->Nama_Lengkap }}</span>
                        <span class="role-badge">{{ auth()->user()->Role }}</span>
                    </div>
                </div>
                <a href="/logout" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
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
                        <i class="fas fa-folder"></i>
                    </div>
                    Kelola Kategori
                </h1>
                <p class="page-subtitle">Kelola kategori buku di BookHaven</p>
            </div>
            <div class="page-actions">
                <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Kategori Baru
                </a>
            </div>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <form method="GET" action="{{ route('admin.kategori.index') }}" class="search-form">
                <div class="search-input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Cari kategori..." value="{{ $search }}" class="search-input">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    Cari
                </button>
                @if($search)
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Reset
                    </a>
                @endif
            </form>
        </div>

        @if($categories->count() > 0)
            <div class="categories-grid">
                @foreach($categories as $category)
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="category-info">
                            <h3 class="category-name">{{ $category->Nama_Kategori }}</h3>
                            <div class="category-meta">
                                <i class="fas fa-calendar"></i>
                                <span>Dibuat: {{ $category->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="category-meta">
                                <i class="fas fa-clock"></i>
                                <span>Diubah: {{ $category->updated_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="book-count">
                                <i class="fas fa-book"></i>
                                {{ $category->buku_count }} Buku
                            </div>
                            <div class="category-actions">
                                <a href="{{ route('admin.kategori.show', $category->id_kategori) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.kategori.edit', $category->id_kategori) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.kategori.destroy', $category->id_kategori) }}" style="display: inline; flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="width: 100%;" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Kategori yang memiliki buku tidak dapat dihapus.')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($categories->hasPages())
                <nav class="pagination" role="navigation" aria-label="Pagination">
                    @if ($categories->onFirstPage())
                        <span class="disabled">&laquo;</span>
                    @else
                        <a href="{{ $categories->previousPageUrl() }}" rel="prev">&laquo;</a>
                    @endif

                    @foreach (range(1, $categories->lastPage()) as $page)
                        @if ($page == $categories->currentPage())
                            <span class="current">{{ $page }}</span>
                        @else
                            <a href="{{ $categories->url($page) }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($categories->hasMorePages())
                        <a href="{{ $categories->nextPageUrl() }}" rel="next">&raquo;</a>
                    @else
                        <span class="disabled">&raquo;</span>
                    @endif
                </nav>
            @endif
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-folder-open"></i>
                </div>
                <h3>Belum ada kategori</h3>
                <p>
                    @if($search)
                        Tidak ditemukan kategori dengan kata kunci "{{ $search }}".
                    @else
                        Mulai tambahkan kategori pertama untuk mengorganisir buku-buku Anda.
                    @endif
                </p>
                <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Kategori Pertama
                </a>
            </div>
        @endif
    </main>
</body>
</html>
