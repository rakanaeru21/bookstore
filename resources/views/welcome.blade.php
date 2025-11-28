<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookHaven - Your Literary Sanctuary</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background: #faf9f7;
            color: #2c2416;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        header {
            padding: 16px 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(139, 69, 19, 0.08);
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: #8b4513;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: opacity 0.3s;
        }

        .logo:hover {
            opacity: 0.8;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.25);
        }

        .nav-links {
            display: flex;
            gap: 8px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #5a4a3a;
            font-weight: 500;
            font-size: 15px;
            padding: 10px 18px;
            border-radius: 8px;
            transition: all 0.25s;
        }

        .nav-links a:hover {
            background: rgba(139, 69, 19, 0.08);
            color: #8b4513;
        }

        .auth-buttons {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .btn {
            padding: 11px 24px;
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

        .btn-outline {
            background: transparent;
            border: 2px solid #8b4513;
            color: #8b4513;
        }

        .btn-outline:hover {
            background: #8b4513;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 69, 19, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.3);
            border: 2px solid transparent;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.4);
        }

        /* Hero Section */
        .hero {
            padding: 80px 0 100px;
            text-align: center;
            background: linear-gradient(180deg, #faf9f7 0%, #f5f1e8 100%);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 50%, rgba(139, 69, 19, 0.03) 0%, transparent 50%),
                        radial-gradient(circle at 70% 80%, rgba(160, 82, 45, 0.04) 0%, transparent 40%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(20px, 20px) rotate(5deg); }
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(139, 69, 19, 0.1);
            color: #8b4513;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out;
        }

        .hero-badge i {
            font-size: 12px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 72px;
            color: #2c2416;
            margin-bottom: 24px;
            line-height: 1.1;
            font-weight: 700;
            animation: fadeInUp 0.6s ease-out 0.1s backwards;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 20px;
            color: #6b5d4f;
            margin-bottom: 40px;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.7;
            animation: fadeInUp 0.6s ease-out 0.2s backwards;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.6s ease-out 0.3s backwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-large {
            padding: 16px 36px;
            font-size: 16px;
            border-radius: 12px;
        }

        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 60px;
            margin-top: 60px;
            animation: fadeInUp 0.6s ease-out 0.4s backwards;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 700;
            color: #8b4513;
            display: block;
        }

        .stat-label {
            font-size: 14px;
            color: #8a7a6a;
            margin-top: 4px;
        }

        /* Book Categories / Grid Section */
        .categories {
            padding: 100px 0;
            background: white;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-subtitle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #8b4513;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 16px;
        }

        .categories h2 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #2c2416;
            margin-bottom: 16px;
        }

        .section-desc {
            color: #6b5d4f;
            font-size: 18px;
            max-width: 500px;
            margin: 0 auto;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 32px;
        }

        .category-item {
            aspect-ratio: 3/4;
            border-radius: 16px;
            background: linear-gradient(135deg, #f5f1e8 0%, #ebe4d8 100%);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            display: block;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .category-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 40%, transparent 100%);
            z-index: 1;
        }

        .category-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.2);
        }

        .category-item:hover .cover-img {
            transform: scale(1.08);
        }

        .category-item .cover-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-item .no-cover {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8b4513;
            font-weight: 600;
            padding: 20px;
            text-align: center;
            font-size: 16px;
        }

        .category-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 24px;
            color: white;
            z-index: 2;
            transform: translateY(60px);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .category-item:hover .overlay {
            transform: translateY(0);
        }

        .overlay .title {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .overlay .meta {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .overlay .meta-divider {
            width: 4px;
            height: 4px;
            background: rgba(255,255,255,0.6);
            border-radius: 50%;
        }

        .overlay .actions {
            display: flex;
            gap: 10px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease 0.1s;
        }

        .category-item:hover .overlay .actions {
            opacity: 1;
            transform: translateY(0);
        }

        .overlay .actions .btn {
            padding: 12px 18px;
            font-size: 13px;
            border-radius: 10px;
            font-weight: 600;
            flex: 1;
            justify-content: center;
        }

        .overlay .actions .btn-outline {
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.8);
            color: white;
            backdrop-filter: blur(10px);
        }

        .overlay .actions .btn-outline:hover {
            background: rgba(255,255,255,0.25);
            border-color: white;
        }

        .overlay .actions .btn-white {
            background: white;
            color: #8b4513;
            border: 2px solid white;
        }

        .overlay .actions .btn-white:hover {
            background: #f5f1e8;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #8a7a6a;
        }

        .empty-state i {
            font-size: 48px;
            color: #d4c4b0;
            margin-bottom: 20px;
        }

        .empty-state p {
            font-size: 18px;
        }

        /* CTA Section */
        .cta {
            padding: 100px 0;
            background: linear-gradient(135deg, #8b4513 0%, #6d3610 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .cta-content {
            position: relative;
            z-index: 1;
        }

        .cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .cta p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-white {
            background: white;
            color: #8b4513;
            border: 2px solid white;
        }

        .btn-white:hover {
            background: transparent;
            color: white;
            border-color: white;
        }

        /* Footer */
        footer {
            background: #1a1612;
            color: white;
            padding: 80px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr repeat(3, 1fr);
            gap: 60px;
            margin-bottom: 60px;
        }

        .footer-brand p {
            color: rgba(255, 255, 255, 0.6);
            margin-top: 16px;
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
        }

        .footer-social a:hover {
            background: #8b4513;
            color: white;
            transform: translateY(-3px);
        }

        .footer-section h3 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 24px;
            color: white;
            font-size: 18px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 14px;
        }

        .footer-section a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 15px;
        }

        .footer-section a:hover {
            color: white;
            padding-left: 6px;
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
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                font-size: 17px;
            }

            .hero-stats {
                gap: 30px;
            }

            .stat-number {
                font-size: 28px;
            }

            .categories h2, .cta h2 {
                font-size: 32px;
            }

            .category-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 20px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .footer-brand {
                text-align: center;
            }

            .footer-brand p {
                max-width: 100%;
            }

            .footer-social {
                justify-content: center;
            }

            .footer-section {
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 60px 0 80px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .hero-stats {
                flex-direction: column;
                gap: 24px;
            }

            .auth-buttons {
                gap: 8px;
            }

            .btn {
                padding: 10px 16px;
                font-size: 13px;
            }

            .category-grid {
                grid-template-columns: 1fr 1fr;
                gap: 16px;
            }

            .overlay .actions {
                flex-direction: column;
            }
        }

        /* About Store Section */
        .about-store {
            padding: 100px 0;
            background: linear-gradient(180deg, #f5f1e8 0%, #faf9f7 100%);
        }

        .about-store-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .about-store-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 48px;
            color: #2c2416;
            margin-bottom: 16px;
        }

        .about-store-header p {
            color: #6b5d4f;
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }

        .about-store-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-store-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #2c2416;
            margin-bottom: 20px;
        }

        .about-store-info p {
            color: #6b5d4f;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .store-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 32px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(139, 69, 19, 0.15);
        }

        .feature-item i {
            color: #8b4513;
            font-size: 22px;
            width: 28px;
            text-align: center;
        }

        .feature-item span {
            font-size: 14px;
            font-weight: 600;
            color: #2c2416;
        }

        .store-contact-info {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .store-contact-info h4 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #2c2416;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .store-contact-info h4 i {
            color: #8b4513;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 16px;
            font-size: 15px;
            color: #6b5d4f;
        }

        .contact-item:last-child {
            margin-bottom: 0;
        }

        .contact-item i {
            color: #8b4513;
            width: 24px;
            text-align: center;
            font-size: 16px;
        }

        .store-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
        }

        .store-stat-card {
            background: white;
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .store-stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(139, 69, 19, 0.15);
            border-color: rgba(139, 69, 19, 0.2);
        }

        .store-stat-card.highlight {
            background: linear-gradient(135deg, #8b4513 0%, #a0522d 100%);
            border-color: #8b4513;
        }

        .store-stat-card.highlight .stat-icon,
        .store-stat-card.highlight .stat-value,
        .store-stat-card.highlight .stat-label {
            color: white;
        }

        .store-stat-card.highlight .stat-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(139, 69, 19, 0.1);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #8b4513;
            font-size: 24px;
        }

        .stat-value {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            font-weight: 700;
            color: #8b4513;
            margin-bottom: 6px;
        }

        .stat-label {
            font-size: 14px;
            color: #8a7a6a;
            font-weight: 500;
        }

        @media (max-width: 1024px) {
            .about-store-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        @media (max-width: 768px) {
            .about-store {
                padding: 60px 0;
            }

            .about-store-header h2 {
                font-size: 32px;
            }

            .store-features {
                grid-template-columns: 1fr;
            }

            .store-stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .store-stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-value {
                font-size: 28px;
            }
        }

        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
        }

        .whatsapp-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
            border-radius: 50%;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            color: white;
            font-size: 28px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: pulse-wa 2s infinite;
        }

        .whatsapp-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 30px rgba(37, 211, 102, 0.5);
        }

        .whatsapp-btn:hover .whatsapp-tooltip {
            opacity: 1;
            visibility: visible;
            transform: translateX(-10px);
        }

        .whatsapp-tooltip {
            position: absolute;
            right: 70px;
            top: 50%;
            transform: translateY(-50%) translateX(0);
            background: #2c2416;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .whatsapp-tooltip::after {
            content: '';
            position: absolute;
            right: -6px;
            top: 50%;
            transform: translateY(-50%);
            border-width: 6px;
            border-style: solid;
            border-color: transparent transparent transparent #2c2416;
        }

        @keyframes pulse-wa {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        @media (max-width: 768px) {
            .whatsapp-float {
                bottom: 20px;
                right: 20px;
            }

            .whatsapp-btn {
                width: 54px;
                height: 54px;
                font-size: 24px;
            }

            .whatsapp-tooltip {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <a href="#" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    BookHaven
                </a>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#categories">Categories</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <div class="auth-buttons">
                    @auth
                        @if(Auth::user()->isAdmin())
                            <a href="/admin/dashboard" class="btn btn-outline"><i class="fas fa-user-shield"></i> Dashboard Admin</a>
                        @else
                            <a href="/user/dashboard" class="btn btn-outline"><i class="fas fa-user"></i> Dashboard</a>
                        @endif
                        <form action="/logout" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                        </form>
                    @else
                        <a href="/login" class="btn btn-outline">Log in</a>
                        <a href="/register" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register</a>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container hero-content">
            <div class="hero-badge">
                <i class="fas fa-star"></i>
                Temukan Buku Favorit Anda
            </div>
            <h1>Your <span>Literary</span> Sanctuary</h1>
            <p>Jelajahi ribuan koleksi buku, dari karya klasik hingga bestseller terbaru. Petualangan membaca Anda dimulai di sini.</p>
            <div class="hero-buttons">
                <a href="#categories" class="btn btn-primary btn-large"><i class="fas fa-compass"></i> Jelajahi Buku</a>
                <a href="#about" class="btn btn-outline btn-large"><i class="fas fa-info-circle"></i> Pelajari Lebih</a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">10K+</span>
                    <span class="stat-label">Koleksi Buku</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5K+</span>
                    <span class="stat-label">Pelanggan Puas</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">100+</span>
                    <span class="stat-label">Kategori</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories" id="categories">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">
                    <i class="fas fa-books"></i>
                    Koleksi Kami
                </div>
                <h2>Jelajahi Buku</h2>
                <p class="section-desc">Temukan berbagai pilihan buku menarik dari berbagai genre</p>
            </div>
            <div class="category-grid">
                @if(isset($books) && $books->count())
                    @foreach($books as $buku)
                        <div class="category-item" title="{{ $buku->Judul }}">
                            @if($buku->Cover)
                                <img class="cover-img" src="{{ asset('storage/' . $buku->Cover) }}" alt="{{ $buku->Judul }}" />
                            @else
                                <div class="no-cover">{{ $buku->Judul }}</div>
                            @endif
                            <div class="overlay">
                                <div class="title">{{ \Illuminate\Support\Str::limit($buku->Judul, 36) }}</div>
                                <div class="meta">{{ $buku->Pengarang }} &middot; {{ $buku->kategori?->Nama_Kategori ?? '' }}</div>
                                <div class="actions">
                                    <form action="/cart/add" method="POST" style="display:inline; flex:1;">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $buku->id }}" />
                                        <button type="submit" class="btn btn-outline"><i class="fas fa-cart-plus"></i> Keranjang</button>
                                    </form>
                                    <a href="/checkout?book={{ $buku->id }}" class="btn btn-white"><i class="fas fa-shopping-bag"></i> Beli</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <i class="fas fa-book-open"></i>
                        <p>Tidak ada buku untuk ditampilkan.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- About Store Section -->
    <section class="about-store" id="about">
        <div class="container">
            <div class="about-store-header">
                <div class="section-subtitle">
                    <i class="fas fa-store"></i>
                    Tentang Kami
                </div>
                <h2>Tentang Toko Kami</h2>
                <p>BookHaven - Surga Literasi Anda sejak 2020</p>
            </div>
            <div class="about-store-content">
                <div class="about-store-info">
                    <h3>Kenapa Memilih BookHaven?</h3>
                    <p>
                        <strong>BookHaven</strong> adalah toko buku online terpercaya yang menyediakan berbagai koleksi buku berkualitas
                        dari berbagai genre dan kategori. Kami berkomitmen untuk menjadi mitra literasi terbaik bagi para pembaca di Indonesia.
                    </p>
                    <p>
                        Didirikan dengan visi untuk membuat buku lebih mudah diakses oleh semua orang, kami terus berinovasi
                        untuk memberikan pengalaman berbelanja buku yang menyenangkan dan memuaskan.
                    </p>
                    <div class="store-features">
                        <div class="feature-item">
                            <i class="fas fa-truck-fast"></i>
                            <span>Pengiriman Cepat</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-check"></i>
                            <span>Produk Original</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-headset"></i>
                            <span>Layanan 24/7</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-undo"></i>
                            <span>Garansi Pengembalian</span>
                        </div>
                    </div>
                    <div class="store-contact-info" id="contact">
                        <h4><i class="fas fa-address-card"></i> Hubungi Kami</h4>
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Jl. Literasi No. 123, Jakarta Selatan, 12345</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>+62 21 1234 5678</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>info@bookhaven.id</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span>Senin - Jumat: 08:00 - 21:00 WIB</span>
                        </div>
                    </div>
                </div>
                <div class="store-stats-grid">
                    <div class="store-stat-card highlight">
                        <div class="stat-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-value">10K+</div>
                        <div class="stat-label">Koleksi Buku</div>
                    </div>
                    <div class="store-stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-value">5K+</div>
                        <div class="stat-label">Pelanggan Setia</div>
                    </div>
                    <div class="store-stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-folder"></i>
                        </div>
                        <div class="stat-value">100+</div>
                        <div class="stat-label">Kategori Buku</div>
                    </div>
                    <div class="store-stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-value">4.9</div>
                        <div class="stat-label">Rating Pelanggan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container cta-content">
            <h2>Mulai Perjalanan Membaca Anda</h2>
            <p>Bergabunglah dengan ribuan pembaca yang telah menemukan buku sempurna mereka bersama kami</p>
            <a href="/register" class="btn btn-white btn-large"><i class="fas fa-rocket"></i> Mulai Sekarang</a>
        </div>
    </section>

    <!-- Floating WhatsApp Button -->
    <div class="whatsapp-float">
        <a href="https://wa.me/6281280970700?text=Halo%20BookHaven%2C%20saya%20ingin%20bertanya%20tentang%20buku" target="_blank" class="whatsapp-btn" title="Hubungi Admin via WhatsApp">
            <i class="fab fa-whatsapp"></i>
            <span class="whatsapp-tooltip">Chat dengan Admin</span>
        </a>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section footer-brand">
                    <a href="#" class="logo" style="color: white;">
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
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Shipping Info</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Non-Fiction</a></li>
                        <li><a href="#">Best Sellers</a></li>
                        <li><a href="#">New Releases</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Connect</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Newsletter</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 BookHaven. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
