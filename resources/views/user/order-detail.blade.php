<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - BookHaven</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background: #faf9f7;
            color: #1c1917;
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(120, 53, 15, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 0;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #78350f;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
        }

        .back-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #78350f;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            padding: 10px 18px;
            background: rgba(120, 53, 15, 0.08);
            border-radius: 10px;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: rgba(120, 53, 15, 0.15);
        }

        /* Content */
        .content {
            padding: 40px 0;
        }

        /* Order Header Card */
        .order-header-card {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 24px;
            padding: 32px;
            color: white;
            margin-bottom: 24px;
        }

        .order-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .order-number {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .order-date {
            opacity: 0.8;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-badges {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
        }

        .status-badge {
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge-pending { background: #fef3c7; color: #d97706; }
        .badge-verified { background: #dbeafe; color: #2563eb; }
        .badge-processing { background: #e0e7ff; color: #4f46e5; }
        .badge-shipped { background: #cffafe; color: #0891b2; }
        .badge-delivered { background: #dcfce7; color: #16a34a; }
        .badge-cancelled { background: #fee2e2; color: #dc2626; }

        .badge-payment-pending { background: rgba(255,255,255,0.2); color: white; }
        .badge-payment-success { background: #dcfce7; color: #16a34a; }
        .badge-payment-failed { background: #fee2e2; color: #dc2626; }

        .order-header-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        .header-info-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 16px;
            border-radius: 12px;
        }

        .header-info-label {
            font-size: 12px;
            opacity: 0.8;
            margin-bottom: 4px;
        }

        .header-info-value {
            font-weight: 600;
            font-size: 15px;
        }

        /* Info Cards */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 24px;
        }

        .info-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid rgba(120, 53, 15, 0.1);
        }

        .info-card-title {
            font-weight: 700;
            font-size: 16px;
            color: #78350f;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-card-title i {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #e7e5e4;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-row-label {
            color: #78716c;
            font-size: 14px;
        }

        .info-row-value {
            font-weight: 600;
            color: #1c1917;
            font-size: 14px;
            text-align: right;
        }

        /* Items Card */
        .items-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid rgba(120, 53, 15, 0.1);
            margin-bottom: 24px;
        }

        .items-card-title {
            font-weight: 700;
            font-size: 18px;
            color: #78350f;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .items-card-title i {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .item-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .item-row {
            display: flex;
            gap: 16px;
            padding: 16px;
            background: #faf9f7;
            border-radius: 14px;
            align-items: center;
        }

        .item-cover {
            width: 70px;
            height: 90px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: #e7e5e4;
        }

        .item-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-cover .no-cover {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a8a29e;
            font-size: 28px;
        }

        .item-details {
            flex: 1;
            min-width: 0;
        }

        .item-title {
            font-weight: 700;
            font-size: 16px;
            color: #1c1917;
            margin-bottom: 6px;
        }

        .item-author {
            font-size: 13px;
            color: #78716c;
            margin-bottom: 4px;
        }

        .item-category {
            font-size: 12px;
            color: #92400e;
            background: #f5ebe0;
            padding: 4px 10px;
            border-radius: 50px;
            display: inline-block;
        }

        .item-pricing {
            text-align: right;
            flex-shrink: 0;
        }

        .item-qty {
            font-size: 13px;
            color: #78716c;
            margin-bottom: 4px;
        }

        .item-price {
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            font-weight: 700;
            color: #78350f;
        }

        /* Summary Card */
        .summary-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid rgba(120, 53, 15, 0.1);
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
        }

        .summary-row.total {
            border-top: 2px solid #e7e5e4;
            margin-top: 12px;
            padding-top: 16px;
        }

        .summary-label {
            color: #78716c;
            font-size: 15px;
        }

        .summary-value {
            font-weight: 600;
            color: #1c1917;
            font-size: 15px;
        }

        .summary-row.total .summary-label {
            font-weight: 700;
            color: #1c1917;
            font-size: 16px;
        }

        .summary-row.total .summary-value {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #78350f;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 16px;
            margin-top: 24px;
            justify-content: flex-end;
        }

        .btn {
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(120, 53, 15, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.3);
        }

        .btn-secondary {
            background: #f5f5f4;
            color: #57534e;
            border: 2px solid #e7e5e4;
        }

        .btn-secondary:hover {
            background: #e7e5e4;
        }

        /* Timeline */
        .timeline-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid rgba(120, 53, 15, 0.1);
            margin-bottom: 24px;
        }

        .timeline {
            position: relative;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 11px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e7e5e4;
        }

        .timeline-item {
            position: relative;
            padding-bottom: 20px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-dot {
            position: absolute;
            left: -30px;
            top: 0;
            width: 24px;
            height: 24px;
            background: #e7e5e4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #78716c;
        }

        .timeline-item.completed .timeline-dot {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: white;
        }

        .timeline-item.active .timeline-dot {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(120, 53, 15, 0.4); }
            50% { box-shadow: 0 0 0 8px rgba(120, 53, 15, 0); }
        }

        .timeline-content h4 {
            font-size: 14px;
            font-weight: 600;
            color: #1c1917;
            margin-bottom: 4px;
        }

        .timeline-content p {
            font-size: 12px;
            color: #78716c;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .order-header-top {
                flex-direction: column;
                gap: 16px;
            }

            .status-badges {
                align-items: flex-start;
                flex-direction: row;
                flex-wrap: wrap;
            }

            .order-number {
                font-size: 24px;
            }

            .item-row {
                flex-wrap: wrap;
            }

            .item-pricing {
                width: 100%;
                text-align: left;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 12px;
                padding-top: 12px;
                border-top: 1px dashed #e7e5e4;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
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
                <a href="{{ route('user.dashboard') }}" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    BookHaven
                </a>
                <a href="{{ route('user.orders') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </nav>
        </div>
    </header>

    <!-- Content -->
    <div class="content">
        <div class="container">
            @php
                $paymentStatus = $order->Status_Pembayaran ?? 'Menunggu';
                $orderStatus = $order->Status ?? 'Pending';
                $subtotal = $details->sum('harga');

                // Extract shipping cost from Ekspedisi
                preg_match('/Rp ([\d\.]+)/', $order->Ekspedisi ?? '', $matches);
                $shippingCost = isset($matches[1]) ? (int) str_replace('.', '', $matches[1]) : 0;
            @endphp

            <!-- Order Header Card -->
            <div class="order-header-card">
                <div class="order-header-top">
                    <div>
                        <div class="order-number">Order #{{ str_pad($order->id_transaksi, 6, '0', STR_PAD_LEFT) }}</div>
                        <div class="order-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d F Y, H:i') }} WIB
                        </div>
                    </div>
                    <div class="status-badges">
                        @if($paymentStatus == 'Menunggu')
                            <span class="status-badge badge-payment-pending"><i class="fas fa-hourglass-half"></i> Menunggu Pembayaran</span>
                        @elseif($paymentStatus == 'Menunggu Verifikasi')
                            <span class="status-badge badge-pending"><i class="fas fa-hourglass-half"></i> Menunggu Verifikasi</span>
                        @elseif($paymentStatus == 'Berhasil' || $paymentStatus == 'Verified')
                            <span class="status-badge badge-payment-success"><i class="fas fa-check-circle"></i> Pembayaran Lunas</span>
                        @else
                            <span class="status-badge badge-payment-failed"><i class="fas fa-times-circle"></i> Pembayaran Gagal</span>
                        @endif

                        @if($orderStatus == 'Pending')
                            <span class="status-badge badge-pending">Pending</span>
                        @elseif($orderStatus == 'Menunggu Konfirmasi')
                            <span class="status-badge badge-pending">Menunggu Konfirmasi</span>
                        @elseif($orderStatus == 'Diproses')
                            <span class="status-badge badge-processing">Diproses</span>
                        @elseif($orderStatus == 'Dikirim')
                            <span class="status-badge badge-shipped">Dikirim</span>
                        @elseif($orderStatus == 'Selesai')
                            <span class="status-badge badge-delivered">Selesai</span>
                        @elseif($orderStatus == 'Ditolak' || $orderStatus == 'Cancelled')
                            <span class="status-badge badge-cancelled">Dibatalkan</span>
                        @endif
                    </div>
                </div>
                <div class="order-header-info">
                    <div class="header-info-item">
                        <div class="header-info-label">Total Item</div>
                        <div class="header-info-value">{{ $details->sum('kuantiti') }} buku</div>
                    </div>
                    <div class="header-info-item">
                        <div class="header-info-label">Metode Bayar</div>
                        <div class="header-info-value">{{ strtoupper($order->metode_pembayaran ?? 'QRIS') }}</div>
                    </div>
                    <div class="header-info-item">
                        <div class="header-info-label">Ekspedisi</div>
                        <div class="header-info-value">{{ $order->Ekspedisi }}</div>
                    </div>
                    <div class="header-info-item">
                        <div class="header-info-label">Total Bayar</div>
                        <div class="header-info-value">Rp {{ number_format($order->Total_harga, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <!-- Info Grid -->
            <div class="info-grid">
                <!-- Shipping Info -->
                <div class="info-card">
                    <div class="info-card-title">
                        <i class="fas fa-truck"></i>
                        Informasi Pengiriman
                    </div>
                    <div class="info-row">
                        <span class="info-row-label">Penerima</span>
                        <span class="info-row-value">{{ $user->Nama_Lengkap }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-row-label">Telepon</span>
                        <span class="info-row-value">{{ $order->nomor_telepon ?? '-' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-row-label">Alamat</span>
                        <span class="info-row-value">{{ $order->alamat_pengiriman ?? '-' }}</span>
                    </div>
                    @if($order->no_resi ?? false)
                    <div class="info-row">
                        <span class="info-row-label">No. Resi</span>
                        <span class="info-row-value" style="color: #78350f;">{{ $order->no_resi }}</span>
                    </div>
                    @endif
                </div>

                <!-- Order Timeline -->
                <div class="info-card">
                    <div class="info-card-title">
                        <i class="fas fa-history"></i>
                        Status Pemesanan
                    </div>
                    <div class="timeline">
                        @php
                            // Check if payment is done (not waiting)
                            $paymentDone = !in_array($paymentStatus, ['Menunggu']);
                            // Check if shipped or delivered
                            $isShipped = in_array($orderStatus, ['Dikirim', 'Shipped', 'Selesai', 'Delivered']);
                            $isDelivered = in_array($orderStatus, ['Selesai', 'Delivered']);
                        @endphp
                        <div class="timeline-item {{ $paymentStatus == 'Menunggu' ? 'active' : 'completed' }}">
                            <div class="timeline-dot"><i class="fas fa-clock"></i></div>
                            <div class="timeline-content">
                                <h4>Menunggu</h4>
                                <p>{{ $paymentStatus == 'Menunggu' ? 'Menunggu pembayaran' : 'Selesai - ' . \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                        <div class="timeline-item {{ !$paymentDone ? '' : ($isShipped ? 'completed' : 'active') }}">
                            <div class="timeline-dot"><i class="fas fa-check-circle"></i></div>
                            <div class="timeline-content">
                                <h4>Pembayaran Berhasil</h4>
                                <p>{{ $paymentDone ? 'Pembayaran telah dikonfirmasi' : 'Menunggu konfirmasi pembayaran' }}</p>
                            </div>
                        </div>
                        <div class="timeline-item {{ $isShipped ? ($isDelivered ? 'completed' : 'active') : '' }}">
                            <div class="timeline-dot"><i class="fas fa-truck"></i></div>
                            <div class="timeline-content">
                                <h4>Dikirim</h4>
                                <p>{{ $isShipped ? ($isDelivered ? 'Pesanan telah diterima' : 'Pesanan sedang dalam pengiriman') : 'Menunggu pengiriman' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Card -->
            <div class="items-card">
                <div class="items-card-title">
                    <i class="fas fa-shopping-bag"></i>
                    Daftar Buku ({{ $details->count() }} item)
                </div>
                <div class="item-list">
                    @foreach($details as $item)
                        <div class="item-row">
                            <div class="item-cover">
                                @if($item->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($item->Cover))
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($item->Cover) }}" alt="{{ $item->Judul }}">
                                @else
                                    <div class="no-cover"><i class="fas fa-book"></i></div>
                                @endif
                            </div>
                            <div class="item-details">
                                <div class="item-title">{{ $item->Judul }}</div>
                                <div class="item-author"><i class="fas fa-user"></i> {{ $item->Pengarang }}</div>
                                @if($item->Nama_Kategori)
                                    <span class="item-category">{{ $item->Nama_Kategori }}</span>
                                @endif
                            </div>
                            <div class="item-pricing">
                                <div class="item-qty">{{ $item->kuantiti }} x Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</div>
                                <div class="item-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary Card -->
            <div class="summary-card">
                <div class="summary-row">
                    <span class="summary-label">Subtotal ({{ $details->sum('kuantiti') }} item)</span>
                    <span class="summary-value">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Ongkos Kirim</span>
                    <span class="summary-value">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row total">
                    <span class="summary-label">Total Pembayaran</span>
                    <span class="summary-value">Rp {{ number_format($order->Total_harga, 0, ',', '.') }}</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                @if($paymentStatus == 'Menunggu' && !$order->Bukti_Pembayaran)
                    <a href="{{ route('payment.qris', $order->id_transaksi) }}" class="btn btn-warning">
                        <i class="fas fa-wallet"></i> Bayar Sekarang
                    </a>
                @endif
                <a href="{{ route('user.orders') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pesanan
                </a>
                <a href="https://wa.me/6281280970700?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20pesanan%20%23{{ str_pad($order->id_transaksi, 6, '0', STR_PAD_LEFT) }}" target="_blank" class="btn btn-primary">
                    <i class="fab fa-whatsapp"></i> Hubungi Admin
                </a>
            </div>
        </div>
    </div>
</body>
</html>
