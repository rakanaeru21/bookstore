<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - BookHaven</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(120, 53, 15, 0.08);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
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

        /* Page Header */
        .page-header {
            padding: 40px 0;
            background: linear-gradient(135deg, #faf8f5 0%, #f5ebe0 100%);
            border-bottom: 1px solid rgba(120, 53, 15, 0.1);
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #78350f;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #78716c;
            font-size: 16px;
        }

        /* Orders Section */
        .orders-section {
            padding: 40px 0;
        }

        .orders-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid rgba(120, 53, 15, 0.1);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .stat-icon.pending {
            background: #fef3c7;
            color: #d97706;
        }

        .stat-icon.process {
            background: #dbeafe;
            color: #2563eb;
        }

        .stat-icon.success {
            background: #dcfce7;
            color: #16a34a;
        }

        .stat-icon.total {
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            color: #78350f;
        }

        .stat-info h3 {
            font-size: 28px;
            font-weight: 700;
            color: #1c1917;
        }

        .stat-info p {
            font-size: 14px;
            color: #78716c;
        }

        /* Orders List */
        .orders-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .order-card {
            background: white;
            border-radius: 20px;
            border: 1px solid rgba(120, 53, 15, 0.1);
            overflow: hidden;
            transition: all 0.3s;
        }

        .order-card:hover {
            box-shadow: 0 10px 40px rgba(120, 53, 15, 0.1);
            border-color: rgba(120, 53, 15, 0.2);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 24px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5ebe0 100%);
            border-bottom: 1px solid rgba(120, 53, 15, 0.1);
        }

        .order-id {
            font-weight: 700;
            color: #78350f;
            font-size: 16px;
        }

        .order-date {
            color: #78716c;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .order-status {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .status-verified {
            background: #dbeafe;
            color: #2563eb;
        }

        .status-processing {
            background: #e0e7ff;
            color: #4f46e5;
        }

        .status-shipped {
            background: #cffafe;
            color: #0891b2;
        }

        .status-delivered {
            background: #dcfce7;
            color: #16a34a;
        }

        .status-cancelled {
            background: #fee2e2;
            color: #dc2626;
        }

        .order-body {
            padding: 20px 24px;
        }

        .order-items {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px;
            background: #f5f5f4;
            border-radius: 12px;
            flex: 1;
            min-width: 280px;
        }

        .item-cover {
            width: 60px;
            height: 80px;
            border-radius: 8px;
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
            font-size: 24px;
        }

        .item-info {
            flex: 1;
            min-width: 0;
        }

        .item-title {
            font-weight: 600;
            color: #1c1917;
            font-size: 14px;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-author {
            font-size: 12px;
            color: #78716c;
            margin-bottom: 6px;
        }

        .item-qty {
            font-size: 13px;
            color: #92400e;
            font-weight: 600;
        }

        .more-items {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 12px;
            color: #78350f;
            font-weight: 600;
            font-size: 14px;
            min-width: 120px;
        }

        .order-summary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #e7e5e4;
        }

        .order-info {
            display: flex;
            gap: 24px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .info-label {
            font-size: 12px;
            color: #78716c;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
            color: #1c1917;
        }

        .order-total {
            text-align: right;
        }

        .total-label {
            font-size: 12px;
            color: #78716c;
        }

        .total-value {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #78350f;
        }

        .order-actions {
            display: flex;
            gap: 12px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px dashed #e7e5e4;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
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
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.3);
        }

        .btn-secondary {
            background: #f5f5f4;
            color: #57534e;
            border: 2px solid #e7e5e4;
        }

        .btn-secondary:hover {
            background: #e7e5e4;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            background: white;
            border-radius: 20px;
            border: 1px solid rgba(120, 53, 15, 0.1);
        }

        .empty-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .empty-icon i {
            font-size: 40px;
            color: #92400e;
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #1c1917;
            margin-bottom: 12px;
        }

        .empty-state p {
            color: #78716c;
            font-size: 16px;
            margin-bottom: 24px;
        }

        /* Payment Status Badge */
        .payment-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }

        .payment-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .payment-success {
            background: #dcfce7;
            color: #16a34a;
        }

        .payment-failed {
            background: #fee2e2;
            color: #dc2626;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 28px;
            }

            .orders-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .order-header {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .order-summary {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .order-info {
                flex-wrap: wrap;
                gap: 16px;
            }

            .order-total {
                text-align: left;
            }

            .order-actions {
                flex-wrap: wrap;
            }

            .btn {
                flex: 1;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .orders-stats {
                grid-template-columns: 1fr;
            }

            .order-items {
                flex-direction: column;
            }

            .order-item {
                min-width: 100%;
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
                <a href="{{ route('user.dashboard') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Dashboard
                </a>
            </nav>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Pesanan Saya</h1>
            <p class="page-subtitle">Kelola dan pantau status pemesanan Anda</p>
        </div>
    </section>

    <!-- Orders Section -->
    <section class="orders-section">
        <div class="container">
            @php
                $pendingCount = $orders->where('Status_Pembayaran', 'Menunggu')->count();
                $successCount = $orders->whereIn('Status_Pembayaran', ['Berhasil', 'Verified'])->count();
                $processingCount = $orders->whereIn('Status', ['Processing', 'Shipped'])->count();
            @endphp

            <!-- Stats -->
            <div class="orders-stats">
                <div class="stat-card">
                    <div class="stat-icon total">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $orders->count() }}</h3>
                        <p>Total Pesanan</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $pendingCount }}</h3>
                        <p>Menunggu Pembayaran</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon process">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $processingCount }}</h3>
                        <p>Dalam Proses</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $successCount }}</h3>
                        <p>Berhasil</p>
                    </div>
                </div>
            </div>

            <!-- Orders List -->
            @if($orders->count() > 0)
                <div class="orders-list">
                    @foreach($orders as $order)
                        <div class="order-card">
                            <div class="order-header">
                                <div>
                                    <span class="order-id">Order #{{ str_pad($order->id_transaksi, 6, '0', STR_PAD_LEFT) }}</span>
                                    <span class="order-date">
                                        <i class="fas fa-calendar"></i>
                                        {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}
                                    </span>
                                </div>
                                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                    @php
                                        $paymentStatus = $order->Status_Pembayaran ?? 'Menunggu';
                                        $orderStatus = $order->Status ?? 'Pending';
                                    @endphp

                                    {{-- Payment Status --}}
                                    @if($paymentStatus == 'Menunggu')
                                        <span class="payment-badge payment-pending"><i class="fas fa-hourglass-half"></i> Menunggu Bayar</span>
                                    @elseif($paymentStatus == 'Berhasil' || $paymentStatus == 'Verified')
                                        <span class="payment-badge payment-success"><i class="fas fa-check"></i> Lunas</span>
                                    @elseif($paymentStatus == 'Gagal')
                                        <span class="payment-badge payment-failed"><i class="fas fa-times"></i> Gagal</span>
                                    @endif

                                    {{-- Order Status --}}
                                    @if($orderStatus == 'Pending')
                                        <span class="order-status status-pending">Pending</span>
                                    @elseif($orderStatus == 'Verified')
                                        <span class="order-status status-verified">Terverifikasi</span>
                                    @elseif($orderStatus == 'Processing')
                                        <span class="order-status status-processing">Diproses</span>
                                    @elseif($orderStatus == 'Shipped')
                                        <span class="order-status status-shipped">Dikirim</span>
                                    @elseif($orderStatus == 'Delivered')
                                        <span class="order-status status-delivered">Selesai</span>
                                    @elseif($orderStatus == 'Cancelled')
                                        <span class="order-status status-cancelled">Dibatalkan</span>
                                    @endif
                                </div>
                            </div>
                            <div class="order-body">
                                <div class="order-items">
                                    @foreach($order->details->take(2) as $detail)
                                        <div class="order-item">
                                            <div class="item-cover">
                                                @if($detail->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($detail->Cover))
                                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($detail->Cover) }}" alt="{{ $detail->Judul }}">
                                                @else
                                                    <div class="no-cover"><i class="fas fa-book"></i></div>
                                                @endif
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title">{{ $detail->Judul }}</div>
                                                <div class="item-author">{{ $detail->Pengarang }}</div>
                                                <div class="item-qty">{{ $detail->kuantiti }} x Rp {{ number_format($detail->harga / $detail->kuantiti, 0, ',', '.') }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if($order->details->count() > 2)
                                        <div class="more-items">
                                            <i class="fas fa-plus"></i>&nbsp; {{ $order->details->count() - 2 }} item lainnya
                                        </div>
                                    @endif
                                </div>

                                <div class="order-summary">
                                    <div class="order-info">
                                        <div class="info-item">
                                            <span class="info-label">Total Item</span>
                                            <span class="info-value">{{ $order->total_items }} buku</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Ekspedisi</span>
                                            <span class="info-value">{{ $order->Ekspedisi }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Pembayaran</span>
                                            <span class="info-value">{{ ucfirst($order->metode_pembayaran ?? 'QRIS') }}</span>
                                        </div>
                                    </div>
                                    <div class="order-total">
                                        <span class="total-label">Total Pembayaran</span>
                                        <div class="total-value">Rp {{ number_format($order->Total_harga, 0, ',', '.') }}</div>
                                    </div>
                                </div>

                                <div class="order-actions">
                                    <a href="{{ route('user.orders.show', $order->id_transaksi) }}" class="btn btn-secondary">
                                        <i class="fas fa-eye"></i> Lihat Detail
                                    </a>
                                    @if($paymentStatus == 'Menunggu' && !$order->Bukti_Pembayaran)
                                        <a href="{{ route('payment.qris', $order->id_transaksi) }}" class="btn btn-warning">
                                            <i class="fas fa-wallet"></i> Bayar Sekarang
                                        </a>
                                    @endif
                                    @if($orderStatus == 'Shipped')
                                        <button class="btn btn-primary" onclick="alert('Fitur konfirmasi penerimaan akan segera tersedia')">
                                            <i class="fas fa-box-check"></i> Terima Pesanan
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h3>Belum Ada Pesanan</h3>
                    <p>Anda belum memiliki riwayat pesanan. Mulai belanja sekarang!</p>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-shopping-cart"></i> Mulai Belanja
                    </a>
                </div>
            @endif
        </div>
    </section>
</body>
</html>
