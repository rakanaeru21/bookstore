<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BookHaven</title>
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
            background: #fafaf9;
            color: #1c1917;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        header {
            padding: 20px 0;
            background: white;
            border-bottom: 1px solid #e7e5e4;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #78350f;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo::before {
            content: "";
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 6px;
            display: inline-block;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #57534e;
            font-weight: 500;
            transition: color 0.2s;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: #78350f;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            background: #fef3c7;
            border-radius: 100px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
            color: #78350f;
        }

        .user-role {
            font-size: 12px;
            color: #92400e;
            font-weight: 500;
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
        }

        .btn-logout {
            background: #292524;
            color: white;
        }

        .btn-logout:hover {
            background: #1c1917;
            transform: translateY(-1px);
        }

        /* Hero Section */
        .hero {
            padding: 48px 0;
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            border-bottom: 1px solid #fde68a;
        }

        .hero-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 48px;
        }

        .hero-text {
            flex: 1;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #78350f;
            margin-bottom: 12px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 18px;
            color: #92400e;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 32px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #fde68a;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            color: #78350f;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 13px;
            color: #92400e;
            font-weight: 500;
        }

        /* Success Message */
        .success-message {
            background: #d1fae5;
            border: 1px solid #6ee7b7;
            color: #065f46;
            padding: 16px 20px;
            border-radius: 12px;
            margin: 24px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .success-message::before {
            content: "✓";
            width: 24px;
            height: 24px;
            background: #10b981;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        /* Search and Filter Section */
        .search-filter-section {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-top: 32px;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
            border: 1px solid #fde68a;
        }

        .search-filter-form {
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input-group {
            flex: 1;
            min-width: 300px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 14px 20px 14px 50px;
            border: 2px solid #fde68a;
            border-radius: 12px;
            font-size: 16px;
            background: white;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
        }

        .search-input:focus {
            outline: none;
            border-color: #78350f;
            box-shadow: 0 0 0 3px rgba(120, 53, 15, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #92400e;
            font-size: 18px;
        }

        .filter-group {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-select {
            padding: 14px 16px;
            border: 2px solid #fde68a;
            border-radius: 12px;
            font-size: 14px;
            background: white;
            color: #78350f;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
            font-weight: 500;
            min-width: 160px;
        }

        .filter-select:focus {
            outline: none;
            border-color: #78350f;
            box-shadow: 0 0 0 3px rgba(120, 53, 15, 0.1);
        }

        .search-btn {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            border: none;
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Instrument Sans', sans-serif;
        }

        .search-btn:hover {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.3);
        }

        .reset-btn {
            background: #6b5d4f;
            color: white;
            border: none;
            padding: 14px 20px;
            border-radius: 12px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
        }

        .reset-btn:hover {
            background: #57534e;
            transform: translateY(-1px);
        }

        .search-results-info {
            margin-top: 16px;
            padding: 12px 16px;
            background: #fef3c7;
            border-radius: 8px;
            color: #92400e;
            font-size: 14px;
            font-weight: 500;
        }

        /* Section Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #1c1917;
        }

        .view-all {
            color: #78350f;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: gap 0.2s;
        }

        .view-all:hover {
            gap: 10px;
        }

        .view-all::after {
            content: "→";
        }

        /* Books Section */
        .books-section {
            padding: 64px 0;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 24px;
        }

        .book-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s;
            border: 1px solid #e7e5e4;
            display: flex;
            flex-direction: column;
        }

        .book-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: #d6d3d1;
        }

        .book-cover {
            aspect-ratio: 3/4;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f5f4 0%, #e7e5e4 100%);
            position: relative;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .book-card:hover .book-cover img {
            transform: scale(1.05);
        }

        .no-cover {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            text-align: center;
            color: #78350f;
            font-weight: 600;
            font-size: 14px;
        }

        .book-info {
            padding: 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .book-title {
            font-weight: 600;
            font-size: 15px;
            color: #1c1917;
            margin-bottom: 6px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-meta {
            font-size: 13px;
            color: #78716c;
            margin-bottom: 12px;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .book-author {
            font-weight: 500;
        }

        .book-category {
            color: #92400e;
        }

        .book-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: auto;
        }

        .btn-cart {
            background: transparent;
            color: #78350f;
            border: 1.5px solid #78350f;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .btn-cart:hover {
            background: #78350f;
            color: white;
        }

        .btn-buy {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            border: none;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            width: 100%;
        }

        .btn-buy:hover {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            transform: translateY(-1px);
        }

        /* Category Section */
        .category-section {
            padding: 48px 0;
            background: #fafaf9;
            border-top: 1px solid #e7e5e4;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #78716c;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 16px;
            opacity: 0.3;
        }

        .empty-state h3 {
            font-size: 20px;
            color: #57534e;
            margin-bottom: 8px;
        }

        /* Footer */
        footer {
            background: #1c1917;
            color: white;
            padding: 48px 0 24px;
            margin-top: 64px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 32px;
        }

        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 16px;
            color: #fbbf24;
            font-size: 18px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.2s;
            font-size: 14px;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-content {
                flex-direction: column;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .books-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 16px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .section-title {
                font-size: 24px;
            }

            .search-filter-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input-group {
                min-width: auto;
            }

            .filter-group {
                justify-content: space-between;
            }

            .search-btn, .reset-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <a href="#hero" class="logo">BookHaven</a>
                <ul class="nav-links">
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#books">Jelajahi Buku</a></li>
                    <li><a href="#categories">Kategori</a></li>
                </ul>
                <div class="user-section">
                    <div class="user-info">
                        <div class="user-avatar">{{ strtoupper(substr($user->Nama_Lengkap, 0, 1)) }}{{ strtoupper(substr(explode(' ', $user->Nama_Lengkap)[1] ?? '', 0, 1)) }}</div>
                        <div class="user-details">
                            <span class="user-name">{{ $user->Nama_Lengkap }}</span>
                            <span class="user-role">{{ $user->Role }}</span>
                        </div>
                    </div>
                    @php
                        $cart = session()->get('cart', []);
                        $cartCount = array_sum(array_column($cart, 'qty'));
                    @endphp
                    <a href="{{ route('cart.show') }}" class="btn" style="background: #f59e0b; color: white; margin-right: 8px; position: relative; width: 48px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-shopping-cart" style="font-size: 16px;"></i>
                        @if($cartCount > 0)
                            <span style="position: absolute; top: -8px; right: -8px; background: #dc2626; color: white; border-radius: 50%; width: 20px; height: 20px; font-size: 12px; display: flex; align-items: center; justify-content: center; font-weight: bold;">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-logout">Keluar</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <!-- Success Message -->
    @if(session('success'))
    <div class="container">
        <div class="success-message">
            {{ session('success') }}
        </div>
    </div>
    @endif

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Selamat Datang, {{ $user->Nama_Lengkap }}!</h1>
                    <p>Temukan petualangan baru dalam setiap halaman. Jelajahi koleksi buku pilihan kami yang telah dikurasi khusus untuk Anda.</p>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-value">{{ $books->count() }}</div>
                            <div class="stat-label">Total Buku</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">{{ $categories->count() }}</div>
                            <div class="stat-label">Kategori</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">{{ $books->take(12)->count() }}</div>
                            <div class="stat-label">Buku Terbaru</div>
                        </div>
                    </div>

                    <!-- Search and Filter Section -->
                    <div class="search-filter-section">
                        <form method="GET" action="{{ route('user.dashboard') }}" class="search-filter-form">
                            <div class="search-input-group">
                                <div class="search-icon"><i class="fas fa-search"></i></div>
                                <input
                                    type="text"
                                    name="search"
                                    class="search-input"
                                    placeholder="Cari buku berdasarkan judul, pengarang, atau ISBN..."
                                    value="{{ request('search') }}"
                                >
                            </div>

                            <div class="filter-group">
                                <select name="kategori" class="filter-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id_kategori }}"
                                                {{ request('kategori') == $category->id_kategori ? 'selected' : '' }}>
                                            {{ $category->Nama_Kategori }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="sort" class="filter-select">
                                    <option value="">Urutkan</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>A-Z</option>
                                </select>

                                <button type="submit" class="search-btn">
                                    <span>Cari</span>
                                </button>

                                @if(request('search') || request('kategori') || request('sort'))
                                    <a href="{{ route('user.dashboard') }}" class="reset-btn">
                                        Reset
                                    </a>
                                @endif
                            </div>
                        </form>

                        @if(request('search') || request('kategori'))
                            <div class="search-results-info">
                                @if(request('search') && request('kategori'))
                                    Menampilkan hasil untuk "{{ request('search') }}" dalam kategori "{{ $categories->find(request('kategori'))->Nama_Kategori ?? 'Tidak Ditemukan' }}"
                                @elseif(request('search'))
                                    Menampilkan hasil pencarian untuk "{{ request('search') }}"
                                @elseif(request('kategori'))
                                    Menampilkan buku kategori "{{ $categories->find(request('kategori'))->Nama_Kategori ?? 'Tidak Ditemukan' }}"
                                @endif
                                - Ditemukan {{ $filteredBooks->count() ?? $books->count() }} buku
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Books Section -->
    <section class="books-section" id="books">
        <div class="container">
            <div class="section-header">
                @if(request('search') || request('kategori'))
                    <h2 class="section-title">Hasil Pencarian</h2>
                @else
                    <h2 class="section-title">Buku Terbaru</h2>
                @endif
                <a href="#" class="view-all">Lihat Semua</a>
            </div>

            <div class="books-grid">
                @forelse((isset($filteredBooks) ? $filteredBooks : $books)->take(12) as $book)
                <div class="book-card">
                    <div class="book-cover">
                        @if($book->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($book->Cover))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($book->Cover) }}" alt="{{ $book->Judul }}">
                        @else
                            <div class="no-cover">{{ $book->Judul }}</div>
                        @endif
                    </div>
                    <div class="book-info">
                        <h3 class="book-title">{{ $book->Judul }}</h3>
                        <div class="book-meta">
                            <span class="book-author">{{ $book->Pengarang }}</span>
                            <span class="book-category">{{ $book->kategori->Nama_Kategori ?? 'Tidak ada kategori' }}</span>
                            <span class="book-stock" style="color: {{ $book->Stok > 0 ? ($book->Stok <= 5 ? '#dc2626' : '#16a34a') : '#dc2626' }}; font-weight: 600; font-size: 12px;">
                                @if($book->Stok > 0)
                                    Stok: {{ $book->Stok }} {{ $book->Stok <= 5 ? '(Terbatas)' : '' }}
                                @else
                                    Habis Stok
                                @endif
                            </span>
                        </div>
                        <div class="book-actions">
                            @if($book->Stok > 0)
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn btn-cart">Tambah ke Keranjang</button>
                                </form>
                                <form action="{{ route('cart.buyNow') }}" method="POST" style="margin-top: 8px;">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn-buy">Beli Sekarang - Rp {{ number_format($book->Harga, 0, ',', '.') }}</button>
                                </form>
                            @else
                                <button class="btn btn-cart" disabled style="opacity: 0.5; cursor: not-allowed;">Stok Habis</button>
                                <button class="btn-buy" disabled style="opacity: 0.5; cursor: not-allowed;">Stok Habis</button>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <div class="empty-state-icon">📚</div>
                    <h3>Belum ada buku tersedia</h3>
                    <p>Silakan cek kembali nanti.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Category Section -->
    @if($categories->isNotEmpty())
    @foreach($categories->take(3) as $category)
    @if($category->buku->isNotEmpty())
    <section class="category-section" id="categories">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Kategori {{ $category->Nama_Kategori }}</h2>
                <a href="#" class="view-all">Lihat Semua</a>
            </div>

            <div class="books-grid">
                @foreach($category->buku->take(4) as $book)
                <div class="book-card">
                    <div class="book-cover">
                        @if($book->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($book->Cover))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($book->Cover) }}" alt="{{ $book->Judul }}">
                        @else
                            <div class="no-cover">{{ $book->Judul }}</div>
                        @endif
                    </div>
                    <div class="book-info">
                        <h3 class="book-title">{{ $book->Judul }}</h3>
                        <div class="book-meta">
                            <span class="book-author">{{ $book->Pengarang }}</span>
                            <span class="book-category">{{ $category->Nama_Kategori }}</span>
                            <span class="book-stock" style="color: {{ $book->Stok > 0 ? ($book->Stok <= 5 ? '#dc2626' : '#16a34a') : '#dc2626' }}; font-weight: 600; font-size: 12px;">
                                @if($book->Stok > 0)
                                    Stok: {{ $book->Stok }} {{ $book->Stok <= 5 ? '(Terbatas)' : '' }}
                                @else
                                    Habis Stok
                                @endif
                            </span>
                        </div>
                        <div class="book-actions">
                            @if($book->Stok > 0)
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn btn-cart">Tambah ke Keranjang</button>
                                </form>
                                <form action="{{ route('cart.buyNow') }}" method="POST" style="margin-top: 8px;">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn-buy">Beli Sekarang - Rp {{ number_format($book->Harga, 0, ',', '.') }}</button>
                                </form>
                            @else
                                <button class="btn btn-cart" disabled style="opacity: 0.5; cursor: not-allowed;">Stok Habis</button>
                                <button class="btn-buy" disabled style="opacity: 0.5; cursor: not-allowed;">Stok Habis</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endforeach
    @endif

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>BookHaven</h3>
                    <p style="color: rgba(255, 255, 255, 0.7); font-size: 14px; line-height: 1.6;">Toko buku online terpercaya untuk semua kebutuhan membaca Anda.</p>
                </div>
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Kategori</h3>
                    <ul>
                        <li><a href="#">Fiksi</a></li>
                        <li><a href="#">Non-Fiksi</a></li>
                        <li><a href="#">Best Seller</a></li>
                        <li><a href="#">Rilis Baru</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li><a href="#">Email</a></li>
                        <li><a href="#">Telepon</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 BookHaven. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
