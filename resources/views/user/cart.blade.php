<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BookHaven</title>
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
            max-width: 1200px;
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

        .btn-primary {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: transparent;
            color: #78350f;
            border: 1.5px solid #78350f;
        }

        .btn-secondary:hover {
            background: #78350f;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        /* Success/Error Messages */
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
            background: #d1fae5;
            border: 1px solid #6ee7b7;
            color: #065f46;
        }

        .alert-success::before {
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

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        .alert-error::before {
            content: "✗";
            width: 24px;
            height: 24px;
            background: #dc2626;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        /* Main Content */
        .main-content {
            padding: 48px 0;
            min-height: 60vh;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #1c1917;
            margin-bottom: 32px;
            text-align: center;
        }

        /* Cart Items */
        .cart-container {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 32px;
        }

        .cart-items {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
        }

        .cart-item {
            display: flex;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #f5f5f4;
            align-items: center;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 80px;
            height: 110px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
            background: #f5f5f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image {
            color: #78350f;
            font-size: 12px;
            text-align: center;
            font-weight: 600;
        }

        .item-details {
            flex: 1;
        }

        .item-title {
            font-weight: 600;
            font-size: 16px;
            color: #1c1917;
            margin-bottom: 8px;
        }

        .item-price {
            font-weight: 700;
            color: #78350f;
            font-size: 15px;
        }

        .item-controls {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 12px;
        }

        .qty-control {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .qty-label {
            font-size: 14px;
            font-weight: 500;
            color: #57534e;
        }

        .qty-input {
            width: 60px;
            padding: 6px 8px;
            border: 1px solid #d6d3d1;
            border-radius: 6px;
            text-align: center;
            font-weight: 500;
        }

        .btn-small {
            padding: 6px 12px;
            font-size: 12px;
            border-radius: 6px;
        }

        /* Cart Summary */
        .cart-summary {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
            height: fit-content;
            position: sticky;
            top: 120px;
        }

        .summary-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #1c1917;
            margin-bottom: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e7e5e4;
            font-weight: 700;
            font-size: 18px;
            color: #78350f;
        }

        .checkout-actions {
            margin-top: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Empty Cart */
        .empty-cart {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 16px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
        }

        .empty-cart-icon {
            font-size: 64px;
            margin-bottom: 16px;
            opacity: 0.3;
        }

        .empty-cart h3 {
            font-size: 20px;
            color: #57534e;
            margin-bottom: 8px;
        }

        .empty-cart p {
            color: #78716c;
            margin-bottom: 24px;
        }

        @media (max-width: 768px) {
            .cart-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
                gap: 16px;
            }

            .item-controls {
                justify-content: center;
                flex-wrap: wrap;
            }

            .page-title {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <a href="{{ auth()->check() ? route('user.dashboard') : '/' }}" class="logo">BookHaven</a>
                <ul class="nav-links">
                    <li><a href="{{ auth()->check() ? route('user.dashboard') : '/' }}">Beranda</a></li>
                    <li><a href="#books">Jelajahi Buku</a></li>
                    <li><a href="#categories">Kategori</a></li>
                </ul>
                <div class="nav-actions">
                    <a href="{{ auth()->check() ? route('user.dashboard') : '/' }}" class="btn btn-secondary">Kembali ke Dashboard</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h1 class="page-title">Keranjang Belanja</h1>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if(!empty($cart) && count($cart))
                <div class="cart-container">
                    <!-- Cart Items -->
                    <div class="cart-items">
                        @foreach($cart as $item)
                            <div class="cart-item">
                                <div class="item-image">
                                    @if(!empty($item['Cover']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($item['Cover']))
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item['Cover']) }}" alt="{{ $item['Judul'] }}">
                                    @else
                                        <div class="no-image">{{ substr($item['Judul'], 0, 20) }}{{ strlen($item['Judul']) > 20 ? '...' : '' }}</div>
                                    @endif
                                </div>

                                <div class="item-details">
                                    <h3 class="item-title">{{ $item['Judul'] }}</h3>
                                    <div class="item-price">Rp {{ number_format($item['Harga'], 0, ',', '.') }}</div>
                                    @if(isset($item['Stok']))
                                        <div style="font-size: 12px; color: #78716c; margin-top: 4px;">
                                            Stok tersedia: {{ $item['Stok'] }} item
                                        </div>
                                    @endif

                                    <div class="item-controls">
                                        <form action="{{ route('cart.update') }}" method="POST" style="display: inline-flex; align-items: center; gap: 8px;">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $item['id_buku'] }}">
                                            <span class="qty-label">Qty:</span>
                                            <input type="number"
                                                   name="qty"
                                                   value="{{ $item['qty'] }}"
                                                   min="1"
                                                   max="{{ isset($item['Stok']) ? $item['Stok'] : 99 }}"
                                                   class="qty-input">
                                            <button type="submit" class="btn btn-secondary btn-small">Update</button>
                                        </form>

                                        <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $item['id_buku'] }}">
                                            <button type="submit" class="btn btn-danger btn-small" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <h3 class="summary-title">Ringkasan Pesanan</h3>

                        @php
                            $totalItems = 0;
                            $totalPrice = 0;
                            foreach($cart as $item) {
                                $totalItems += $item['qty'];
                                $totalPrice += $item['Harga'] * $item['qty'];
                            }
                        @endphp

                        <div class="summary-row">
                            <span>Total Buku:</span>
                            <span>{{ $totalItems }} item{{ $totalItems > 1 ? 's' : '' }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Subtotal:</span>
                            <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Ongkir:</span>
                            <span>Gratis</span>
                        </div>

                        <div class="summary-total">
                            <span>Total:</span>
                            <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                        </div>

                        <div class="checkout-actions">
                            <a href="{{ route('checkout.show') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-bag" style="margin-right: 8px;"></i>
                                Proses Checkout
                            </a>
                            <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Lanjutkan Belanja</a>

                            <form action="{{ route('cart.clear') }}" method="POST" style="margin-top: 12px;">
                                @csrf
                                <button type="submit" class="btn btn-danger" style="width: 100%;" onclick="return confirm('Yakin ingin mengosongkan keranjang?')"><i class="fas fa-trash" style="margin-right: 8px;"></i>Kosongkan Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-cart">
                    <div class="empty-cart-icon"><i class="fas fa-shopping-cart" style="font-size: 64px; opacity: 0.3;"></i></div>
                    <h3>Keranjang Belanja Kosong</h3>
                    <p>Belum ada buku yang ditambahkan ke keranjang.</p>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Mulai Belanja</a>
                </div>
            @endif
        </div>
    </main>
</body>
</html>
