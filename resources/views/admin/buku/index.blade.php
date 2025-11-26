<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Buku - BookHaven</title>
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

        /* Header/Navbar */
        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 998;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            padding-top: 150px; /* Account for fixed navbar + sidebar toggle button */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 24px 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b5d4f;
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: #8b4513;
            color: white;
        }

        .btn-primary:hover {
            background: #6d3610;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #545b62;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 14px;
        }

        .search-section {
            background: white;
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .search-form {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .search-input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #e8dcc8;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #8b4513;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .book-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #e8dcc8;
        }

        .book-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .book-cover {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #f8f9fa, #e8dcc8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b5d4f;
            font-size: 48px;
            position: relative;
            overflow: hidden;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .book-info {
            padding: 20px;
        }

        .book-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .book-meta {
            font-size: 14px;
            color: #6b5d4f;
            margin-bottom: 4px;
        }

        .book-meta strong {
            color: #2c2416;
        }

        .book-price {
            font-size: 20px;
            font-weight: 600;
            color: #8b4513;
            margin: 12px 0;
        }

        .book-stock {
            font-size: 14px;
            padding: 4px 12px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 16px;
        }

        .stock-available {
            background: #d4edda;
            color: #155724;
        }

        .stock-low {
            background: #fff3cd;
            color: #856404;
        }

        .stock-empty {
            background: #f8d7da;
            color: #721c24;
        }

        .book-actions {
            display: flex;
            gap: 8px;
        }

        .no-books {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .no-books i {
            font-size: 64px;
            color: #8b4513;
            margin-bottom: 20px;
        }

        .no-books h3 {
            font-size: 24px;
            color: #2c2416;
            margin-bottom: 12px;
        }

        .no-books p {
            color: #6b5d4f;
            margin-bottom: 24px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 32px;
        }

        .pagination a, .pagination span {
            padding: 12px 16px;
            border: 1px solid #e8dcc8;
            text-decoration: none;
            color: #2c2416;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .pagination a:hover {
            background: #8b4513;
            color: white;
            border-color: #8b4513;
        }

        .pagination .current {
            background: #8b4513;
            color: white;
            border-color: #8b4513;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-success::before {
            content: "✓";
            font-weight: bold;
            color: #28a745;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #8b4513;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #6d3610;
        }

        @media (max-width: 768px) {
            body.sidebar-open {
                margin-left: 0;
            }
            
            .container {
                padding: 150px 16px 16px 16px;
            }

            .navbar-container {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }

            .user-menu {
                flex-direction: column;
                gap: 12px;
            }

            .header {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
            }

            .search-form {
                flex-direction: column;
            }

            .books-grid {
                grid-template-columns: 1fr;
            }

            .book-actions {
                flex-direction: column;
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
            <a href="{{ url('/admin/user') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-users"></i></span>
                <span>Kelola Pengguna</span>
            </a>
            <a href="{{ route('admin.buku.index') }}" class="menu-item active">
                <span class="menu-icon"><i class="fas fa-book"></i></span>
                <span>Kelola Buku</span>
            </a>
            <a href="{{ url('/admin/kategori') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-tags"></i></span>
                <span>Kelola Kategori</span>
            </a>
            <a href="{{ url('/admin/pesanan') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-clipboard-list"></i></span>
                <span>Kelola Pesanan</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Header/Navbar -->
    <header class="navbar">
        <div class="navbar-container">
            <div class="navbar-logo">BookHaven Admin</div>
            <div class="user-menu">
                <span class="welcome-text">Selamat datang, {{ auth()->user()->Nama_Lengkap }}</span>
                <span class="role-badge">{{ auth()->user()->Role }}</span>
                <a href="/logout" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
            </div>
        </div>
    </header>

    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="header">
            <div>
                <h1>Kelola Buku</h1>
                <p>Kelola koleksi buku di BookHaven</p>
            </div>
            <div class="header-actions">
                <a href="{{ route('admin.buku.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Buku Baru
                </a>
            </div>
        </div>

        <div class="search-section">
            <form method="GET" action="{{ route('admin.buku.index') }}" class="search-form">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari buku berdasarkan judul, pengarang, ISBN, atau penerbit..."
                    value="{{ $search }}"
                    class="search-input"
                >
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                    Cari
                </button>
                @if($search)
                    <a href="{{ route('admin.buku.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Reset
                    </a>
                @endif
            </form>
        </div>

        @if($books->count() > 0)
            <div class="books-grid">
                @foreach($books as $book)
                    <div class="book-card">
                        <div class="book-cover">
                            @if($book->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($book->Cover))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($book->Cover) }}" alt="{{ $book->Judul }}">
                            @else
                                <i class="fas fa-book"></i>
                            @endif
                        </div>
                        <div class="book-info">
                            <h3 class="book-title">{{ $book->Judul }}</h3>
                            <div class="book-meta">
                                <strong>Pengarang:</strong> {{ $book->Pengarang }}
                            </div>
                            <div class="book-meta">
                                <strong>Kategori:</strong> {{ $book->kategori->Nama_Kategori ?? 'Tidak ada kategori' }}
                            </div>
                            <div class="book-meta">
                                <strong>Penerbit:</strong> {{ $book->Penerbit }} ({{ $book->Tahun_Terbit }})
                            </div>
                            <div class="book-meta">
                                <strong>ISBN:</strong> {{ $book->ISBN }}
                            </div>
                            <div class="book-price">{{ $book->formatted_harga }}</div>
                            <div class="book-stock {{ $book->Stok == 0 ? 'stock-empty' : ($book->Stok < 10 ? 'stock-low' : 'stock-available') }}">
                                Stok: {{ $book->Stok }}
                                @if($book->Stok == 0)
                                    (Habis)
                                @elseif($book->Stok < 10)
                                    (Sedikit)
                                @else
                                    (Tersedia)
                                @endif
                            </div>
                            <div class="book-actions">
                                <a href="{{ route('admin.buku.show', $book->id_buku) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-eye"></i>
                                    Lihat
                                </a>
                                <a href="{{ route('admin.buku.edit', $book->id_buku) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('admin.buku.destroy', $book->id_buku) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $books->links() }}
        @else
            <div class="no-books">
                <i class="fas fa-book"></i>
                <h3>Belum ada buku</h3>
                <p>
                    @if($search)
                        Tidak ditemukan buku dengan kata kunci "{{ $search }}".
                    @else
                        Mulai tambahkan buku pertama Anda ke dalam koleksi BookHaven.
                    @endif
                </p>
                <a href="{{ route('admin.buku.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                    Tambah Buku Pertama
                </a>
            </div>
        @endif
    </div>
</body>
</html>
