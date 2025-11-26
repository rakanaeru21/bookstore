<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $buku->Judul }} - BookHaven</title>
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

        .book-detail {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e8dcc8;
        }

        .book-header {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 40px;
            padding: 40px;
        }

        .book-cover {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, #f8f9fa, #e8dcc8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b5d4f;
            font-size: 64px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .book-info {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .book-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #2c2416;
            margin-bottom: 12px;
            line-height: 1.2;
        }

        .book-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        .meta-item {
            display: flex;
            flex-direction: column;
        }

        .meta-label {
            font-weight: 600;
            color: #6b5d4f;
            font-size: 14px;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .meta-value {
            color: #2c2416;
            font-size: 16px;
            font-weight: 500;
        }

        .book-price {
            font-size: 32px;
            font-weight: 700;
            color: #8b4513;
            margin-bottom: 16px;
        }

        .book-stock {
            font-size: 18px;
            padding: 12px 20px;
            border-radius: 25px;
            display: inline-block;
            margin-bottom: 24px;
            font-weight: 600;
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
            gap: 12px;
            flex-wrap: wrap;
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

        .book-description {
            padding: 40px;
            border-top: 1px solid #e8dcc8;
        }

        .description-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 16px;
        }

        .description-text {
            font-size: 16px;
            line-height: 1.8;
            color: #2c2416;
        }

        .book-details {
            padding: 40px;
            border-top: 1px solid #e8dcc8;
            background: #f8f9fa;
        }

        .details-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 24px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .detail-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
        }

        .detail-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            margin-bottom: 16px;
        }

        .detail-label {
            font-weight: 600;
            color: #6b5d4f;
            font-size: 14px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            color: #2c2416;
            font-size: 18px;
            font-weight: 500;
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

        @media (max-width: 768px) {
            .container {
                padding: 16px;
            }

            .book-header {
                grid-template-columns: 1fr;
                gap: 24px;
                padding: 24px;
                text-align: center;
            }

            .book-cover {
                height: 300px;
                margin: 0 auto;
                max-width: 250px;
            }

            .book-meta {
                grid-template-columns: 1fr;
            }

            .book-actions {
                justify-content: center;
            }

            .book-description, .book-details {
                padding: 24px;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .book-title {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('admin.buku.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Buku
        </a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="book-detail">
            <div class="book-header">
                <div class="book-cover">
                    @if($buku->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($buku->Cover))
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($buku->Cover) }}" alt="{{ $buku->Judul }}">
                    @else
                        <i class="fas fa-book"></i>
                    @endif
                </div>

                <div class="book-info">
                    <div>
                        <h1 class="book-title">{{ $buku->Judul }}</h1>

                        <div class="book-meta">
                            <div class="meta-item">
                                <span class="meta-label">Pengarang</span>
                                <span class="meta-value">{{ $buku->Pengarang }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Kategori</span>
                                <span class="meta-value">{{ $buku->kategori->Nama_Kategori ?? 'Tidak ada kategori' }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Penerbit</span>
                                <span class="meta-value">{{ $buku->Penerbit }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="meta-label">Tahun Terbit</span>
                                <span class="meta-value">{{ $buku->Tahun_Terbit }}</span>
                            </div>
                        </div>

                        <div class="book-price">{{ $buku->formatted_harga }}</div>

                        <div class="book-stock {{ $buku->Stok == 0 ? 'stock-empty' : ($buku->Stok < 10 ? 'stock-low' : 'stock-available') }}">
                            Stok: {{ $buku->Stok }}
                            @if($buku->Stok == 0)
                                (Habis)
                            @elseif($buku->Stok < 10)
                                (Sedikit)
                            @else
                                (Tersedia)
                            @endif
                        </div>
                    </div>

                    <div class="book-actions">
                        <a href="{{ route('admin.buku.edit', $buku->id_buku) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                            Edit Buku
                        </a>
                        <a href="{{ route('admin.buku.index') }}" class="btn btn-secondary">
                            <i class="fas fa-list"></i>
                            Daftar Buku
                        </a>
                        <form method="POST" action="{{ route('admin.buku.destroy', $buku->id_buku) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="book-description">
                <h2 class="description-title">Sinopsis</h2>
                <p class="description-text">{{ $buku->Sinopsis }}</p>
            </div>

            <div class="book-details">
                <h2 class="details-title">Detail Buku</h2>
                <div class="details-grid">
                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-barcode"></i>
                        </div>
                        <div class="detail-label">ISBN</div>
                        <div class="detail-value">{{ $buku->ISBN }}</div>
                    </div>

                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="detail-label">Penerbit</div>
                        <div class="detail-value">{{ $buku->Penerbit }}</div>
                    </div>

                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div class="detail-label">Tahun Terbit</div>
                        <div class="detail-value">{{ $buku->Tahun_Terbit }}</div>
                    </div>

                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="detail-label">Stok Tersedia</div>
                        <div class="detail-value">{{ $buku->Stok }} unit</div>
                    </div>

                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="detail-label">Ditambahkan</div>
                        <div class="detail-value">{{ $buku->created_at->format('d M Y, H:i') }}</div>
                    </div>

                    <div class="detail-card">
                        <div class="detail-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="detail-label">Terakhir Diubah</div>
                        <div class="detail-value">{{ $buku->updated_at->format('d M Y, H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
