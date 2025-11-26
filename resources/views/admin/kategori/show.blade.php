<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kategori->Nama_Kategori }} - BookHaven</title>
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
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
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

        .category-detail {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e8dcc8;
            margin-bottom: 32px;
        }

        .category-header {
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .category-icon {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 20px;
        }

        .category-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 12px;
        }

        .category-subtitle {
            font-size: 16px;
            opacity: 0.9;
        }

        .category-info {
            padding: 40px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .info-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            border: 1px solid #e8dcc8;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            margin: 0 auto 12px;
        }

        .info-label {
            font-weight: 600;
            color: #6b5d4f;
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #2c2416;
            font-size: 16px;
            font-weight: 500;
        }

        .category-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            padding: 24px;
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

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .books-section {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
        }

        .books-header {
            padding: 32px 32px 0 32px;
            border-bottom: 1px solid #e8dcc8;
            margin-bottom: 24px;
        }

        .books-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .books-subtitle {
            color: #6b5d4f;
            margin-bottom: 24px;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 0 32px 32px 32px;
        }

        .book-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid #e8dcc8;
            transition: all 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .book-title {
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

        .book-price {
            font-weight: 600;
            color: #8b4513;
            margin-top: 8px;
        }

        .no-books {
            text-align: center;
            padding: 60px 32px;
            color: #6b5d4f;
        }

        .no-books i {
            font-size: 48px;
            margin-bottom: 16px;
            color: #8b4513;
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

        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
            padding: 0 32px 32px 32px;
        }

        .pagination a, .pagination span {
            padding: 8px 12px;
            border: 1px solid #e8dcc8;
            text-decoration: none;
            color: #2c2416;
            border-radius: 6px;
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

        @media (max-width: 768px) {
            .container {
                padding: 16px;
            }

            .category-header {
                padding: 24px;
            }

            .category-title {
                font-size: 28px;
            }

            .category-info {
                padding: 24px;
            }

            .category-actions {
                flex-direction: column;
                align-items: center;
            }

            .books-grid {
                grid-template-columns: 1fr;
                padding: 0 16px 24px 16px;
            }

            .books-header {
                padding: 24px 16px 0 16px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('admin.kategori.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Kategori
        </a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="category-detail">
            <div class="category-header">
                <div class="category-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h1 class="category-title">{{ $kategori->Nama_Kategori }}</h1>
                <p class="category-subtitle">Detail kategori buku</p>
            </div>

            <div class="category-info">
                <div class="info-grid">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="info-label">Total Buku</div>
                        <div class="info-value">{{ $kategori->buku_count }} Buku</div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <div class="info-label">Dibuat</div>
                        <div class="info-value">{{ $kategori->created_at->format('d M Y, H:i') }}</div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="info-label">Terakhir Diubah</div>
                        <div class="info-value">{{ $kategori->updated_at->format('d M Y, H:i') }}</div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-hashtag"></i>
                        </div>
                        <div class="info-label">ID Kategori</div>
                        <div class="info-value">#{{ $kategori->id_kategori }}</div>
                    </div>
                </div>
            </div>

            <div class="category-actions">
                <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    Edit Kategori
                </a>
                <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                    <i class="fas fa-list"></i>
                    Daftar Kategori
                </a>
                <form method="POST" action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Kategori yang memiliki buku tidak dapat dihapus.')">
                        <i class="fas fa-trash"></i>
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="books-section">
            <div class="books-header">
                <h2 class="books-title">Buku dalam Kategori "{{ $kategori->Nama_Kategori }}"</h2>
                <p class="books-subtitle">Daftar semua buku yang termasuk dalam kategori ini</p>
            </div>

            @if($books->count() > 0)
                <div class="books-grid">
                    @foreach($books as $book)
                        <div class="book-card">
                            <h4 class="book-title">{{ $book->Judul }}</h4>
                            <div class="book-meta">
                                <strong>Pengarang:</strong> {{ $book->Pengarang }}
                            </div>
                            <div class="book-meta">
                                <strong>Penerbit:</strong> {{ $book->Penerbit }} ({{ $book->Tahun_Terbit }})
                            </div>
                            <div class="book-meta">
                                <strong>Stok:</strong> {{ $book->Stok }}
                            </div>
                            <div class="book-price">{{ $book->formatted_harga }}</div>
                        </div>
                    @endforeach
                </div>

                @if ($books->hasPages())
                    <nav class="pagination" role="navigation" aria-label="Pagination">
                        @if ($books->onFirstPage())
                            <span class="disabled" aria-disabled="true">&laquo; Sebelumnya</span>
                        @else
                            <a href="{{ $books->previousPageUrl() }}" rel="prev">&laquo; Sebelumnya</a>
                        @endif

                        @foreach (range(1, $books->lastPage()) as $page)
                            @if ($page == $books->currentPage())
                                <span class="current">{{ $page }}</span>
                            @else
                                <a href="{{ $books->url($page) }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($books->hasMorePages())
                            <a href="{{ $books->nextPageUrl() }}" rel="next">Selanjutnya &raquo;</a>
                        @else
                            <span class="disabled" aria-disabled="true">Selanjutnya &raquo;</span>
                        @endif
                    </nav>
                @endif
            @else
                <div class="no-books">
                    <i class="fas fa-book-open"></i>
                    <h3>Belum ada buku</h3>
                    <p>Belum ada buku yang dikategorikan dalam "{{ $kategori->Nama_Kategori }}".</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
