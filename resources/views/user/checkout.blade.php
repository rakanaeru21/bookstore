<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - BookHaven</title>
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
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header - Sama dengan Dashboard */
        header {
            padding: 16px 0;
            background: rgba(255, 255, 255, 0.98);
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
            transition: opacity 0.3s;
        }

        .logo:hover {
            opacity: 0.85;
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
            box-shadow: 0 4px 12px rgba(120, 53, 15, 0.25);
        }

        .nav-links {
            display: flex;
            gap: 8px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #57534e;
            font-weight: 500;
            font-size: 15px;
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.25s;
        }

        .nav-links a:hover {
            background: rgba(120, 53, 15, 0.08);
            color: #78350f;
        }

        .nav-links a.active {
            background: rgba(120, 53, 15, 0.1);
            color: #78350f;
        }

        .user-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px 8px 8px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 50px;
            border: 1px solid rgba(120, 53, 15, 0.2);
            transition: all 0.3s;
        }

        .user-info:hover {
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.2);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 2px 8px rgba(120, 53, 15, 0.35);
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
            font-size: 11px;
            color: #92400e;
            font-weight: 500;
            text-transform: capitalize;
        }

        .btn {
            padding: 11px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cart-header {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            color: white;
            width: 46px;
            height: 46px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            position: relative;
            box-shadow: 0 4px 12px rgba(120, 53, 15, 0.3);
        }

        .btn-cart-header:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(120, 53, 15, 0.4);
        }

        .cart-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid white;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.4);
        }

        .btn-logout {
            background: transparent;
            color: #78350f;
            border: 2px solid rgba(120, 53, 15, 0.25);
            padding: 10px 18px;
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            border-color: transparent;
        }

        .btn-primary {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(120, 53, 15, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #78350f;
            border: 2px solid #78350f;
        }

        .btn-secondary:hover {
            background: #78350f;
            color: white;
        }

        /* Page Hero */
        .page-hero {
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            padding: 50px 0;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(120, 53, 15, 0.08) 0%, transparent 70%);
            border-radius: 50%;
        }

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(146, 64, 14, 0.06) 0%, transparent 70%);
            border-radius: 50%;
        }

        .page-hero-content {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .page-hero-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            box-shadow: 0 8px 30px rgba(120, 53, 15, 0.3);
        }

        .page-hero-icon i {
            font-size: 32px;
            color: white;
        }

        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            color: #1c1917;
            margin-bottom: 12px;
        }

        .page-hero p {
            color: #57534e;
            font-size: 16px;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 20px;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #78350f;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .breadcrumb a:hover {
            opacity: 0.7;
        }

        .breadcrumb span {
            color: #a8a29e;
        }

        .breadcrumb .current {
            color: #57534e;
            font-weight: 500;
        }

        /* Alert Messages */
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-error {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        .alert-error .alert-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
        }

        /* Main Content */
        .main-content {
            padding: 0 0 60px;
            min-height: 50vh;
        }

        .checkout-container {
            display: grid;
            grid-template-columns: 1fr 420px;
            gap: 32px;
        }

        .checkout-form {
            background: white;
            border-radius: 20px;
            padding: 32px;
            border: 1px solid rgba(120, 53, 15, 0.08);
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.06);
        }

        .form-section {
            margin-bottom: 32px;
        }

        .form-section:last-of-type {
            margin-bottom: 0;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #1c1917;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f5ebe0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: #78350f;
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
            padding: 14px 18px;
            border: 2px solid #e7e5e4;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: 'Instrument Sans', sans-serif;
            background: #fafaf9;
        }

        .form-input:focus {
            outline: none;
            border-color: #78350f;
            background: white;
            box-shadow: 0 0 0 4px rgba(120, 53, 15, 0.1);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e7e5e4;
            border-radius: 12px;
            font-size: 14px;
            background: #fafaf9;
            cursor: pointer;
            transition: all 0.3s;
        }

        .form-select:focus {
            outline: none;
            border-color: #78350f;
            background: white;
            box-shadow: 0 0 0 4px rgba(120, 53, 15, 0.1);
        }

        .radio-group {
            display: flex;
            gap: 16px;
        }

        .radio-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 20px;
            border: 2px solid #e7e5e4;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s;
            flex: 1;
            background: #fafaf9;
        }

        .radio-item:hover {
            border-color: #d4a574;
            background: white;
        }

        .radio-item.selected {
            border-color: #78350f;
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.1);
        }

        .radio-item input[type="radio"] {
            margin: 0;
            margin-top: 3px;
            accent-color: #78350f;
            width: 18px;
            height: 18px;
        }

        .radio-label {
            font-weight: 500;
            font-size: 14px;
            flex: 1;
        }

        .radio-label div:first-child {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
        }

        /* QRIS Payment */
        .payment-qris {
            width: 100%;
        }

        .qris-card {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            border: 2px solid #78350f;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.1);
        }

        .qris-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }

        .qris-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(120, 53, 15, 0.3);
        }

        .qris-icon i {
            font-size: 24px;
            color: white;
        }

        .qris-info {
            flex: 1;
        }

        .qris-info h4 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #78350f;
            margin-bottom: 4px;
        }

        .qris-info p {
            font-size: 13px;
            color: #92400e;
        }

        .qris-badge {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 2px 8px rgba(22, 163, 74, 0.3);
        }

        .qris-supported {
            padding-top: 16px;
            border-top: 1px dashed rgba(120, 53, 15, 0.2);
        }

        .qris-supported > span {
            font-size: 12px;
            color: #78716c;
            display: block;
            margin-bottom: 12px;
        }

        .qris-logos {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .payment-logo {
            background: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            color: #57534e;
            border: 1px solid #e7e5e4;
            transition: all 0.2s;
        }

        .payment-logo:hover {
            border-color: #78350f;
            color: #78350f;
        }

        /* Order Summary */
        .order-summary {
            background: white;
            border-radius: 20px;
            padding: 28px;
            border: 1px solid rgba(120, 53, 15, 0.08);
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.06);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #1c1917;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .summary-title i {
            color: #78350f;
        }

        .order-items-list {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
            padding-right: 8px;
        }

        .order-items-list::-webkit-scrollbar {
            width: 6px;
        }

        .order-items-list::-webkit-scrollbar-track {
            background: #f5f5f4;
            border-radius: 3px;
        }

        .order-items-list::-webkit-scrollbar-thumb {
            background: #d4a574;
            border-radius: 3px;
        }

        .order-item {
            display: flex;
            gap: 14px;
            padding: 14px 0;
            border-bottom: 1px solid #f5f5f4;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image-small {
            width: 55px;
            height: 75px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(120, 53, 15, 0.1);
        }

        .item-image-small img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image-small {
            color: #78350f;
            font-size: 9px;
            text-align: center;
            font-weight: 600;
            padding: 4px;
        }

        .item-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .item-name {
            font-weight: 600;
            font-size: 14px;
            color: #1c1917;
            margin-bottom: 4px;
            line-height: 1.4;
        }

        .item-qty {
            font-size: 12px;
            color: #78716c;
        }

        .item-price {
            font-weight: 700;
            color: #78350f;
            font-size: 14px;
            display: flex;
            align-items: center;
        }

        .summary-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e7e5e4, transparent);
            margin: 16px 0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 14px 0;
            font-size: 14px;
            color: #57534e;
        }

        .summary-row span:last-child {
            font-weight: 500;
            color: #1c1917;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f5ebe0;
            font-weight: 700;
            font-size: 20px;
        }

        .summary-total span:first-child {
            color: #1c1917;
        }

        .summary-total span:last-child {
            color: #78350f;
        }

        .checkout-button {
            margin-top: 24px;
            width: 100%;
            padding: 16px 24px;
            font-size: 16px;
            border-radius: 14px;
        }

        /* Footer */
        footer {
            background: linear-gradient(180deg, #1c1917 0%, #0f0e0d 100%);
            color: white;
            padding: 70px 0 30px;
            margin-top: 80px;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #78350f 0%, #92400e 50%, #78350f 100%);
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            gap: 50px;
            margin-bottom: 50px;
        }

        .footer-brand .logo {
            color: white;
            margin-bottom: 16px;
        }

        .footer-brand .logo-icon {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
        }

        .footer-brand p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            line-height: 1.8;
            max-width: 280px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .footer-social a {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s;
            font-size: 16px;
        }

        .footer-social a:hover {
            background: #92400e;
            color: white;
            transform: translateY(-3px);
        }

        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
            color: #d4a574;
            font-size: 18px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-section a:hover {
            color: white;
            padding-left: 8px;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.4);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }

            .checkout-container {
                grid-template-columns: 1fr;
            }

            .order-summary {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .user-info {
                padding: 6px 12px 6px 6px;
            }

            .user-details {
                display: none;
            }

            .page-hero h1 {
                font-size: 32px;
            }

            .page-hero-icon {
                width: 60px;
                height: 60px;
            }

            .page-hero-icon i {
                font-size: 24px;
            }

            .checkout-form {
                padding: 20px;
            }

            .radio-group {
                flex-direction: column;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .footer-brand p {
                max-width: 100%;
            }

            .footer-social {
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
                <ul class="nav-links">
                    <li><a href="{{ route('user.dashboard') }}"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="{{ route('user.dashboard') }}#books"><i class="fas fa-book"></i> Jelajahi Buku</a></li>
                    <li><a href="{{ route('user.dashboard') }}#categories"><i class="fas fa-layer-group"></i> Kategori</a></li>
                </ul>
                <div class="user-section">
                    <div class="user-info">
                        <div class="user-avatar">{{ strtoupper(substr(auth()->user()->Nama_Lengkap, 0, 1)) }}{{ strtoupper(substr(explode(' ', auth()->user()->Nama_Lengkap)[1] ?? '', 0, 1)) }}</div>
                        <div class="user-details">
                            <span class="user-name">{{ auth()->user()->Nama_Lengkap }}</span>
                            <span class="user-role">{{ auth()->user()->Role }}</span>
                        </div>
                    </div>
                    @php
                        $cartSession = session()->get('cart', []);
                        $cartCount = array_sum(array_column($cartSession, 'qty'));
                    @endphp
                    <a href="{{ route('cart.show') }}" class="btn btn-cart-header">
                        <i class="fas fa-shopping-cart"></i>
                        @if($cartCount > 0)
                            <span class="cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="page-hero-content">
                <div class="page-hero-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h1>Checkout</h1>
                <p>Lengkapi informasi pengiriman dan pembayaran untuk menyelesaikan pesanan Anda</p>
                <div class="breadcrumb">
                    <a href="{{ route('user.dashboard') }}">Beranda</a>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <a href="{{ route('cart.show') }}">Keranjang</a>
                    <span><i class="fas fa-chevron-right"></i></span>
                    <span class="current">Checkout</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            @if(session('error'))
                <div class="alert alert-error">
                    <div class="alert-icon"><i class="fas fa-times"></i></div>
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
                            <h3 class="section-title"><i class="fas fa-map-marker-alt"></i> Informasi Pengiriman</h3>

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
                            <h3 class="section-title"><i class="fas fa-shipping-fast"></i> Ekspedisi</h3>

                            <div class="radio-group">
                                <div class="radio-item {{ old('ekspedisi', 'reguler') == 'reguler' ? 'selected' : '' }}">
                                    <input type="radio" id="reguler" name="ekspedisi" value="reguler" data-price="8000"
                                           {{ old('ekspedisi', 'reguler') == 'reguler' ? 'checked' : '' }}>
                                    <label class="radio-label" for="reguler">
                                        <div>
                                            <i class="fas fa-truck"></i>
                                            Reguler
                                        </div>
                                        <div style="font-size: 12px; color: #78716c; font-weight: 400;">Rp 8.000 (3-5 hari kerja)</div>
                                    </label>
                                </div>

                                <div class="radio-item {{ old('ekspedisi') == 'instant' ? 'selected' : '' }}">
                                    <input type="radio" id="instant" name="ekspedisi" value="instant" data-price="20000"
                                           {{ old('ekspedisi') == 'instant' ? 'checked' : '' }}>
                                    <label class="radio-label" for="instant">
                                        <div>
                                            <i class="fas fa-bolt"></i>
                                            Instant
                                        </div>
                                        <div style="font-size: 12px; color: #78716c; font-weight: 400;">Rp 20.000 (1-2 hari kerja)</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Metode Pembayaran -->
                        <div class="form-section">
                            <h3 class="section-title"><i class="fas fa-wallet"></i> Metode Pembayaran</h3>

                            <div class="payment-qris">
                                <input type="hidden" name="metode_pembayaran" value="qris">
                                <div class="qris-card">
                                    <div class="qris-header">
                                        <div class="qris-icon">
                                            <i class="fas fa-qrcode"></i>
                                        </div>
                                        <div class="qris-info">
                                            <h4>QRIS</h4>
                                            <p>Scan QR untuk pembayaran instan</p>
                                        </div>
                                        <div class="qris-badge">
                                            <i class="fas fa-check-circle"></i>
                                            Terpilih
                                        </div>
                                    </div>
                                    <div class="qris-supported">
                                        <span>Didukung oleh:</span>
                                        <div class="qris-logos">
                                            <span class="payment-logo">GoPay</span>
                                            <span class="payment-logo">OVO</span>
                                            <span class="payment-logo">DANA</span>
                                            <span class="payment-logo">ShopeePay</span>
                                            <span class="payment-logo">LinkAja</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="form-section">
                            <h3 class="section-title"><i class="fas fa-sticky-note"></i> Catatan Pesanan (Opsional)</h3>

                            <div class="form-group">
                                <textarea
                                    class="form-input form-textarea"
                                    id="catatan"
                                    name="catatan"
                                    placeholder="Catatan khusus untuk pesanan Anda...">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary checkout-button">
                            <i class="fas fa-lock"></i>
                            Lanjutkan Pembayaran
                        </button>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h3 class="summary-title"><i class="fas fa-receipt"></i> Ringkasan Pesanan</h3>

                    <!-- Order Items -->
                    <div class="order-items-list">
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
                    </div>

                    <div class="summary-divider"></div>

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

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section footer-brand">
                    <a href="{{ route('user.dashboard') }}" class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        BookHaven
                    </a>
                    <p>Toko buku online terpercaya untuk semua kebutuhan membaca Anda. Temukan, jelajahi, dan nikmati dunia buku.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Tentang Kami</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Kontak</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> FAQ</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Kategori</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Fiksi</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Non-Fiksi</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Best Seller</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Rilis Baru</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-envelope"></i> info@bookhaven.com</a></li>
                        <li><a href="#"><i class="fas fa-phone"></i> +62 123 456 7890</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 BookHaven. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
