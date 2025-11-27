<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS - BookHaven</title>
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
            max-width: 1000px;
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

        /* Main Content */
        .main-content {
            padding: 48px 0;
            min-height: 60vh;
        }

        .payment-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 32px;
            margin-top: 24px;
        }

        .payment-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
            text-align: center;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #1c1917;
            margin-bottom: 32px;
            text-align: center;
        }

        .payment-title {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #78350f;
            margin-bottom: 20px;
        }

        .payment-info {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            text-align: left;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .info-row:last-child {
            margin-bottom: 0;
            font-weight: 700;
            color: #78350f;
            font-size: 16px;
            border-top: 1px solid #e2e8f0;
            padding-top: 12px;
        }

        .qris-container {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 24px;
        }

        .qris-image {
            width: 300px;
            height: 300px;
            margin: 0 auto;
            border: 2px solid #e7e5e4;
            border-radius: 12px;
            overflow: hidden;
            background: #f5f5f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qris-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .payment-instructions {
            background: #fffbeb;
            border: 1px solid #fbbf24;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .instructions-title {
            font-weight: 600;
            color: #92400e;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .instructions-list {
            list-style: none;
            color: #78350f;
        }

        .instructions-list li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
        }

        .instructions-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #16a34a;
            font-weight: bold;
        }

        .timer-container {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 24px;
            text-align: center;
        }

        .timer {
            font-size: 24px;
            font-weight: 700;
            color: #dc2626;
            margin-bottom: 8px;
        }

        .timer-text {
            font-size: 14px;
            color: #991b1b;
        }

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

        .action-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-top: 24px;
        }

        @media (max-width: 768px) {
            .payment-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .qris-image {
                width: 250px;
                height: 250px;
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
                <div></div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h1 class="page-title">Pembayaran QRIS</h1>

            <div class="payment-container">
                <!-- Payment Card -->
                <div class="payment-card">
                    <h2 class="payment-title">Scan QR Code untuk Pembayaran</h2>

                    <!-- Payment Info -->
                    <div class="payment-info">
                        <div class="info-row">
                            <span>Nomor Pesanan:</span>
                            <span><strong>#{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}</strong></span>
                        </div>
                        <div class="info-row">
                            <span>Ekspedisi:</span>
                            <span>{{ $transaksi->Ekspedisi }}</span>
                        </div>
                        <div class="info-row">
                            <span>Metode:</span>
                            <span>
                                @if($transaksi->metode_pembayaran == 'transfer')
                                    Transfer Bank
                                @else
                                    Cash on Delivery
                                @endif
                            </span>
                        </div>
                        <div class="info-row">
                            <span>Total Pembayaran:</span>
                            <span>Rp {{ number_format($transaksi->Total_harga, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Timer -->
                    <div class="timer-container">
                        <div class="timer" id="countdown">15:00</div>
                        <div class="timer-text">Waktu pembayaran tersisa</div>
                    </div>

                    <!-- QRIS Image -->
                    <div class="qris-container">
                        <div class="qris-image">
                            @php
                                $qrisPath = storage_path('app/public/img/Tipe-QRIS-statis-small-large.jpg');
                            @endphp

                            @if(file_exists($qrisPath))
                                <img src="{{ asset('storage/img/Tipe-QRIS-statis-small-large.jpg') }}" alt="QR Code Pembayaran" />
                            @else
                                <div style="color: #78350f; text-align: center;">
                                    <i class="fas fa-qrcode" style="font-size: 48px; margin-bottom: 12px; display: block;"></i>
                                    QR Code Pembayaran
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="payment-instructions">
                        <div class="instructions-title">
                            <i class="fas fa-info-circle"></i>
                            Cara Pembayaran:
                        </div>
                        <ul class="instructions-list">
                            <li>Buka aplikasi e-wallet atau mobile banking Anda</li>
                            <li>Pilih menu "Scan QR" atau "QRIS"</li>
                            <li>Arahkan kamera ke QR code di atas</li>
                            <li>Periksa detail pembayaran dan konfirmasi</li>
                            <li>Simpan bukti pembayaran untuk referensi</li>
                        </ul>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <a href="{{ route('payment.upload', $transaksi->id_transaksi) }}" class="btn btn-primary">
                            <i class="fas fa-arrow-right" style="margin-right: 8px;"></i>
                            Lanjutkan
                        </a>
                        <a href="{{ route('checkout.show') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                            Kembali
                        </a>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h3 class="summary-title">Ringkasan Pesanan</h3>

                    <!-- Order Items -->
                    @foreach($details as $detail)
                        <div class="order-item">
                            <div class="item-image-small">
                                @if(!empty($detail->Cover) && \Illuminate\Support\Facades\Storage::disk('public')->exists($detail->Cover))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($detail->Cover) }}" alt="{{ $detail->Judul }}">
                                @else
                                    <div class="no-image-small">{{ substr($detail->Judul, 0, 10) }}</div>
                                @endif
                            </div>

                            <div class="item-info">
                                <div class="item-name">{{ $detail->Judul }}</div>
                                <div class="item-qty">Qty: {{ $detail->kuantiti }}</div>
                            </div>

                            <div class="item-price">
                                Rp {{ number_format($detail->harga, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach

                    <!-- Summary Totals -->
                    @php
                        $subtotal = 0;
                        foreach($details as $detail) {
                            $subtotal += $detail->harga;
                        }
                        $shippingCost = $transaksi->Total_harga - $subtotal;
                    @endphp

                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>

                    <div class="summary-row">
                        <span>Ongkir:</span>
                        <span>Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                    </div>

                    <div class="summary-total">
                        <span>Total:</span>
                        <span>Rp {{ number_format($transaksi->Total_harga, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Countdown timer
        let timeLeft = 15 * 60; // 15 minutes in seconds

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;

            const display = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            document.getElementById('countdown').textContent = display;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                alert('Waktu pembayaran habis! Silakan buat pesanan baru.');
                window.location.href = '{{ route('checkout.show') }}';
                return;
            }

            timeLeft--;
        }

        // Update timer every second
        const timerInterval = setInterval(updateTimer, 1000);
        updateTimer(); // Initial call

        // Auto refresh page every 30 seconds to check payment status
        setInterval(function() {
            // You can add AJAX call here to check payment status
            console.log('Checking payment status...');
        }, 30000);
    </script>
</body>
</html>
