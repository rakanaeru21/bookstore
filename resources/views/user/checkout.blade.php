<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - BookHaven</title>
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
            display: inline-flex;
            align-items: center;
            justify-content: center;
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

        .checkout-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 32px;
        }

        .checkout-form {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
        }

        .form-section {
            margin-bottom: 32px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #1c1917;
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e7e5e4;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #1c1917;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e7e5e4;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
            font-family: 'Instrument Sans', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #78350f;
        }

        .form-textarea {
            min-height: 80px;
            resize: vertical;
        }

        .form-select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e7e5e4;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        .form-select:focus {
            outline: none;
            border-color: #78350f;
        }

        .radio-group {
            display: flex;
            gap: 16px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            border: 2px solid #e7e5e4;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            flex: 1;
        }

        .radio-item:hover {
            border-color: #78350f;
        }

        .radio-item.selected {
            border-color: #78350f;
            background: #fffbeb;
        }

        .radio-item input[type="radio"] {
            margin: 0;
        }

        .radio-label {
            font-weight: 500;
            font-size: 14px;
        }

        /* Order Summary */
        .order-summary {
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

        .order-item {
            display: flex;
            gap: 12px;
            padding: 12px 0;
            border-bottom: 1px solid #f5f5f4;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image-small {
            width: 50px;
            height: 70px;
            border-radius: 6px;
            overflow: hidden;
            flex-shrink: 0;
            background: #f5f5f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item-image-small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image-small {
            color: #78350f;
            font-size: 10px;
            text-align: center;
            font-weight: 600;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            font-size: 14px;
            color: #1c1917;
            margin-bottom: 4px;
        }

        .item-qty {
            font-size: 12px;
            color: #78716c;
        }

        .item-price {
            font-weight: 600;
            color: #78350f;
            font-size: 14px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 12px 0;
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

        .checkout-button {
            margin-top: 24px;
            width: 100%;
        }

        @media (max-width: 768px) {
            .checkout-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .radio-group {
                flex-direction: column;
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
                <a href="{{ route('user.dashboard') }}" class="logo">BookHaven</a>
                <ul class="nav-links">
                    <li><a href="{{ route('user.dashboard') }}">Beranda</a></li>
                    <li><a href="#books">Jelajahi Buku</a></li>
                    <li><a href="#categories">Kategori</a></li>
                </ul>
                <div class="nav-actions">
                    <a href="{{ route('cart.show') }}" class="btn btn-secondary">Kembali ke Keranjang</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h1 class="page-title">Checkout</h1>

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="checkout-container">
                <!-- Checkout Form -->
                <div class="checkout-form">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf

                        <!-- Informasi Pengiriman -->
                        <div class="form-section">
                            <h3 class="section-title">Informasi Pengiriman</h3>

                            <div class="form-group">
                                <label class="form-label" for="alamat_pengiriman">Alamat Lengkap</label>
                                <textarea
                                    class="form-input form-textarea"
                                    id="alamat_pengiriman"
                                    name="alamat_pengiriman"
                                    placeholder="Masukkan alamat lengkap untuk pengiriman..."
                                    required>{{ old('alamat_pengiriman') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                                <input
                                    type="tel"
                                    class="form-input"
                                    id="nomor_telepon"
                                    name="nomor_telepon"
                                    placeholder="08xxxxxxxxxx"
                                    value="{{ old('nomor_telepon') }}"
                                    required>
                            </div>
                        </div>

                        <!-- Ekspedisi -->
                        <div class="form-section">
                            <h3 class="section-title">Ekspedisi</h3>

                            <div class="radio-group">
                                <div class="radio-item {{ old('ekspedisi', 'reguler') == 'reguler' ? 'selected' : '' }}">
                                    <input type="radio" id="reguler" name="ekspedisi" value="reguler" data-price="8000"
                                           {{ old('ekspedisi', 'reguler') == 'reguler' ? 'checked' : '' }}>
                                    <label class="radio-label" for="reguler">
                                        <div>
                                            <i class="fas fa-truck" style="margin-right: 8px;"></i>
                                            Reguler
                                            <div style="font-size: 12px; color: #78716c; font-weight: 400;">Rp 8.000 (3-5 hari kerja)</div>
                                        </div>
                                    </label>
                                </div>

                                <div class="radio-item {{ old('ekspedisi') == 'instant' ? 'selected' : '' }}">
                                    <input type="radio" id="instant" name="ekspedisi" value="instant" data-price="20000"
                                           {{ old('ekspedisi') == 'instant' ? 'checked' : '' }}>
                                    <label class="radio-label" for="instant">
                                        <div>
                                            <i class="fas fa-shipping-fast" style="margin-right: 8px;"></i>
                                            Instant
                                            <div style="font-size: 12px; color: #78716c; font-weight: 400;">Rp 20.000 (1-2 hari kerja)</div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="form-section">
                            <h3 class="section-title">Metode Pembayaran</h3>

                            <div class="radio-group">
                                <div class="radio-item {{ old('metode_pembayaran', 'transfer') == 'transfer' ? 'selected' : '' }}">
                                    <input type="radio" id="transfer" name="metode_pembayaran" value="transfer"
                                           {{ old('metode_pembayaran', 'transfer') == 'transfer' ? 'checked' : '' }}>
                                    <label class="radio-label" for="transfer">
                                        <i class="fas fa-university" style="margin-right: 8px;"></i>
                                        Transfer Bank
                                    </label>
                                </div>

                                <div class="radio-item {{ old('metode_pembayaran') == 'cod' ? 'selected' : '' }}">
                                    <input type="radio" id="cod" name="metode_pembayaran" value="cod"
                                           {{ old('metode_pembayaran') == 'cod' ? 'checked' : '' }}>
                                    <label class="radio-label" for="cod">
                                        <i class="fas fa-money-bill-wave" style="margin-right: 8px;"></i>
                                        Cash on Delivery
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="form-section">
                            <h3 class="section-title">Catatan Pesanan (Opsional)</h3>

                            <div class="form-group">
                                <textarea
                                    class="form-input form-textarea"
                                    id="catatan"
                                    name="catatan"
                                    placeholder="Catatan khusus untuk pesanan Anda...">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary checkout-button">
                            <i class="fas fa-arrow-right" style="margin-right: 8px;"></i>
                            Lanjutkan Pembayaran
                        </button>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h3 class="summary-title">Ringkasan Pesanan</h3>

                    <!-- Order Items -->
                    @foreach($cart as $item)
                        <div class="order-item">
                            <div class="item-image-small">
                                @if(!empty($item['Cover']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($item['Cover']))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($item['Cover']) }}" alt="{{ $item['Judul'] }}">
                                @else
                                    <div class="no-image-small">{{ substr($item['Judul'], 0, 10) }}</div>
                                @endif
                            </div>

                            <div class="item-info">
                                <div class="item-name">{{ $item['Judul'] }}</div>
                                <div class="item-qty">Qty: {{ $item['qty'] }}</div>
                            </div>

                            <div class="item-price">
                                Rp {{ number_format($item['Harga'] * $item['qty'], 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach

                    <!-- Summary Totals -->
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
                        <span id="shipping-cost">Rp 8.000</span>
                    </div>

                    <div class="summary-total">
                        <span>Total:</span>
                        <span id="total-price">Rp {{ number_format($totalPrice + 8000, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Store the original subtotal
        const subtotal = {{ $totalPrice }};

        // Handle radio button styling and update costs
        function updateShippingCost() {
            const selectedExpedisi = document.querySelector('input[name="ekspedisi"]:checked');
            if (!selectedExpedisi) return;

            const shippingCost = parseInt(selectedExpedisi.dataset.price);
            const newTotal = subtotal + shippingCost;

            // Update UI
            document.getElementById('shipping-cost').textContent = 'Rp ' + shippingCost.toLocaleString('id-ID');
            document.getElementById('total-price').textContent = 'Rp ' + newTotal.toLocaleString('id-ID');
        }

        // Handle payment method radio button styling
        document.querySelectorAll('input[name="metode_pembayaran"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Remove selected class from all payment radio items
                document.querySelectorAll('.radio-item').forEach(item => {
                    if (item.querySelector('input[name="metode_pembayaran"]')) {
                        item.classList.remove('selected');
                    }
                });

                // Add selected class to current item
                this.closest('.radio-item').classList.add('selected');
            });
        });

        // Handle expedisi radio button styling and cost update
        document.querySelectorAll('input[name="ekspedisi"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Remove selected class from all expedisi radio items
                document.querySelectorAll('.radio-item').forEach(item => {
                    if (item.querySelector('input[name="ekspedisi"]')) {
                        item.classList.remove('selected');
                    }
                });

                // Add selected class to current item
                this.closest('.radio-item').classList.add('selected');

                // Update shipping cost
                updateShippingCost();
            });
        });

        // Initialize the shipping cost on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateShippingCost();
        });
    </script>
</body>
</html>
