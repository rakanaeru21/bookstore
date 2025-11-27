<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BookHaven</title>
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

        /* Header */
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
            cursor: pointer;
        }

        .user-profile-dropdown {
            position: relative;
        }

        .user-info .dropdown-arrow {
            font-size: 10px;
            color: #78350f;
            margin-left: 4px;
            transition: transform 0.3s ease;
        }

        .user-info.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        .profile-dropdown {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            width: 320px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(120, 53, 15, 0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
            overflow: hidden;
        }

        .profile-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .profile-dropdown-header {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .profile-avatar-large {
            width: 56px;
            height: 56px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .profile-header-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .profile-name {
            font-weight: 700;
            font-size: 16px;
            color: white;
        }

        .profile-email {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.8);
        }

        .profile-dropdown-body {
            padding: 16px;
        }

        .profile-info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px;
            border-radius: 10px;
            transition: background 0.2s;
        }

        .profile-info-item:hover {
            background: #f5f5f4;
        }

        .profile-info-item i {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #78350f;
            font-size: 14px;
            flex-shrink: 0;
        }

        .profile-info-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }

        .profile-info-label {
            font-size: 11px;
            color: #78716c;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-info-value {
            font-size: 14px;
            color: #1c1917;
            font-weight: 500;
            word-break: break-word;
        }

        .profile-role-badge {
            display: inline-block;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            color: #78350f;
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .profile-dropdown-footer {
            padding: 16px;
            border-top: 1px solid #e7e5e4;
        }

        .btn-edit-profile {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-edit-profile:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.3);
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

        /* Hero Section */
        .hero {
            padding: 60px 0 70px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5ebe0 50%, #e6d5c3 100%);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
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

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-text {
            max-width: 100%;
        }

        .welcome-badge {
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

        .welcome-badge i {
            font-size: 12px;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 52px;
            color: #78350f;
            margin-bottom: 16px;
            line-height: 1.15;
            animation: fadeInUp 0.5s ease-out 0.1s backwards;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 18px;
            color: #92400e;
            margin-bottom: 32px;
            line-height: 1.7;
            max-width: 600px;
            animation: fadeInUp 0.5s ease-out 0.2s backwards;
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 36px;
            animation: fadeInUp 0.5s ease-out 0.3s backwards;
        }

        .stat-card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid rgba(120, 53, 15, 0.15);
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.06);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #92400e 0%, #78350f 100%);
            border-radius: 4px 0 0 4px;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(120, 53, 15, 0.12);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #78350f;
            font-size: 20px;
            margin-bottom: 16px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: #78350f;
            margin-bottom: 4px;
            font-family: 'Playfair Display', serif;
        }

        .stat-label {
            font-size: 14px;
            color: #92400e;
            font-weight: 500;
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

        /* Search and Filter Section */
        .search-filter-section {
            background: white;
            border-radius: 20px;
            padding: 28px;
            margin-top: 36px;
            box-shadow: 0 8px 30px rgba(120, 53, 15, 0.08);
            border: 1px solid rgba(120, 53, 15, 0.12);
            animation: fadeInUp 0.5s ease-out 0.4s backwards;
        }

        .search-filter-form {
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input-group {
            flex: 1;
            min-width: 320px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 16px 24px 16px 54px;
            border: 2px solid #d4c4b0;
            border-radius: 14px;
            font-size: 15px;
            background: #faf8f5;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
        }

        .search-input:focus {
            outline: none;
            border-color: #78350f;
            background: white;
            box-shadow: 0 0 0 4px rgba(120, 53, 15, 0.08);
        }

        .search-input::placeholder {
            color: #a8a29e;
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #92400e;
            font-size: 18px;
        }

        .filter-group {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-select {
            padding: 16px 20px;
            border: 2px solid #d4c4b0;
            border-radius: 14px;
            font-size: 14px;
            background: #faf8f5;
            color: #78350f;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
            font-weight: 500;
            min-width: 170px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2378350f' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
        }

        .filter-select:focus {
            outline: none;
            border-color: #78350f;
            background-color: white;
            box-shadow: 0 0 0 4px rgba(120, 53, 15, 0.08);
        }

        .search-btn {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            border: none;
            padding: 16px 28px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            font-family: 'Instrument Sans', sans-serif;
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.25);
        }

        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(120, 53, 15, 0.35);
        }

        .reset-btn {
            background: #f5f5f4;
            color: #57534e;
            border: 2px solid #e7e5e4;
            padding: 14px 22px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .reset-btn:hover {
            background: #e7e5e4;
            border-color: #d6d3d1;
            transform: translateY(-1px);
        }

        .search-results-info {
            margin-top: 20px;
            padding: 14px 20px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 12px;
            color: #78350f;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-results-info i {
            color: #92400e;
        }

        /* Section Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 36px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #1c1917;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #78350f 0%, #92400e 100%);
            border-radius: 2px;
        }

        .view-all {
            color: #78350f;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            background: rgba(120, 53, 15, 0.08);
            border-radius: 10px;
            transition: all 0.3s;
        }

        .view-all:hover {
            background: rgba(120, 53, 15, 0.15);
            gap: 12px;
        }

        /* Books Section */
        .books-section {
            padding: 70px 0;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 28px;
        }

        .book-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e7e5e4;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .book-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #78350f 0%, #92400e 50%, #78350f 100%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
            border-color: transparent;
        }

        .book-card:hover::before {
            opacity: 1;
        }

        .book-cover {
            aspect-ratio: 3/4;
            overflow: hidden;
            background: linear-gradient(135deg, #f5f5f4 0%, #e7e5e4 100%);
            position: relative;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .book-card:hover .book-cover img {
            transform: scale(1.08);
        }

        .no-cover {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px;
            text-align: center;
            color: #78350f;
            font-weight: 600;
            font-size: 15px;
            gap: 12px;
        }

        .no-cover i {
            font-size: 48px;
            opacity: 0.3;
        }

        .book-info {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .book-title {
            font-weight: 700;
            font-size: 16px;
            color: #1c1917;
            margin-bottom: 8px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-meta {
            font-size: 13px;
            color: #78716c;
            margin-bottom: 14px;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .book-author {
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .book-author i {
            color: #a8a29e;
            font-size: 11px;
        }

        .book-category {
            color: #92400e;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .book-category i {
            font-size: 11px;
        }

        .book-stock {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            font-size: 12px;
            padding: 6px 10px;
            border-radius: 6px;
            margin-top: 4px;
            width: fit-content;
        }

        .stock-available {
            background: #dcfce7;
            color: #16a34a;
        }

        .stock-limited {
            background: #f5ebe0;
            color: #92400e;
        }

        .stock-empty {
            background: #fee2e2;
            color: #dc2626;
        }

        .book-price {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            font-weight: 700;
            color: #78350f;
            margin: 12px 0;
        }

        .book-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: auto;
        }

        .btn-cart {
            background: transparent;
            color: #78350f;
            border: 2px solid #78350f;
            padding: 12px 18px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-cart:hover {
            background: #78350f;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(120, 53, 15, 0.25);
        }

        .btn-buy {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            border: none;
            padding: 14px 18px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.25);
        }

        .btn-buy:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(120, 53, 15, 0.35);
        }

        .btn-disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Category Section */
        .category-section {
            padding: 70px 0;
            background: linear-gradient(180deg, #faf9f7 0%, #f5f5f4 100%);
            border-top: 1px solid #e7e5e4;
            position: relative;
        }

        .category-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, #d4c4b0 50%, transparent 100%);
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            color: #78350f;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 100px 20px;
            color: #78716c;
            grid-column: 1 / -1;
        }

        .empty-state-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #f5f5f4 0%, #e7e5e4 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        .empty-state-icon i {
            font-size: 40px;
            color: #a8a29e;
        }

        .empty-state h3 {
            font-size: 22px;
            color: #57534e;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .empty-state p {
            font-size: 15px;
            color: #78716c;
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

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .books-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 16px;
            }

            .section-title {
                font-size: 28px;
            }

            .search-filter-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input-group {
                min-width: auto;
            }

            .filter-group {
                flex-direction: column;
            }

            .filter-select {
                width: 100%;
            }

            .search-btn, .reset-btn {
                width: 100%;
                justify-content: center;
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

        @media (max-width: 480px) {
            .hero {
                padding: 40px 0 50px;
            }

            .hero h1 {
                font-size: 28px;
            }

            .book-info {
                padding: 16px;
            }

            .book-title {
                font-size: 14px;
            }

            .book-price {
                font-size: 16px;
            }

            .btn-cart, .btn-buy {
                padding: 10px 14px;
                font-size: 12px;
            }
        }

        /* Floating Action Button */
        .floating-action-container {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 16px;
        }

        .floating-action-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 30px rgba(120, 53, 15, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: floatIn 0.5s ease-out;
        }

        @keyframes floatIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .floating-action-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 40px rgba(120, 53, 15, 0.5);
        }

        .floating-action-btn .fab-icon-main,
        .floating-action-btn .fab-icon-close {
            font-size: 22px;
            transition: all 0.3s ease;
            position: absolute;
        }

        .floating-action-btn .fab-icon-close {
            opacity: 0;
            transform: rotate(-90deg);
        }

        .floating-action-btn.active .fab-icon-main {
            opacity: 0;
            transform: rotate(90deg);
        }

        .floating-action-btn.active .fab-icon-close {
            opacity: 1;
            transform: rotate(0);
        }

        .floating-action-btn.active {
            background: linear-gradient(135deg, #292524 0%, #1c1917 100%);
        }

        .fab-main-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid white;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.4);
            animation: badgePop 0.3s ease-out;
        }

        @keyframes badgePop {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        /* FAB Menu */
        .fab-menu {
            display: flex;
            flex-direction: column;
            gap: 12px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fab-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .fab-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px 12px 12px;
            background: white;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            animation: fabItemIn 0.3s ease-out backwards;
        }

        .fab-menu.show .fab-item:nth-child(1) { animation-delay: 0.05s; }
        .fab-menu.show .fab-item:nth-child(2) { animation-delay: 0.1s; }
        .fab-menu.show .fab-item:nth-child(3) { animation-delay: 0.15s; }

        @keyframes fabItemIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fab-item:hover {
            transform: translateX(-8px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .fab-item-icon {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            position: relative;
            flex-shrink: 0;
        }

        .fab-cart .fab-item-icon {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
        }

        .fab-whatsapp .fab-item-icon {
            background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
            color: white;
        }

        .fab-item-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            border: 2px solid white;
        }

        .fab-item-label {
            font-weight: 600;
            font-size: 14px;
            color: #1c1917;
            white-space: nowrap;
        }

        .fab-item-info {
            font-size: 12px;
            color: #78716c;
            white-space: nowrap;
            margin-left: auto;
            padding-left: 12px;
        }

        .fab-cart .fab-item-info {
            color: #78350f;
            font-weight: 600;
        }

        /* FAB Backdrop */
        .fab-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 998;
        }

        .fab-backdrop.show {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 768px) {
            .floating-action-container {
                bottom: 20px;
                right: 20px;
            }

            .floating-action-btn {
                width: 56px;
                height: 56px;
            }

            .fab-item {
                padding: 10px 14px 10px 10px;
            }

            .fab-item-icon {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .fab-item-info {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .floating-action-container {
                bottom: 16px;
                right: 16px;
            }

            .floating-action-btn {
                width: 52px;
                height: 52px;
            }

            .floating-action-btn .fab-icon-main,
            .floating-action-btn .fab-icon-close {
                font-size: 20px;
            }

            .fab-main-badge {
                width: 20px;
                height: 20px;
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <a href="#hero" class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    BookHaven
                </a>
                <ul class="nav-links">
                    <li><a href="#hero"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#books"><i class="fas fa-book"></i> Jelajahi Buku</a></li>
                    <li><a href="#categories"><i class="fas fa-layer-group"></i> Kategori</a></li>
                </ul>
                <div class="user-section">
                    <div class="user-profile-dropdown">
                        <button class="user-info" onclick="toggleProfileDropdown()" type="button">
                            <div class="user-avatar">{{ strtoupper(substr($user->Nama_Lengkap, 0, 1)) }}{{ strtoupper(substr(explode(' ', $user->Nama_Lengkap)[1] ?? '', 0, 1)) }}</div>
                            <div class="user-details">
                                <span class="user-name">{{ $user->Nama_Lengkap }}</span>
                                <span class="user-role">{{ $user->Role }}</span>
                            </div>
                            <i class="fas fa-chevron-down dropdown-arrow"></i>
                        </button>
                        <div class="profile-dropdown" id="profileDropdown">
                            <div class="profile-dropdown-header">
                                <div class="profile-avatar-large">{{ strtoupper(substr($user->Nama_Lengkap, 0, 1)) }}{{ strtoupper(substr(explode(' ', $user->Nama_Lengkap)[1] ?? '', 0, 1)) }}</div>
                                <div class="profile-header-info">
                                    <span class="profile-name">{{ $user->Nama_Lengkap }}</span>
                                    <span class="profile-email">{{ $user->Email }}</span>
                                </div>
                            </div>
                            <div class="profile-dropdown-body">
                                <div class="profile-info-item">
                                    <i class="fas fa-user"></i>
                                    <div class="profile-info-content">
                                        <span class="profile-info-label">Nama Lengkap</span>
                                        <span class="profile-info-value">{{ $user->Nama_Lengkap }}</span>
                                    </div>
                                </div>
                                <div class="profile-info-item">
                                    <i class="fas fa-envelope"></i>
                                    <div class="profile-info-content">
                                        <span class="profile-info-label">Email</span>
                                        <span class="profile-info-value">{{ $user->Email }}</span>
                                    </div>
                                </div>
                                <div class="profile-info-item">
                                    <i class="fas fa-phone"></i>
                                    <div class="profile-info-content">
                                        <span class="profile-info-label">Telepon</span>
                                        <span class="profile-info-value">{{ $user->NoHp ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="profile-info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div class="profile-info-content">
                                        <span class="profile-info-label">Alamat</span>
                                        <span class="profile-info-value">{{ $user->Alamat ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="profile-info-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <div class="profile-info-content">
                                        <span class="profile-info-label">Role</span>
                                        <span class="profile-info-value profile-role-badge">{{ $user->Role }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-dropdown-footer">
                                <a href="{{ route('profile.edit') }}" class="btn-edit-profile">
                                    <i class="fas fa-edit"></i> Edit Profil
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                    </form>
                </div>
            </nav>
        </div>
    </header>

    <!-- Success Message -->
    @if(session('success'))
    <div class="container">
        <div class="success-message">
            <div class="success-icon"><i class="fas fa-check"></i></div>
            {{ session('success') }}
        </div>
    </div>
    @endif

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <div class="welcome-badge">
                        <i class="fas fa-sparkles"></i>
                        Selamat Datang Kembali!
                    </div>
                    <h1>Hai, <span>{{ $user->Nama_Lengkap }}</span>!</h1>
                    <p>Temukan petualangan baru dalam setiap halaman. Jelajahi koleksi buku pilihan kami yang telah dikurasi khusus untuk Anda.</p>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fas fa-books"></i></div>
                            <div class="stat-value">{{ $books->count() }}</div>
                            <div class="stat-label">Total Buku</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fas fa-folder-open"></i></div>
                            <div class="stat-value">{{ $categories->count() }}</div>
                            <div class="stat-label">Kategori</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fas fa-fire"></i></div>
                            <div class="stat-value">{{ $books->take(12)->count() }}</div>
                            <div class="stat-label">Buku Terbaru</div>
                        </div>
                    </div>

                    <!-- Search and Filter Section -->
                    <div class="search-filter-section">
                        <form method="GET" action="{{ route('user.dashboard') }}" class="search-filter-form">
                            <div class="search-input-group">
                                <div class="search-icon"><i class="fas fa-search"></i></div>
                                <input
                                    type="text"
                                    name="search"
                                    class="search-input"
                                    placeholder="Cari buku berdasarkan judul, pengarang, atau ISBN..."
                                    value="{{ request('search') }}"
                                >
                            </div>

                            <div class="filter-group">
                                <select name="kategori" class="filter-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id_kategori }}"
                                                {{ request('kategori') == $category->id_kategori ? 'selected' : '' }}>
                                            {{ $category->Nama_Kategori }}
                                        </option>
                                    @endforeach
                                </select>

                                <select name="sort" class="filter-select">
                                    <option value="">Urutkan</option>
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>A-Z</option>
                                </select>

                                <button type="submit" class="search-btn">
                                    <i class="fas fa-search"></i>
                                    <span>Cari</span>
                                </button>

                                @if(request('search') || request('kategori') || request('sort'))
                                    <a href="{{ route('user.dashboard') }}" class="reset-btn">
                                        <i class="fas fa-times"></i>
                                        Reset
                                    </a>
                                @endif
                            </div>
                        </form>

                        @if(request('search') || request('kategori'))
                            <div class="search-results-info">
                                <i class="fas fa-info-circle"></i>
                                @if(request('search') && request('kategori'))
                                    Menampilkan hasil untuk "{{ request('search') }}" dalam kategori "{{ $categories->find(request('kategori'))->Nama_Kategori ?? 'Tidak Ditemukan' }}"
                                @elseif(request('search'))
                                    Menampilkan hasil pencarian untuk "{{ request('search') }}"
                                @elseif(request('kategori'))
                                    Menampilkan buku kategori "{{ $categories->find(request('kategori'))->Nama_Kategori ?? 'Tidak Ditemukan' }}"
                                @endif
                                - Ditemukan {{ $filteredBooks->count() ?? $books->count() }} buku
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Books Section -->
    <section class="books-section" id="books">
        <div class="container">
            <div class="section-header">
                @if(request('search') || request('kategori'))
                    <h2 class="section-title">Hasil Pencarian</h2>
                @else
                    <h2 class="section-title">Buku Terbaru</h2>
                @endif
                <a href="#" class="view-all"><i class="fas fa-arrow-right"></i> Lihat Semua</a>
            </div>

            <div class="books-grid">
                @forelse((isset($filteredBooks) ? $filteredBooks : $books)->take(12) as $book)
                <div class="book-card">
                    <div class="book-cover">
                        @if($book->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($book->Cover))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($book->Cover) }}" alt="{{ $book->Judul }}">
                        @else
                            <div class="no-cover">
                                <i class="fas fa-book"></i>
                                {{ $book->Judul }}
                            </div>
                        @endif
                    </div>
                    <div class="book-info">
                        <h3 class="book-title">{{ $book->Judul }}</h3>
                        <div class="book-meta">
                            <span class="book-author"><i class="fas fa-user"></i> {{ $book->Pengarang }}</span>
                            <span class="book-category"><i class="fas fa-tag"></i> {{ $book->kategori->Nama_Kategori ?? 'Tidak ada kategori' }}</span>
                            @if($book->Stok > 0)
                                @if($book->Stok <= 5)
                                    <span class="book-stock stock-limited"><i class="fas fa-exclamation-triangle"></i> Stok: {{ $book->Stok }} (Terbatas)</span>
                                @else
                                    <span class="book-stock stock-available"><i class="fas fa-check-circle"></i> Stok: {{ $book->Stok }}</span>
                                @endif
                            @else
                                <span class="book-stock stock-empty"><i class="fas fa-times-circle"></i> Habis Stok</span>
                            @endif
                        </div>
                        <div class="book-price">Rp {{ number_format($book->Harga, 0, ',', '.') }}</div>
                        <div class="book-actions">
                            @if($book->Stok > 0)
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn btn-cart"><i class="fas fa-cart-plus"></i> Keranjang</button>
                                </form>
                                <form action="{{ route('cart.buyNow') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn-buy"><i class="fas fa-shopping-bag"></i> Beli Sekarang</button>
                                </form>
                            @else
                                <button class="btn btn-cart btn-disabled"><i class="fas fa-cart-plus"></i> Stok Habis</button>
                                <button class="btn-buy btn-disabled"><i class="fas fa-shopping-bag"></i> Stok Habis</button>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <div class="empty-state-icon"><i class="fas fa-book-open"></i></div>
                    <h3>Belum ada buku tersedia</h3>
                    <p>Silakan cek kembali nanti untuk koleksi terbaru.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Category Section -->
    @if($categories->isNotEmpty())
    @foreach($categories->take(3) as $category)
    @if($category->buku->isNotEmpty())
    <section class="category-section" id="categories">
        <div class="container">
            <div class="section-header">
                <div>
                    <div class="category-badge"><i class="fas fa-bookmark"></i> Kategori</div>
                    <h2 class="section-title">{{ $category->Nama_Kategori }}</h2>
                </div>
                <a href="#" class="view-all"><i class="fas fa-arrow-right"></i> Lihat Semua</a>
            </div>

            <div class="books-grid">
                @foreach($category->buku->take(4) as $book)
                <div class="book-card">
                    <div class="book-cover">
                        @if($book->Cover && \Illuminate\Support\Facades\Storage::disk('public')->exists($book->Cover))
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($book->Cover) }}" alt="{{ $book->Judul }}">
                        @else
                            <div class="no-cover">
                                <i class="fas fa-book"></i>
                                {{ $book->Judul }}
                            </div>
                        @endif
                    </div>
                    <div class="book-info">
                        <h3 class="book-title">{{ $book->Judul }}</h3>
                        <div class="book-meta">
                            <span class="book-author"><i class="fas fa-user"></i> {{ $book->Pengarang }}</span>
                            <span class="book-category"><i class="fas fa-tag"></i> {{ $category->Nama_Kategori }}</span>
                            @if($book->Stok > 0)
                                @if($book->Stok <= 5)
                                    <span class="book-stock stock-limited"><i class="fas fa-exclamation-triangle"></i> Stok: {{ $book->Stok }} (Terbatas)</span>
                                @else
                                    <span class="book-stock stock-available"><i class="fas fa-check-circle"></i> Stok: {{ $book->Stok }}</span>
                                @endif
                            @else
                                <span class="book-stock stock-empty"><i class="fas fa-times-circle"></i> Habis Stok</span>
                            @endif
                        </div>
                        <div class="book-price">Rp {{ number_format($book->Harga, 0, ',', '.') }}</div>
                        <div class="book-actions">
                            @if($book->Stok > 0)
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn btn-cart"><i class="fas fa-cart-plus"></i> Keranjang</button>
                                </form>
                                <form action="{{ route('cart.buyNow') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id_buku }}">
                                    <button type="submit" class="btn-buy"><i class="fas fa-shopping-bag"></i> Beli Sekarang</button>
                                </form>
                            @else
                                <button class="btn btn-cart btn-disabled"><i class="fas fa-cart-plus"></i> Stok Habis</button>
                                <button class="btn-buy btn-disabled"><i class="fas fa-shopping-bag"></i> Stok Habis</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    @endforeach
    @endif

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section footer-brand">
                    <a href="#" class="logo">
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

    <!-- Floating Action Button -->
    @php
        $cartFloat = session()->get('cart', []);
        $cartFloatCount = array_sum(array_column($cartFloat, 'qty'));
        $cartFloatTotal = 0;
        foreach($cartFloat as $item) {
            $cartFloatTotal += $item['Harga'] * $item['qty'];
        }
    @endphp
    <div class="floating-action-container">
        <!-- FAB Menu Items -->
        <div class="fab-menu" id="fabMenu">
            <a href="{{ route('cart.show') }}" class="fab-item fab-cart">
                <div class="fab-item-icon">
                    <i class="fas fa-shopping-cart"></i>
                    @if($cartFloatCount > 0)
                        <span class="fab-item-badge">{{ $cartFloatCount }}</span>
                    @endif
                </div>
                <span class="fab-item-label">Keranjang</span>
                @if($cartFloatCount > 0)
                    <span class="fab-item-info">Rp {{ number_format($cartFloatTotal, 0, ',', '.') }}</span>
                @endif
            </a>
            <a href="https://wa.me/6281280970700?text=Halo%20Admin%20BookHaven,%20saya%20ingin%20bertanya%20tentang%20produk" target="_blank" class="fab-item fab-whatsapp">
                <div class="fab-item-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <span class="fab-item-label">WhatsApp</span>
                <span class="fab-item-info">Hubungi Admin</span>
            </a>
        </div>

        <!-- Main FAB Button -->
        <button class="floating-action-btn" id="fabToggle" onclick="toggleFabMenu()">
            <i class="fas fa-plus fab-icon-main"></i>
            <i class="fas fa-times fab-icon-close"></i>
            @if($cartFloatCount > 0)
                <span class="fab-main-badge">{{ $cartFloatCount }}</span>
            @endif
        </button>
    </div>

    <script>
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            const userInfo = dropdown.previousElementSibling;

            dropdown.classList.toggle('show');
            userInfo.classList.toggle('active');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profileDropdown');
            const userProfileDropdown = document.querySelector('.user-profile-dropdown');

            if (!userProfileDropdown.contains(event.target)) {
                dropdown.classList.remove('show');
                document.querySelector('.user-info').classList.remove('active');
            }
        });

        // Close dropdown when pressing Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const dropdown = document.getElementById('profileDropdown');
                dropdown.classList.remove('show');
                document.querySelector('.user-info').classList.remove('active');
                closeFabMenu();
            }
        });

        // FAB Menu Functions
        function toggleFabMenu() {
            const fabMenu = document.getElementById('fabMenu');
            const fabToggle = document.getElementById('fabToggle');

            fabMenu.classList.toggle('show');
            fabToggle.classList.toggle('active');
        }

        function closeFabMenu() {
            const fabMenu = document.getElementById('fabMenu');
            const fabToggle = document.getElementById('fabToggle');

            fabMenu.classList.remove('show');
            fabToggle.classList.remove('active');
        }

        // Close FAB menu when clicking outside
        document.addEventListener('click', function(event) {
            const fabContainer = document.querySelector('.floating-action-container');
            if (fabContainer && !fabContainer.contains(event.target)) {
                closeFabMenu();
            }
        });
    </script>
</body>
</html>
