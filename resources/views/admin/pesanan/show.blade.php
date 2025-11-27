<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }} - BookHaven Admin</title>
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
            transition: margin-left 0.3s ease;
        }

        /* Sidebar Toggle */
        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: #8b4513;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 12px;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background: #6d3610;
            transform: scale(1.05);
        }

        /* Collapsible Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -280px;
            width: 280px;
            height: 100vh;
            background: white;
            box-shadow: 2px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
            transition: left 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #e8dcc8;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
        }

        .sidebar-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .sidebar-subtitle {
            font-size: 14px;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: #2c2416;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .menu-item:hover {
            background: #f8f9fa;
            border-left-color: #8b4513;
            color: #8b4513;
        }

        .menu-item.active {
            background: #f8f9fa;
            border-left-color: #8b4513;
            color: #8b4513;
            font-weight: 600;
        }

        .menu-icon {
            margin-right: 12px;
            font-size: 18px;
            width: 20px;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Main content adjustment */
        body.sidebar-open {
            margin-left: 280px;
        }

        @media (max-width: 768px) {
            body.sidebar-open {
                margin-left: 0;
            }
        }

        /* Header */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            color: #8b4513;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .welcome-text {
            font-weight: 500;
            color: #2c2416;
        }

        .role-badge {
            background: #8b4513;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .logout-btn {
            color: #dc3545;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .logout-btn:hover {
        }

        /* Main Content */
        .main-content {
            padding: 48px 0;
            min-height: 80vh;
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 24px;
        }
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
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #a0522d 0%, #8b4513 100%);
            transform: translateY(-1px);
        }

        .btn-success {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
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

        .alert-success {
            background: #f0fdf4;
            border: 1px solid #22c55e;
            color: #15803d;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        /* Main Content */
        .main-content {
            padding: 48px 0;
            min-height: 80vh;
        }

        .breadcrumb {
            margin-bottom: 24px;
            font-size: 14px;
            color: #78716c;
        }

        .breadcrumb a {
            color: #8b4513;
            text-decoration: none;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #2c2416;
            margin-bottom: 32px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 32px;
        }

        .detail-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
            margin-bottom: 24px;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #1c1917;
            margin-bottom: 20px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e7e5e4;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            color: #78716c;
            font-weight: 500;
        }

        .info-value {
            font-weight: 600;
            text-align: right;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            display: inline-block;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-success {
            background: #d1fae5;
            color: #065f46;
        }

        .status-processing {
            background: #dbeafe;
            color: #1e40af;
        }

        .status-rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .order-item {
            display: flex;
            gap: 12px;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 60px;
            height: 80px;
            border-radius: 6px;
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

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            font-size: 16px;
            color: #1c1917;
            margin-bottom: 4px;
        }

        .item-meta {
            font-size: 14px;
            color: #78716c;
            margin-bottom: 8px;
        }

        .item-price {
            font-weight: 700;
            color: #78350f;
            font-size: 16px;
        }

        .bukti-pembayaran {
            text-align: center;
            margin: 20px 0;
        }

        .bukti-pembayaran img {
            max-width: 100%;
            max-height: 400px;
            border-radius: 12px;
            border: 2px solid #e7e5e4;
        }

        .action-form {
            margin-top: 24px;
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

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .total-summary {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .summary-row:last-child {
            margin-bottom: 0;
            font-weight: 700;
            color: #78350f;
            font-size: 16px;
            border-top: 1px solid #e2e8f0;
            padding-top: 12px;
        }

        @media (max-width: 768px) {
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .button-group {
                flex-direction: column;
            }

            .page-title {
                font-size: 28px;
            }
        }

        /* Payment Proof Styles */
        .payment-proof-container {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 24px;
            margin-bottom: 24px;
        }

        .proof-info {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e8dcc8;
        }

        .proof-image {
            text-align: center;
        }

        .payment-proof-img {
            max-width: 100%;
            max-height: 400px;
            border-radius: 12px;
            border: 2px solid #e8dcc8;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.1);
        }

        .payment-proof-img:hover {
            border-color: #8b4513;
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(139, 69, 19, 0.2);
        }

        .proof-caption {
            margin-top: 8px;
            font-size: 12px;
            color: #6b5d4f;
            font-style: italic;
        }

        .payment-actions {
            border-top: 1px solid #e8dcc8;
            padding-top: 24px;
        }

        .actions-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 16px;
        }

        .payment-form {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e8dcc8;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .form-select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            color: #2c2416;
            transition: border-color 0.2s;
        }

        .form-select:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
        }

        .form-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            color: #2c2416;
            resize: vertical;
            min-height: 80px;
            transition: border-color 0.2s;
            font-family: 'Instrument Sans', sans-serif;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
        }

        .no-proof-state {
            text-align: center;
            padding: 48px 24px;
        }

        .no-proof-icon {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 16px;
        }

        .no-proof-title {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .no-proof-description {
            color: #6b7280;
        }

        /* Modal Styles */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90vw;
            max-height: 90vh;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            padding: 16px 20px;
            background: #8b4513;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-weight: 600;
            font-size: 16px;
        }

        .modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.2s;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .modal-image {
            display: block;
            max-width: 100%;
            max-height: 80vh;
            margin: 0 auto;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .payment-proof-container {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .payment-proof-img {
                max-height: 300px;
            }

            .modal-content {
                margin: 20px;
                max-width: calc(100vw - 40px);
                max-height: calc(100vh - 40px);
            }

            .modal-image {
                max-height: 70vh;
                padding: 10px;
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar functionality
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const body = document.body;

            function toggleSidebar() {
                sidebar.classList.toggle('open');
                sidebarOverlay.classList.toggle('show');
                if (window.innerWidth > 768) {
                    body.classList.toggle('sidebar-open');
                }
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            // Image Modal Functions
            window.openImageModal = function(imageSrc) {
                // Create modal if it doesn't exist
                let modal = document.getElementById('imageModal');
                if (!modal) {
                    modal = document.createElement('div');
                    modal.id = 'imageModal';
                    modal.className = 'image-modal';
                    modal.innerHTML = `
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="modal-title">Bukti Pembayaran</span>
                                <button class="modal-close" onclick="closeImageModal()">&times;</button>
                            </div>
                            <img class="modal-image" id="modalImage" src="">
                        </div>
                    `;
                    document.body.appendChild(modal);

                    // Close modal when clicking outside
                    modal.addEventListener('click', function(e) {
                        if (e.target === modal) {
                            closeImageModal();
                        }
                    });

                    // Close modal with ESC key
                    document.addEventListener('keydown', function(e) {
                        if (e.key === 'Escape') {
                            closeImageModal();
                        }
                    });
                }

                document.getElementById('modalImage').src = imageSrc;
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            };

            window.closeImageModal = function() {
                const modal = document.getElementById('imageModal');
                if (modal) {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            };
        });
    </script>
</head>
<body>
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-title">BookHaven</div>
            <div class="sidebar-subtitle">Admin Panel</div>
        </div>
        <nav class="sidebar-menu">
            <a href="{{ route('admin.dashboard') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-tachometer-alt"></i></span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.user.index') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-users"></i></span>
                <span>Kelola Pengguna</span>
            </a>
            <a href="{{ route('admin.buku.index') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-book"></i></span>
                <span>Kelola Buku</span>
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-tags"></i></span>
                <span>Kelola Kategori</span>
            </a>
            <a href="{{ route('admin.pesanan.index') }}" class="menu-item active">
                <span class="menu-icon"><i class="fas fa-clipboard-list"></i></span>
                <span>Kelola Pesanan</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">BookHaven Admin</div>
            <div class="user-menu">
                <span class="welcome-text">Selamat datang, {{ Auth::user()->Nama_Lengkap ?? 'Admin' }}</span>
                <span class="role-badge">{{ Auth::user()->Role ?? 'Admin' }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn" style="background: none; border: none; cursor: pointer;">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
            <div class="breadcrumb">
                <a href="{{ route('admin.pesanan.index') }}">Kelola Pesanan</a> / Detail Pesanan
            </div>

            <h1 class="page-title">Detail Pesanan #{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="detail-grid">
                <!-- Main Content -->
                <div>
                    <!-- Order Details -->
                    <div class="detail-card">
                        <h2 class="card-title">Detail Pesanan</h2>

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
                                    <div class="item-name">{{ $detail->Judul }}</div>
                                    <div class="item-meta">
                                        Qty: {{ $detail->kuantiti }} × Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}
                                    </div>
                                    <div class="item-price">
                                        Rp {{ number_format($detail->harga, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Total Summary -->
                        <div class="total-summary">
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
                                <span>Ongkir ({{ $transaksi->Ekspedisi }}):</span>
                                <span>Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                            </div>

                            <div class="summary-row">
                                <span>Total:</span>
                                <span>Rp {{ number_format($transaksi->Total_harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Proof -->
                    @if($transaksi->Bukti_Pembayaran)
                        <div class="detail-card">
                            <h2 class="card-title">Bukti Pembayaran</h2>
                            <div class="bukti-pembayaran">
                                <img src="{{ asset('storage/' . $transaksi->Bukti_Pembayaran) }}" alt="Bukti Pembayaran">
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div>
                    <!-- Transaction Info -->
                    <div class="detail-card">
                        <h2 class="card-title">Informasi Transaksi</h2>

                        <div class="info-row">
                            <span class="info-label">Customer:</span>
                            <span class="info-value">{{ $transaksi->nama_customer }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Email:</span>
                            <span class="info-value">{{ $transaksi->Email }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Tanggal Pesanan:</span>
                            <span class="info-value">{{ \Carbon\Carbon::parse($transaksi->Tanggal_Transaksi)->format('d M Y, H:i') }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Metode Pembayaran:</span>
                            <span class="info-value">
                                @if($transaksi->metode_pembayaran == 'transfer')
                                    Transfer Bank
                                @else
                                    Cash on Delivery
                                @endif
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Status Pembayaran:</span>
                            <span class="info-value">
                                @if($transaksi->Status_Pembayaran == 'Menunggu')
                                    <span class="status-badge status-pending">Menunggu</span>
                                @elseif($transaksi->Status_Pembayaran == 'Menunggu Verifikasi')
                                    <span class="status-badge status-pending">Menunggu Verifikasi</span>
                                @elseif($transaksi->Status_Pembayaran == 'Berhasil')
                                    <span class="status-badge status-success">Berhasil</span>
                                @else
                                    <span class="status-badge status-rejected">Gagal</span>
                                @endif
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Status Pesanan:</span>
                            <span class="info-value">
                                @if($transaksi->Status == 'Pending')
                                    <span class="status-badge status-pending">Pending</span>
                                @elseif($transaksi->Status == 'Menunggu Konfirmasi')
                                    <span class="status-badge status-pending">Menunggu Konfirmasi</span>
                                @elseif($transaksi->Status == 'Diproses')
                                    <span class="status-badge status-processing">Diproses</span>
                                @elseif($transaksi->Status == 'Dikirim')
                                    <span class="status-badge status-processing">Dikirim</span>
                                @elseif($transaksi->Status == 'Selesai')
                                    <span class="status-badge status-success">Selesai</span>
                                @else
                                    <span class="status-badge status-rejected">Ditolak</span>
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Shipping Info -->
                    <div class="detail-card">
                        <h2 class="card-title">Informasi Pengiriman</h2>

                        <div class="info-row">
                            <span class="info-label">Alamat:</span>
                            <span class="info-value">{{ $transaksi->alamat_pengiriman }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">No. Telepon:</span>
                            <span class="info-value">{{ $transaksi->nomor_telepon }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">Ekspedisi:</span>
                            <span class="info-value">{{ $transaksi->Ekspedisi }}</span>
                        </div>

                        @if($transaksi->nomor_resi)
                            <div class="info-row">
                                <span class="info-label">No. Resi:</span>
                                <span class="info-value">{{ $transaksi->nomor_resi }}</span>
                            </div>
                        @endif

                        @if($transaksi->catatan)
                            <div class="info-row">
                                <span class="info-label">Catatan:</span>
                                <span class="info-value">{{ $transaksi->catatan }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Payment Proof Section -->
                    @if($transaksi->metode_pembayaran == 'transfer' || $transaksi->metode_pembayaran == 'qris')
                        <div class="detail-card">
                            <h2 class="card-title">Bukti Pembayaran</h2>

                            @if($transaksi->Bukti_Pembayaran)
                                <div class="payment-proof-container">
                                    <div class="proof-info">
                                        <div class="info-row">
                                            <span class="info-label">File Bukti:</span>
                                            <span class="info-value">{{ basename($transaksi->Bukti_Pembayaran) }}</span>
                                        </div>
                                        <div class="info-row">
                                            <span class="info-label">Status:</span>
                                            <span class="info-value">
                                                @if($transaksi->Status_Pembayaran == 'Menunggu Verifikasi')
                                                    <span class="status-badge status-pending">Menunggu Verifikasi</span>
                                                @elseif($transaksi->Status_Pembayaran == 'Berhasil')
                                                    <span class="status-badge status-success">Terverifikasi</span>
                                                @else
                                                    <span class="status-badge status-rejected">Ditolak</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="proof-image">
                                        <img src="{{ asset('storage/' . $transaksi->Bukti_Pembayaran) }}"
                                             alt="Bukti Pembayaran"
                                             class="payment-proof-img"
                                             onclick="openImageModal('{{ asset('storage/' . $transaksi->Bukti_Pembayaran) }}')">
                                        <p class="proof-caption">Klik gambar untuk memperbesar</p>
                                    </div>
                                </div>

                                <!-- Payment Status Controls -->
                                @if($transaksi->Status_Pembayaran == 'Menunggu Verifikasi' || $transaksi->Status_Pembayaran == 'Berhasil')
                                    <div class="payment-actions">
                                        <h3 class="actions-title">Kelola Status Pembayaran</h3>

                                        <form action="{{ route('admin.pesanan.update-payment', $transaksi->id_transaksi) }}" method="POST" class="payment-form">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label class="form-label">Status Pembayaran:</label>
                                                <select name="status_pembayaran" class="form-select" required>
                                                    <option value="Menunggu Verifikasi" {{ $transaksi->Status_Pembayaran == 'Menunggu Verifikasi' ? 'selected' : '' }}>
                                                        Menunggu Verifikasi
                                                    </option>
                                                    <option value="Berhasil" {{ $transaksi->Status_Pembayaran == 'Berhasil' ? 'selected' : '' }}>
                                                        Setujui Pembayaran
                                                    </option>
                                                    <option value="Gagal" {{ $transaksi->Status_Pembayaran == 'Gagal' ? 'selected' : '' }}>
                                                        Tolak Pembayaran
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="catatan_admin">Catatan Admin (Opsional):</label>
                                                <textarea class="form-textarea"
                                                         id="catatan_admin"
                                                         name="catatan_admin"
                                                         rows="3"
                                                         placeholder="Tambahkan catatan untuk customer jika diperlukan...">{{ $transaksi->catatan_admin }}</textarea>
                                            </div>

                                            <div class="button-group">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                                    Update Status Pembayaran
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            @else
                                <div class="no-proof-state">
                                    <div class="no-proof-icon">
                                        <i class="fas fa-receipt"></i>
                                    </div>
                                    <h3 class="no-proof-title">Belum Ada Bukti Pembayaran</h3>
                                    <p class="no-proof-description">Customer belum mengunggah bukti pembayaran untuk pesanan ini.</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Actions -->
                    @if($transaksi->Status_Pembayaran == 'Menunggu Verifikasi' && $transaksi->Bukti_Pembayaran)
                        <div class="detail-card">
                            <h2 class="card-title">Verifikasi Pembayaran</h2>

                            <form action="{{ route('admin.pesanan.update-status', $transaksi->id_transaksi) }}" method="POST" class="action-form">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-label" for="catatan_admin">Catatan Admin (Opsional)</label>
                                    <textarea class="form-input form-textarea" id="catatan_admin" name="catatan_admin" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                                </div>

                                <div class="button-group">
                                    <button type="submit" name="status" value="approve" class="btn btn-success">
                                        <i class="fas fa-check" style="margin-right: 8px;"></i>
                                        Setujui Pembayaran
                                    </button>
                                    <button type="submit" name="status" value="reject" class="btn btn-danger">
                                        <i class="fas fa-times" style="margin-right: 8px;"></i>
                                        Tolak Pembayaran
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if($transaksi->Status == 'Diproses' && $transaksi->Status_Pembayaran == 'Berhasil')
                        <div class="detail-card">
                            <h2 class="card-title">Update Pengiriman</h2>

                            <form action="{{ route('admin.pesanan.update-delivery', $transaksi->id_transaksi) }}" method="POST" class="action-form">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-label" for="nomor_resi">Nomor Resi (Opsional)</label>
                                    <input type="text" class="form-input" id="nomor_resi" name="nomor_resi" placeholder="Masukkan nomor resi...">
                                </div>

                                <div class="button-group">
                                    <button type="submit" name="status" value="dikirim" class="btn btn-primary">
                                        <i class="fas fa-shipping-fast" style="margin-right: 8px;"></i>
                                        Tandai Dikirim
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif

                    @if($transaksi->Status == 'Dikirim')
                        <div class="detail-card">
                            <h2 class="card-title">Selesaikan Pesanan</h2>

                            <form action="{{ route('admin.pesanan.update-delivery', $transaksi->id_transaksi) }}" method="POST" class="action-form">
                                @csrf
                                @method('PUT')

                                <div class="button-group">
                                    <button type="submit" name="status" value="selesai" class="btn btn-success">
                                        <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                        Tandai Selesai
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif

                    <!-- Back Button -->
                    <div class="detail-card">
                        <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary" style="width: 100%;">
                            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                            Kembali ke Daftar Pesanan
                        </a>
                    </div>
                </div>
            </div>
    </main>
</body>
</html>
