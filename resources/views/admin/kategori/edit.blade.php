<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - BookHaven Admin</title>
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
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #8b4513, #a0522d);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-menu {
            padding: 20px 0;
        }

        .nav-item {
            list-style: none;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: white;
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: #f9f9f9;
            font-weight: 600;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            flex: 1;
            min-height: 100vh;
            background: #f8f9fa;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 16px 32px;
            border-bottom: 1px solid #e8dcc8;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            font-weight: 700;
            color: #8b4513;
            text-decoration: none;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            background: #f8f9fa;
            border-radius: 12px;
            border: 1px solid #e8dcc8;
            color: #2c2416;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .user-info:hover {
            background: #e8dcc8;
            color: #2c2416;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .content-wrapper {
            padding: 32px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #6b5d4f;
            font-size: 16px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #8b4513;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb-separator {
            color: #6b5d4f;
        }

        .form-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
            overflow: hidden;
        }

        .form-header {
            padding: 24px 32px;
            border-bottom: 1px solid #e8dcc8;
            background: #f8f9fa;
        }

        .form-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .form-subtitle {
            color: #6b5d4f;
            font-size: 14px;
        }

        .form-body {
            padding: 32px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c2416;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
        }

        .form-control.error {
            border-color: #dc3545;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            padding: 24px 32px;
            border-top: 1px solid #e8dcc8;
            background: #f8f9fa;
        }

        .btn {
            padding: 14px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
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

        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
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

        .alert-danger {
            background: #f8d7da;
            border: 1px solid #f1b0b7;
            color: #721c24;
        }

        .alert-danger::before {
            content: "⚠";
            font-weight: bold;
            color: #dc3545;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                display: none;
            }

            .main-content {
                margin-left: 0;
            }

            .navbar {
                padding: 16px 20px;
            }

            .content-wrapper {
                padding: 20px;
            }

            .form-body {
                padding: 20px;
            }

            .form-actions {
                padding: 20px;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                <i class="fas fa-book-reader"></i>
                BookHaven
            </a>
        </div>
        <nav class="nav-menu">
            <ul>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.buku.index') }}" class="nav-link">
                        <i class="fas fa-book"></i>
                        Manajemen Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.kategori.index') }}" class="nav-link active">
                        <i class="fas fa-tags"></i>
                        Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        Transaksi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        Manajemen User
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-chart-line"></i>
                        Laporan
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar">
            <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
                BookHaven
            </a>
            <div class="navbar-user">
                <a href="#" class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <span>{{ auth()->user()->name }}</span>
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </nav>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="page-header">
                <nav class="breadcrumb">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <span class="breadcrumb-separator">/</span>
                    <a href="{{ route('admin.kategori.index') }}">Kategori</a>
                    <span class="breadcrumb-separator">/</span>
                    <span>Edit</span>
                </nav>
                <h1 class="page-title">Edit Kategori</h1>
                <p class="page-subtitle">Ubah informasi kategori buku</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    Ada kesalahan dalam pengisian form. Silakan periksa kembali.
                </div>
            @endif

            <div class="form-container">
                <div class="form-header">
                    <h2 class="form-title">
                        <i class="fas fa-edit"></i>
                        Form Edit Kategori
                    </h2>
                    <p class="form-subtitle">Ubah detail kategori "{{ $kategori->Nama_Kategori }}"</p>
                </div>

                <form method="POST" action="{{ route('admin.kategori.update', $kategori->id_kategori) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-body">
                        <div class="form-group">
                            <label for="Nama_Kategori" class="form-label">Nama Kategori *</label>
                            <input 
                                type="text" 
                                id="Nama_Kategori" 
                                name="Nama_Kategori" 
                                class="form-control @error('Nama_Kategori') error @enderror"
                                value="{{ old('Nama_Kategori', $kategori->Nama_Kategori) }}"
                                placeholder="Masukkan nama kategori..."
                                required
                            >
                            @error('Nama_Kategori')
                                <div class="error-message">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.kategori.show', $kategori->id_kategori) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>