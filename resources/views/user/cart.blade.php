<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - BookHaven</title>
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
            background: #292524;
            color: white;
            border: 2px solid #292524;
        }

        .btn-logout:hover {
            background: #1c1917;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(120, 53, 15, 0.35);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.35);
        }

        .btn-small {
            padding: 8px 14px;
            font-size: 13px;
            border-radius: 8px;
        }

        /* Hero Section - Page Header */
        .page-hero {
            padding: 50px 0 60px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5ebe0 50%, #e6d5c3 100%);
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 200%;
            background: radial-gradient(ellipse at center, rgba(120, 53, 15, 0.08) 0%, transparent 70%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.5; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.1); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .page-hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .page-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(120, 53, 15, 0.1);
            color: #78350f;
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
            animation: fadeInUp 0.5s ease-out;
        }

        .page-badge i {
            font-size: 14px;
        }

        .page-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #78350f;
            margin-bottom: 12px;
            line-height: 1.15;
            animation: fadeInUp 0.5s ease-out 0.1s backwards;
        }

        .page-hero h1 span {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-hero p {
            font-size: 17px;
            color: #92400e;
            margin-bottom: 0;
            animation: fadeInUp 0.5s ease-out 0.2s backwards;
        }

        /* Success Message */
        .success-message {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border: 1px solid #6ee7b7;
            color: #065f46;
            padding: 18px 24px;
            border-radius: 14px;
            margin: 24px 0;
            font-size: 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.15);
            animation: slideIn 0.4s ease-out;
        }

        .success-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
            box-shadow: 0 3px 10px rgba(16, 185, 129, 0.35);
        }

        .error-message {
            background: linear-gradient(135deg, #fef2f2 0%, #fecaca 100%);
            border: 1px solid #fca5a5;
            color: #991b1b;
            padding: 18px 24px;
            border-radius: 14px;
            margin: 24px 0;
            font-size: 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.15);
            animation: slideIn 0.4s ease-out;
        }

        .error-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            flex-shrink: 0;
            box-shadow: 0 3px 10px rgba(220, 38, 38, 0.35);
        }

        /* Cart Section */
        .cart-section {
            padding: 50px 0 80px;
        }

        .cart-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 32px;
            animation: fadeInUp 0.5s ease-out 0.3s backwards;
        }

        /* Cart Items */
        .cart-items {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #e7e5e4;
        }

        .cart-items-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5ebe0 100%);
            border-bottom: 1px solid #e7e5e4;
        }

        .cart-items-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #1c1917;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-items-title i {
            color: #78350f;
        }

        .cart-count-badge {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
        }

        .cart-item {
            display: flex;
            gap: 20px;
            padding: 24px;
            border-bottom: 1px solid #f5f5f4;
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            background: #faf9f7;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 90px;
            height: 120px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: linear-gradient(135deg, #f5f5f4 0%, #e7e5e4 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e7e5e4;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .cart-item:hover .item-image img {
            transform: scale(1.05);
        }

        .no-cover {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            color: #a8a29e;
        }

        .no-cover i {
            font-size: 28px;
            margin-bottom: 4px;
        }

        .item-details {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .item-info {
            margin-bottom: 12px;
        }

        .item-title {
            font-weight: 600;
            font-size: 16px;
            color: #1c1917;
            margin-bottom: 6px;
            line-height: 1.4;
        }

        .item-price {
            font-weight: 700;
            color: #78350f;
            font-size: 17px;
        }

        .item-price-per {
            font-size: 12px;
            color: #78716c;
            font-weight: 500;
        }

        .item-stock {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #059669;
            margin-top: 6px;
            font-weight: 500;
        }

        .item-stock i {
            font-size: 8px;
        }

        .item-controls {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .qty-control {
            display: flex;
            align-items: center;
            gap: 0;
            background: #f5f5f4;
            border-radius: 10px;
            border: 1px solid #e7e5e4;
            overflow: hidden;
        }

        .qty-btn {
            width: 36px;
            height: 36px;
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 14px;
            color: #78350f;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: #e7e5e4;
        }

        .qty-input {
            width: 45px;
            padding: 8px 4px;
            border: none;
            border-left: 1px solid #e7e5e4;
            border-right: 1px solid #e7e5e4;
            text-align: center;
            font-weight: 600;
            font-size: 14px;
            color: #1c1917;
            background: white;
        }

        .qty-input:focus {
            outline: none;
        }

        .item-subtotal {
            text-align: right;
            min-width: 130px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .subtotal-label {
            font-size: 12px;
            color: #78716c;
            margin-bottom: 4px;
        }

        .subtotal-amount {
            font-weight: 700;
            font-size: 18px;
            color: #78350f;
            font-family: 'Playfair Display', serif;
        }

        /* Cart Summary */
        .cart-summary {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #e7e5e4;
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .summary-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 24px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5ebe0 100%);
            border-bottom: 1px solid #e7e5e4;
        }

        .summary-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(120, 53, 15, 0.25);
        }

        .summary-icon i {
            font-size: 18px;
            color: white;
        }

        .summary-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #1c1917;
        }

        .summary-body {
            padding: 24px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            font-size: 14px;
            color: #57534e;
        }

        .summary-row span:first-child {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .summary-row span:first-child i {
            color: #78350f;
            width: 16px;
        }

        .summary-row span:last-child {
            font-weight: 600;
            color: #1c1917;
        }

        .summary-row.free span:last-child {
            color: #059669;
        }

        .summary-divider {
            height: 1px;
            background: #e7e5e4;
            margin: 20px 0;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 14px;
            margin-bottom: 20px;
        }

        .summary-total-label {
            font-size: 15px;
            font-weight: 600;
            color: #57534e;
        }

        .summary-total-amount {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 26px;
            color: #78350f;
        }

        .checkout-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .checkout-btn {
            padding: 16px 24px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 12px;
            text-align: center;
            width: 100%;
            justify-content: center;
        }

        .checkout-btn-primary {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.3);
        }

        .checkout-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(120, 53, 15, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: #78350f;
            border: 2px solid #78350f;
        }

        .btn-outline:hover {
            background: #78350f;
            color: white;
        }

        .promo-section {
            margin-top: 20px;
            padding: 16px;
            background: #faf9f7;
            border-radius: 12px;
            border: 2px dashed #d6d3d1;
        }

        .promo-title {
            font-size: 13px;
            font-weight: 600;
            color: #78350f;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .promo-input-group {
            display: flex;
            gap: 8px;
        }

        .promo-input {
            flex: 1;
            padding: 10px 14px;
            border: 1px solid #d6d3d1;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
        }

        .promo-input:focus {
            outline: none;
            border-color: #78350f;
            box-shadow: 0 0 0 3px rgba(120, 53, 15, 0.1);
        }

        .promo-btn {
            padding: 10px 16px;
            background: #78350f;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
        }

        .promo-btn:hover {
            background: #92400e;
        }

        .security-badges {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e7e5e4;
        }

        .security-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 11px;
            color: #78716c;
        }

        .security-badge i {
            color: #059669;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 40px;
            animation: fadeInUp 0.5s ease-out;
        }

        .empty-state-icon {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .empty-state-icon i {
            font-size: 48px;
            color: #78350f;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #1c1917;
            margin-bottom: 12px;
        }

        .empty-state p {
            color: #78716c;
            margin-bottom: 32px;
            font-size: 16px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer - Sama dengan Dashboard */
        footer {
            background: linear-gradient(135deg, #1c1917 0%, #292524 100%);
            padding: 60px 0 0;
            position: relative;
            overflow: hidden;
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
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 48px;
        }

        .footer-brand .logo {
            color: white;
            margin-bottom: 16px;
        }

        .footer-brand .logo-icon {
            background: rgba(255, 255, 255, 0.15);
        }

        .footer-brand p {
            color: #a8a29e;
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .footer-social {
            display: flex;
            gap: 12px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a8a29e;
            transition: all 0.3s;
            text-decoration: none;
        }

        .footer-social a:hover {
            background: #78350f;
            color: white;
            transform: translateY(-3px);
        }

        .footer-section h3 {
            color: #d4a574;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section a {
            color: #a8a29e;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-section a:hover {
            color: white;
            padding-left: 4px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 24px 0;
            text-align: center;
            color: #78716c;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .cart-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .cart-summary {
                position: relative;
                top: 0;
            }

            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 32px;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .page-hero h1 {
                font-size: 36px;
            }

            .cart-item {
                flex-direction: column;
                text-align: center;
                gap: 16px;
            }

            .item-image {
                width: 100px;
                height: 130px;
                margin: 0 auto;
            }

            .item-controls {
                justify-content: center;
            }

            .item-subtotal {
                text-align: center;
                min-width: auto;
                width: 100%;
                margin-top: 12px;
                padding-top: 12px;
                border-top: 1px solid #e7e5e4;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-social {
                justify-content: center;
            }

            .footer-section a:hover {
                padding-left: 0;
            }
        }

        @media (max-width: 480px) {
            .user-details {
                display: none;
            }

            .user-info {
                padding: 8px;
            }

            .page-hero h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Header - Sama dengan Dashboard -->
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
                        <div class="user-avatar">{{ strtoupper(substr(auth()->user()->Nama_Lengkap ?? auth()->user()->name ?? 'U', 0, 1)) }}{{ strtoupper(substr(explode(' ', auth()->user()->Nama_Lengkap ?? auth()->user()->name ?? '')[1] ?? '', 0, 1)) }}</div>
                        <div class="user-details">
                            <span class="user-name">{{ auth()->user()->Nama_Lengkap ?? auth()->user()->name ?? 'User' }}</span>
                            <span class="user-role">{{ auth()->user()->Role ?? 'Member' }}</span>
                        </div>
                    </div>
                    @php
                        $cartCount = session()->get('cart', []);
                        $cartTotal = array_sum(array_column($cartCount, 'qty'));
                    @endphp
                    <a href="{{ route('cart.show') }}" class="btn btn-cart-header">
                        <i class="fas fa-shopping-cart"></i>
                        @if($cartTotal > 0)
                            <span class="cart-badge">{{ $cartTotal }}</span>
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

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="container">
        <div class="success-message">
            <span class="success-icon"><i class="fas fa-check"></i></span>
            {{ session('success') }}
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="container">
        <div class="error-message">
            <span class="error-icon"><i class="fas fa-times"></i></span>
            {{ session('error') }}
        </div>
    </div>
    @endif

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">
            <div class="page-hero-content">
                <span class="page-badge">
                    <i class="fas fa-shopping-cart"></i>
                    Keranjang Belanja
                </span>
                <h1>Keranjang <span>Anda</span></h1>
                <p>Kelola pesanan dan lanjutkan ke pembayaran</p>
            </div>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="cart-section">
        <div class="container">
            @if(!empty($cart) && count($cart))
                @php
                    $totalItems = 0;
                    $totalPrice = 0;
                    foreach($cart as $item) {
                        $totalItems += $item['qty'];
                        $totalPrice += $item['Harga'] * $item['qty'];
                    }
                @endphp

                <div class="cart-container">
                    <!-- Cart Items -->
                    <div class="cart-items">
                        <div class="cart-items-header">
                            <h3 class="cart-items-title">
                                <i class="fas fa-box"></i>
                                Item Pesanan
                            </h3>
                            <span class="cart-count-badge">{{ $totalItems }} item</span>
                        </div>

                        @foreach($cart as $item)
                            <div class="cart-item">
                                <div class="item-image">
                                    @if(!empty($item['Cover']) && \Illuminate\Support\Facades\Storage::disk('public')->exists($item['Cover']))
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($item['Cover']) }}" alt="{{ $item['Judul'] }}">
                                    @else
                                        <div class="no-cover">
                                            <i class="fas fa-book"></i>
                                        </div>
                                    @endif
                                </div>

                                <div class="item-details">
                                    <div class="item-info">
                                        <h3 class="item-title">{{ $item['Judul'] }}</h3>
                                        <div class="item-price">
                                            Rp {{ number_format($item['Harga'], 0, ',', '.') }}
                                            <span class="item-price-per">/ buku</span>
                                        </div>
                                        @if(isset($item['Stok']))
                                            <div class="item-stock">
                                                <i class="fas fa-circle"></i>
                                                Stok tersedia: {{ $item['Stok'] }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="item-controls">
                                        <form action="{{ route('cart.update') }}" method="POST" style="display: inline-flex; align-items: center; gap: 10px;">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $item['id_buku'] }}">
                                            <div class="qty-control">
                                                <button type="button" class="qty-btn" onclick="this.parentNode.querySelector('input').stepDown(); this.form.submit();">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number"
                                                       name="qty"
                                                       value="{{ $item['qty'] }}"
                                                       min="1"
                                                       max="{{ isset($item['Stok']) ? $item['Stok'] : 99 }}"
                                                       class="qty-input"
                                                       onchange="this.form.submit()">
                                                <button type="button" class="qty-btn" onclick="this.parentNode.querySelector('input').stepUp(); this.form.submit();">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </form>

                                        <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{ $item['id_buku'] }}">
                                            <button type="submit" class="btn btn-danger btn-small" onclick="return confirm('Hapus buku ini dari keranjang?')">
                                                <i class="fas fa-trash-alt"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <div class="item-subtotal">
                                    <div class="subtotal-label">Subtotal</div>
                                    <div class="subtotal-amount">Rp {{ number_format($item['Harga'] * $item['qty'], 0, ',', '.') }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <div class="summary-header">
                            <div class="summary-icon">
                                <i class="fas fa-receipt"></i>
                            </div>
                            <h3 class="summary-title">Ringkasan Pesanan</h3>
                        </div>

                        <div class="summary-body">
                            <div class="summary-row">
                                <span><i class="fas fa-book"></i> Total Buku</span>
                                <span>{{ $totalItems }} item</span>
                            </div>

                            <div class="summary-row">
                                <span><i class="fas fa-tag"></i> Subtotal</span>
                                <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>

                            <div class="summary-row free">
                                <span><i class="fas fa-truck"></i> Ongkos Kirim</span>
                                <span>GRATIS</span>
                            </div>

                            <div class="summary-divider"></div>

                            <div class="summary-total">
                                <span class="summary-total-label">Total Pembayaran</span>
                                <span class="summary-total-amount">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>

                            <div class="checkout-actions">
                                <a href="{{ route('checkout.show') }}" class="btn checkout-btn checkout-btn-primary">
                                    <i class="fas fa-lock"></i>
                                    Proses Checkout
                                </a>
                                <a href="{{ route('user.dashboard') }}" class="btn btn-outline checkout-btn">
                                    <i class="fas fa-arrow-left"></i>
                                    Lanjutkan Belanja
                                </a>

                                <form action="{{ route('cart.clear') }}" method="POST" style="margin-top: 8px;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger checkout-btn" onclick="return confirm('Kosongkan semua item di keranjang?')">
                                        <i class="fas fa-trash"></i>
                                        Kosongkan Keranjang
                                    </button>
                                </form>
                            </div>

                            <!-- Security Badges -->
                            <div class="security-badges">
                                <div class="security-badge">
                                    <i class="fas fa-shield-alt"></i>
                                    Transaksi Aman
                                </div>
                                <div class="security-badge">
                                    <i class="fas fa-lock"></i>
                                    Data Terenkripsi
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Keranjang Belanja Kosong</h3>
                    <p>Belum ada buku yang ditambahkan ke keranjang. Yuk, mulai jelajahi koleksi buku kami!</p>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-primary">
                        <i class="fas fa-compass"></i>
                        Mulai Belanja
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer - Sama dengan Dashboard -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="{{ route('user.dashboard') }}" class="logo">
                        <span class="logo-icon"><i class="fas fa-book-open"></i></span>
                        BookHaven
                    </a>
                    <p>Temukan buku-buku terbaik untuk memperkaya pengetahuan dan imajinasi Anda. Koleksi lengkap dari berbagai genre.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Navigasi</h3>
                    <ul>
                        <li><a href="{{ route('user.dashboard') }}">Beranda</a></li>
                        <li><a href="{{ route('user.dashboard') }}#books">Katalog Buku</a></li>
                        <li><a href="{{ route('user.dashboard') }}#categories">Kategori</a></li>
                        <li><a href="{{ route('cart.show') }}">Keranjang</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Bantuan</h3>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Cara Pemesanan</a></li>
                        <li><a href="#">Pengiriman</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Kebijakan</h3>
                    <ul>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Pengembalian</a></li>
                        <li><a href="#">Garansi</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 BookHaven. All rights reserved. Made with <i class="fas fa-heart" style="color: #dc2626;"></i> for book lovers.</p>
            </div>
        </div>
    </footer>
</body>
</html>
