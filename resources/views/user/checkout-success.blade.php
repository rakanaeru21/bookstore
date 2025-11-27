<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - BookHaven</title>
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

        /* Main Content */
        .main-content {
            padding: 48px 0;
            min-height: 60vh;
        }

        .success-container {
            background: white;
            border-radius: 16px;
            padding: 48px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
            text-align: center;
            margin-bottom: 32px;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .success-icon i {
            font-size: 32px;
            color: white;
        }

        .success-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #1c1917;
            margin-bottom: 12px;
        }

        .success-subtitle {
            font-size: 16px;
            color: #78716c;
            margin-bottom: 32px;
        }

        .order-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .info-card {
            background: #fafaf9;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e7e5e4;
        }

        .info-label {
            font-size: 13px;
            color: #78716c;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .info-value {
            font-weight: 600;
            color: #1c1917;
            font-size: 14px;
        }

        /* Order Details */
        .order-details {
            background: white;
            border-radius: 16px;
            padding: 32px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
            margin-bottom: 32px;
        }

        .details-title {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #1c1917;
            margin-bottom: 24px;
            text-align: center;
        }

        .order-item {
            display: flex;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #f5f5f4;
            align-items: center;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 60px;
            height: 80px;
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
            font-size: 10px;
            text-align: center;
            font-weight: 600;
        }

        .item-info {
            flex: 1;
        }

        .item-title {
            font-weight: 600;
            color: #1c1917;
            margin-bottom: 4px;
        }

        .item-meta {
            font-size: 14px;
            color: #78716c;
        }

        .item-price {
            font-weight: 600;
            color: #78350f;
            text-align: right;
        }

        .total-summary {
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px solid #e7e5e4;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            font-weight: 700;
            font-size: 18px;
            color: #78350f;
            margin-top: 12px;
        }

        .actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .success-container {
                padding: 32px 24px;
            }

            .order-details {
                padding: 24px;
            }

            .order-info {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
                align-items: center;
            }

            .success-title {
                font-size: 24px;
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
            <!-- Success Message -->
            <div class="success-container">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>

                <h1 class="success-title">Pesanan Berhasil Dibuat!</h1>
                <p class="success-subtitle">
                    Terima kasih telah berbelanja di BookHaven. Pesanan Anda sedang diproses.
                </p>

                <!-- Order Info -->
                <div class="order-info">
                    <div class="info-card">
                        <div class="info-label">Nomor Pesanan</div>
                        <div class="info-value">#{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}</div>
                    </div>

                    <div class="info-card">
                        <div class="info-label">Tanggal Pesanan</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($transaksi->Tanggal_Transaksi)->format('d M Y, H:i') }}</div>
                    </div>

                    <div class="info-card">
                        <div class="info-label">Status</div>
                        <div class="info-value">{{ $transaksi->Status }}</div>
                    </div>

                    <div class="info-card">
                        <div class="info-label">Metode Pembayaran</div>
                        <div class="info-value">
                            @if($transaksi->metode_pembayaran == 'transfer')
                                Transfer Bank
                            @else
                                Cash on Delivery
                            @endif
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-label">Ekspedisi</div>
                        <div class="info-value">{{ $transaksi->Ekspedisi }}</div>
                    </div>
                </div>

                @if($transaksi->Bukti_Pembayaran)
                    <div style="background: #f0fdf4; border: 1px solid #22c55e; padding: 16px; border-radius: 8px; margin: 24px 0; text-align: left;">
                        <h4 style="color: #15803d; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-check-circle"></i>
                            Bukti Pembayaran Telah Diupload
                        </h4>
                        <p style="color: #15803d; font-size: 14px; margin-bottom: 12px;">
                            Bukti pembayaran Anda telah berhasil diupload dan sedang dalam proses verifikasi.
                        </p>
                        <img src="{{ asset('storage/' . $transaksi->Bukti_Pembayaran) }}"
                             alt="Bukti Pembayaran"
                             style="max-width: 300px; max-height: 400px; border-radius: 8px; border: 1px solid #d1d5db;">
                    </div>
                @endif

                @if($transaksi->metode_pembayaran == 'transfer')
                    <div style="background: #fef3c7; padding: 16px; border-radius: 8px; margin: 24px 0; text-align: left;">
                        <h4 style="color: #92400e; margin-bottom: 8px;">Instruksi Pembayaran:</h4>
                        <p style="color: #92400e; font-size: 14px;">
                            Silakan transfer ke:<br>
                            <strong>Bank BCA: 1234567890</strong><br>
                            <strong>Atas Nama: BookHaven Store</strong><br>
                            <strong>Jumlah: Rp {{ number_format($transaksi->Total_harga, 0, ',', '.') }}</strong>
                        </p>
                    </div>
                @endif
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h2 class="details-title">Detail Pesanan</h2>

                @foreach($details as $detail)
                    <div class="order-item">
                        <div class="item-image">
                            @if(!empty($detail->Cover) && \Illuminate\Support\Facades\Storage::disk('public')->exists($detail->Cover))
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($detail->Cover) }}" alt="{{ $detail->Judul }}">
                            @else
                                <div class="no-image">{{ substr($detail->Judul, 0, 10) }}</div>
                            @endif
                        </div>

                        <div class="item-info">
                            <div class="item-title">{{ $detail->Judul }}</div>
                            <div class="item-meta">
                                Qty: {{ $detail->kuantiti }} × Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}
                            </div>
                        </div>

                        <div class="item-price">
                            Rp {{ number_format($detail->harga, 0, ',', '.') }}
                        </div>
                    </div>
                @endforeach

                <div class="total-summary">
                    @php
                        // Calculate subtotal (total items without shipping)
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

            <!-- Actions -->
            <div class="actions">
                <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                    <i class="fas fa-home" style="margin-right: 8px;"></i>
                    Kembali ke Dashboard
                </a>

                <button onclick="window.print()" class="btn btn-primary" style="background: #6b5d4f;">
                    <i class="fas fa-print" style="margin-right: 8px;"></i>
                    Cetak Pesanan
                </button>
            </div>
        </div>
    </main>
</body>
</html>
