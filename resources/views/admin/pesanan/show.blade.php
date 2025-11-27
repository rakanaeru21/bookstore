<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }} - BookHaven Admin</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700|poppins:600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #8b4513;
            --primary-dark: #6d3610;
            --primary-light: #a0522d;
            --secondary: #d2691e;
            --accent: #cd853f;
            --success: #28a745;
            --warning: #f59e0b;
            --danger: #dc3545;
            --info: #3b82f6;
            --purple: #8b5cf6;
            --dark: #2c2416;
            --gray-900: #1a1a1a;
            --gray-800: #2c2416;
            --gray-700: #4a3f35;
            --gray-600: #6b5d4f;
            --gray-500: #8b7355;
            --gray-400: #a89985;
            --gray-300: #d4c4b0;
            --gray-200: #e8dcc8;
            --gray-100: #f5f0e8;
            --gray-50: #faf8f5;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-50);
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        /* Sidebar Toggle */
        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 12px 14px;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            background: var(--primary-dark);
        }

        .sidebar-toggle i {
            font-size: 18px;
        }

        /* Collapsible Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -280px;
            width: 280px;
            height: 100vh;
            background: var(--white);
            box-shadow: var(--shadow-xl);
            z-index: 1000;
            transition: left 0.3s ease;
            overflow-y: auto;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-header {
            padding: 24px 20px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sidebar-brand {
            flex: 1;
        }

        .sidebar-title {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-title i {
            font-size: 20px;
        }

        .sidebar-subtitle {
            font-size: 13px;
            opacity: 0.9;
        }

        .sidebar-close {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: background 0.2s ease;
        }

        .sidebar-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .sidebar-menu {
            padding: 16px 12px;
        }

        .menu-section {
            margin-bottom: 8px;
        }

        .menu-section-title {
            font-size: 11px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 14px 8px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            text-decoration: none;
            color: var(--gray-600);
            transition: all 0.2s ease;
            border-radius: 10px;
            margin: 2px 0;
            font-weight: 500;
        }

        .menu-item:hover {
            background: var(--gray-100);
            color: var(--primary);
        }

        .menu-item.active {
            background: rgba(139, 69, 19, 0.1);
            color: var(--primary);
            font-weight: 600;
        }

        .menu-icon {
            margin-right: 12px;
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
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
            background: var(--white);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--gray-200);
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 22px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--gray-50);
            padding: 8px 16px 8px 8px;
            border-radius: 50px;
            border: 1px solid var(--gray-200);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 15px;
        }

        .user-details {
            line-height: 1.3;
        }

        .welcome-text {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 14px;
            display: block;
        }

        .role-badge {
            background: var(--primary);
            color: white;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--gray-500);
            text-decoration: none;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 10px;
            transition: all 0.2s ease;
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            cursor: pointer;
        }

        .logout-btn:hover {
            color: var(--danger);
            background: rgba(220, 53, 69, 0.1);
            border-color: rgba(220, 53, 69, 0.3);
        }

        /* Main Content */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px 24px;
        }

        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            color: var(--gray-500);
        }

        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .breadcrumb a:hover {
            color: var(--primary-dark);
        }

        .breadcrumb i {
            font-size: 12px;
            color: var(--gray-400);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-header-info {
            flex: 1;
        }

        .page-title {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title-icon {
            width: 44px;
            height: 44px;
            background: var(--primary);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .page-subtitle {
            color: var(--gray-500);
            font-size: 15px;
            margin-left: 56px;
        }

        /* Success/Error Messages */
        .success-message {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.2);
            color: #155724;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message i {
            font-size: 18px;
            color: var(--success);
        }

        .error-message {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.2);
            color: #721c24;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .error-message i {
            font-size: 18px;
            color: var(--danger);
        }

        /* Detail Grid */
        .detail-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 24px;
        }

        /* Cards */
        .detail-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--gray-200);
            background: var(--gray-50);
        }

        .card-title {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-900);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--primary);
        }

        .card-body {
            padding: 24px;
        }

        /* Order Items */
        .order-item {
            display: flex;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 70px;
            height: 90px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--gray-200);
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image {
            color: var(--gray-400);
            font-size: 11px;
            text-align: center;
            font-weight: 500;
            padding: 8px;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            font-size: 15px;
            color: var(--gray-900);
            margin-bottom: 6px;
        }

        .item-meta {
            font-size: 13px;
            color: var(--gray-500);
            margin-bottom: 8px;
        }

        .item-price {
            font-weight: 700;
            color: var(--primary);
            font-size: 15px;
        }

        /* Total Summary */
        .total-summary {
            background: var(--gray-50);
            padding: 20px;
            border-radius: 12px;
            margin-top: 16px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
            color: var(--gray-600);
        }

        .summary-row:last-child {
            margin-bottom: 0;
            font-weight: 700;
            color: var(--primary);
            font-size: 16px;
            border-top: 1px solid var(--gray-200);
            padding-top: 12px;
        }

        /* Info Rows */
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-100);
            font-size: 14px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--gray-500);
            font-weight: 500;
        }

        .info-value {
            font-weight: 600;
            color: var(--gray-800);
            text-align: right;
        }

        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.1);
            color: #b45309;
        }

        .status-success {
            background: rgba(40, 167, 69, 0.1);
            color: #15803d;
        }

        .status-processing {
            background: rgba(59, 130, 246, 0.1);
            color: #1d4ed8;
        }

        .status-shipped {
            background: rgba(139, 92, 246, 0.1);
            color: #6d28d9;
        }

        .status-rejected {
            background: rgba(220, 53, 69, 0.1);
            color: #b91c1c;
        }

        /* Bukti Pembayaran */
        .payment-proof-container {
            text-align: center;
        }

        .payment-proof-img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 12px;
            border: 2px solid var(--gray-200);
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .payment-proof-img:hover {
            border-color: var(--primary);
            transform: scale(1.02);
            box-shadow: var(--shadow-md);
        }

        .proof-caption {
            margin-top: 10px;
            font-size: 12px;
            color: var(--gray-500);
            font-style: italic;
        }

        .no-proof-state {
            text-align: center;
            padding: 40px 20px;
        }

        .no-proof-icon {
            font-size: 48px;
            color: var(--gray-300);
            margin-bottom: 16px;
        }

        .no-proof-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }

        .no-proof-description {
            color: var(--gray-500);
            font-size: 14px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--gray-200);
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            background: var(--white);
            color: var(--gray-800);
            transition: all 0.2s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Buttons */
        .btn {
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        .btn-secondary {
            background: var(--gray-100);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .btn-secondary:hover {
            background: var(--gray-200);
        }

        .btn-block {
            width: 100%;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .button-group .btn {
            flex: 1;
        }

        /* Modal */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 90vw;
            max-height: 90vh;
            background: var(--white);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow-xl);
        }

        .modal-header {
            padding: 16px 20px;
            background: var(--primary);
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
            transition: background 0.2s;
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

        /* Responsive */
        @media (max-width: 1024px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 12px;
                text-align: center;
                padding: 0 16px;
            }

            .user-menu {
                flex-direction: column;
                gap: 10px;
            }

            .main-container {
                padding: 20px 16px;
            }

            .page-header {
                flex-direction: column;
            }

            .page-title {
                font-size: 22px;
            }

            .page-subtitle {
                margin-left: 0;
                margin-top: 8px;
            }

            .button-group {
                flex-direction: column;
            }

            .sidebar-toggle {
                top: 16px;
                left: 16px;
            }

            .order-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .item-image {
                width: 100%;
                height: 150px;
            }
        }

        /* Smooth scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-300);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-400);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const sidebarClose = document.getElementById('sidebarClose');
            const body = document.body;

            function openSidebar() {
                sidebar.classList.add('open');
                sidebarOverlay.classList.add('show');
                sidebarToggle.style.opacity = '0';
                sidebarToggle.style.visibility = 'hidden';
                if (window.innerWidth > 768) {
                    body.classList.add('sidebar-open');
                }
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                sidebarOverlay.classList.remove('show');
                sidebarToggle.style.opacity = '1';
                sidebarToggle.style.visibility = 'visible';
                body.classList.remove('sidebar-open');
            }

            if (sidebarToggle) sidebarToggle.addEventListener('click', openSidebar);
            if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
            if (sidebarClose) sidebarClose.addEventListener('click', closeSidebar);

            // Image Modal Functions
            window.openImageModal = function(imageSrc) {
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

                    modal.addEventListener('click', function(e) {
                        if (e.target === modal) {
                            closeImageModal();
                        }
                    });

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
            <div class="sidebar-brand">
                <div class="sidebar-title"><i class="fas fa-book-open"></i> BookHaven</div>
                <div class="sidebar-subtitle">Admin Control Panel</div>
            </div>
            <button class="sidebar-close" id="sidebarClose">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-section-title">Menu Utama</div>
                <a href="{{ route('admin.dashboard') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-th-large"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-section-title">Manajemen</div>
                <a href="{{ url('/admin/user') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-users"></i></span>
                    <span class="menu-text">Kelola Pengguna</span>
                </a>
                <a href="{{ route('admin.buku.index') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-book"></i></span>
                    <span class="menu-text">Kelola Buku</span>
                </a>
                <a href="{{ route('admin.kategori.index') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-folder"></i></span>
                    <span class="menu-text">Kelola Kategori</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-section-title">Transaksi</div>
                <a href="{{ route('admin.pesanan.index') }}" class="menu-item active">
                    <span class="menu-icon"><i class="fas fa-shopping-bag"></i></span>
                    <span class="menu-text">Kelola Pesanan</span>
                </a>
            </div>
        </nav>
    </div>

    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-book-reader"></i>
                BookHaven Admin
            </div>
            <div class="user-menu">
                <div class="user-info">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->Nama_Lengkap, 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <span class="welcome-text">{{ auth()->user()->Nama_Lengkap }}</span>
                        <span class="role-badge">{{ auth()->user()->Role }}</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('admin.pesanan.index') }}">
                <i class="fas fa-shopping-bag"></i> Kelola Pesanan
            </a>
            <i class="fas fa-chevron-right"></i>
            <span>Detail Pesanan</span>
        </div>

        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="page-header">
            <div class="page-header-info">
                <h1 class="page-title">
                    <div class="page-title-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    Pesanan #{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}
                </h1>
                <p class="page-subtitle">Detail lengkap pesanan dari {{ $transaksi->nama_customer }}</p>
            </div>
        </div>

        <div class="detail-grid">
            <!-- Main Content Column -->
            <div>
                <!-- Order Items -->
                <div class="detail-card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-box"></i>
                            Detail Pesanan
                        </h2>
                    </div>
                    <div class="card-body">
                        @foreach($details as $detail)
                            <div class="order-item">
                                <div class="item-image">
                                    @if(!empty($detail->Cover) && \Illuminate\Support\Facades\Storage::disk('public')->exists($detail->Cover))
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($detail->Cover) }}" alt="{{ $detail->Judul }}">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-book" style="font-size: 24px; color: var(--gray-300);"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="item-info">
                                    <div class="item-name">{{ $detail->Judul }}</div>
                                    <div class="item-meta">
                                        <i class="fas fa-times"></i> {{ $detail->kuantiti }} × Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}
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
                </div>

                <!-- Bukti Pembayaran -->
                @if($transaksi->metode_pembayaran == 'transfer' || $transaksi->metode_pembayaran == 'qris')
                    <div class="detail-card">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fas fa-image"></i>
                                Bukti Pembayaran
                            </h2>
                        </div>
                        <div class="card-body">
                            @if($transaksi->Bukti_Pembayaran)
                                <div class="payment-proof-container">
                                    <img src="{{ asset('storage/' . $transaksi->Bukti_Pembayaran) }}"
                                         alt="Bukti Pembayaran"
                                         class="payment-proof-img"
                                         onclick="openImageModal('{{ asset('storage/' . $transaksi->Bukti_Pembayaran) }}')">
                                    <p class="proof-caption">
                                        <i class="fas fa-search-plus"></i> Klik gambar untuk memperbesar
                                    </p>
                                </div>
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
                    </div>
                @endif
            </div>

            <!-- Sidebar Column -->
            <div>
                <!-- Transaction Info -->
                <div class="detail-card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-info-circle"></i>
                            Informasi Transaksi
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="info-row">
                            <span class="info-label">Customer</span>
                            <span class="info-value">{{ $transaksi->nama_customer }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email</span>
                            <span class="info-value">{{ $transaksi->Email }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Tanggal Pesanan</span>
                            <span class="info-value">{{ \Carbon\Carbon::parse($transaksi->Tanggal_Transaksi)->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Metode Pembayaran</span>
                            <span class="info-value">
                                @if($transaksi->metode_pembayaran == 'transfer')
                                    <i class="fas fa-university"></i> Transfer Bank
                                @else
                                    <i class="fas fa-hand-holding-usd"></i> Cash on Delivery
                                @endif
                            </span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Status Pembayaran</span>
                            <span class="info-value">
                                @if($transaksi->Status_Pembayaran == 'Menunggu')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock"></i> Menunggu
                                    </span>
                                @elseif($transaksi->Status_Pembayaran == 'Menunggu Verifikasi')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-hourglass-half"></i> Menunggu Verifikasi
                                    </span>
                                @elseif($transaksi->Status_Pembayaran == 'Berhasil')
                                    <span class="status-badge status-success">
                                        <i class="fas fa-check-circle"></i> Berhasil
                                    </span>
                                @else
                                    <span class="status-badge status-rejected">
                                        <i class="fas fa-times-circle"></i> Gagal
                                    </span>
                                @endif
                            </span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Status Pesanan</span>
                            <span class="info-value">
                                @if($transaksi->Status == 'Pending')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock"></i> Pending
                                    </span>
                                @elseif($transaksi->Status == 'Menunggu Konfirmasi')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-hourglass-half"></i> Menunggu Konfirmasi
                                    </span>
                                @elseif($transaksi->Status == 'Diproses')
                                    <span class="status-badge status-processing">
                                        <i class="fas fa-cog"></i> Diproses
                                    </span>
                                @elseif($transaksi->Status == 'Dikirim')
                                    <span class="status-badge status-shipped">
                                        <i class="fas fa-truck"></i> Dikirim
                                    </span>
                                @elseif($transaksi->Status == 'Selesai')
                                    <span class="status-badge status-success">
                                        <i class="fas fa-check-double"></i> Selesai
                                    </span>
                                @else
                                    <span class="status-badge status-rejected">
                                        <i class="fas fa-ban"></i> Ditolak
                                    </span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Shipping Info -->
                <div class="detail-card">
                    <div class="card-header">
                        <h2 class="card-title">
                            <i class="fas fa-truck"></i>
                            Informasi Pengiriman
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="info-row">
                            <span class="info-label">Alamat</span>
                            <span class="info-value">{{ $transaksi->alamat_pengiriman }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">No. Telepon</span>
                            <span class="info-value">{{ $transaksi->nomor_telepon }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Ekspedisi</span>
                            <span class="info-value">{{ $transaksi->Ekspedisi }}</span>
                        </div>
                        @if($transaksi->nomor_resi)
                            <div class="info-row">
                                <span class="info-label">No. Resi</span>
                                <span class="info-value">{{ $transaksi->nomor_resi }}</span>
                            </div>
                        @endif
                        @if($transaksi->catatan)
                            <div class="info-row">
                                <span class="info-label">Catatan</span>
                                <span class="info-value">{{ $transaksi->catatan }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Actions: Verifikasi Pembayaran -->
                @if($transaksi->Status_Pembayaran == 'Menunggu Verifikasi' && $transaksi->Bukti_Pembayaran)
                    <div class="detail-card">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fas fa-check-double"></i>
                                Verifikasi Pembayaran
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pesanan.update-status', $transaksi->id_transaksi) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-label" for="catatan_admin">Catatan Admin (Opsional)</label>
                                    <textarea class="form-textarea" id="catatan_admin" name="catatan_admin" placeholder="Tambahkan catatan jika diperlukan..."></textarea>
                                </div>

                                <div class="button-group">
                                    <button type="submit" name="status" value="approve" class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        Setujui
                                    </button>
                                    <button type="submit" name="status" value="reject" class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                        Tolak
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Actions: Update Status Pembayaran -->
                @if(($transaksi->Status_Pembayaran == 'Menunggu Verifikasi' || $transaksi->Status_Pembayaran == 'Berhasil') && $transaksi->Bukti_Pembayaran)
                    <div class="detail-card">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fas fa-edit"></i>
                                Kelola Status Pembayaran
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pesanan.update-payment', $transaksi->id_transaksi) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-label">Status Pembayaran</label>
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
                                    <label class="form-label" for="catatan_admin_payment">Catatan Admin (Opsional)</label>
                                    <textarea class="form-textarea" id="catatan_admin_payment" name="catatan_admin" placeholder="Tambahkan catatan untuk customer jika diperlukan...">{{ $transaksi->catatan_admin }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-save"></i>
                                    Update Status Pembayaran
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Actions: Update Pengiriman -->
                @if($transaksi->Status == 'Diproses' && $transaksi->Status_Pembayaran == 'Berhasil')
                    <div class="detail-card">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fas fa-shipping-fast"></i>
                                Update Pengiriman
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pesanan.update-delivery', $transaksi->id_transaksi) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label class="form-label" for="nomor_resi">Nomor Resi (Opsional)</label>
                                    <input type="text" class="form-input" id="nomor_resi" name="nomor_resi" placeholder="Masukkan nomor resi...">
                                </div>

                                <button type="submit" name="status" value="dikirim" class="btn btn-primary btn-block">
                                    <i class="fas fa-truck"></i>
                                    Tandai Dikirim
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Actions: Selesaikan Pesanan -->
                @if($transaksi->Status == 'Dikirim')
                    <div class="detail-card">
                        <div class="card-header">
                            <h2 class="card-title">
                                <i class="fas fa-flag-checkered"></i>
                                Selesaikan Pesanan
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.pesanan.update-delivery', $transaksi->id_transaksi) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <button type="submit" name="status" value="selesai" class="btn btn-success btn-block">
                                    <i class="fas fa-check-circle"></i>
                                    Tandai Selesai
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Back Button -->
                <div class="detail-card">
                    <div class="card-body">
                        <a href="{{ route('admin.pesanan.index') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Daftar Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
