<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BookHaven</title>
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
            color: #a71e2a;
        }

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #6b5d4f;
            margin-bottom: 40px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(139, 69, 19, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: white;
            font-size: 24px;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .stat-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transition: all 0.3s ease;
            transform: translate(-50%, -50%);
        }

        .stat-card:hover .stat-icon::after {
            width: 100px;
            height: 100px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #2c2416;
            margin-bottom: 8px;
            position: relative;
        }

        .stat-counter {
            display: inline-block;
            opacity: 0;
            animation: countUp 2s ease-out forwards;
        }

        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-label {
            color: #6b5d4f;
            font-weight: 500;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-trend {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 12px;
            font-weight: 600;
        }

        .trend-up {
            background: #d4edda;
            color: #155724;
        }

        .trend-down {
            background: #f8d7da;
            color: #721c24;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 24px;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            background: #f8f9fa;
            border: 2px solid #e8dcc8;
            border-radius: 12px;
            text-decoration: none;
            color: #2c2416;
            font-weight: 500;
            transition: all 0.3s;
        }

        .action-btn:hover {
            background: #8b4513;
            color: white;
            border-color: #8b4513;
        }

        .action-icon {
            font-size: 18px;
        }

        /* Recent Activity */
        .recent-activity {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #f0f0f0;
            opacity: 0;
            transform: translateX(-20px);
            animation: slideInLeft 0.5s ease forwards;
        }

        .activity-item:nth-child(1) { animation-delay: 0.1s; }
        .activity-item:nth-child(2) { animation-delay: 0.2s; }
        .activity-item:nth-child(3) { animation-delay: 0.3s; }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
            position: relative;
            overflow: hidden;
        }

        .activity-avatar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            transform: translateX(-100%);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            50% { transform: translateX(100%); }
            100% { transform: translateX(100%); }
        }

        .activity-content {
            flex: 1;
        }

        .activity-text {
            color: #2c2416;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .activity-time {
            color: #6b5d4f;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .activity-time::before {
            content: '';
            font-size: 12px;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
        }

        /* Real-time notifications */
        .notification-badge {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            max-width: 350px;
        }

        .notification {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 12px;
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
            transform: translateX(400px);
            animation: slideInRight 0.5s ease forwards;
            position: relative;
            overflow: hidden;
        }

        .notification::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: notificationShimmer 2s ease-in-out;
        }

        @keyframes slideInRight {
            to {
                transform: translateX(0);
            }
        }

        @keyframes notificationShimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .notification-close {
            position: absolute;
            top: 8px;
            right: 12px;
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 18px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }

        .notification-close:hover {
            opacity: 1;
        }

        /* Success Message */
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .success-message::before {
            content: "✓";
            font-weight: bold;
            color: #28a745;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 16px;
                text-align: center;
            }

            .user-menu {
                flex-direction: column;
                gap: 12px;
            }

            .main-container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 28px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .chart-container {
                height: 250px;
            }
        }

        /* Interactive Charts */
        .chart-section {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
            margin-bottom: 40px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .chart-title {
            font-size: 20px;
            font-weight: 600;
            color: #2c2416;
        }

        .chart-filters {
            display: flex;
            gap: 8px;
        }

        .filter-btn {
            padding: 8px 16px;
            border: 1px solid #e8dcc8;
            background: white;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: #8b4513;
            color: white;
            border-color: #8b4513;
        }

        .filter-btn:hover:not(.active) {
            background: #f8f9fa;
            border-color: #8b4513;
        }

        .chart-container {
            height: 300px;
            position: relative;
            margin-top: 20px;
        }

        .chart-placeholder {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f8f9fa, #e8dcc8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b5d4f;
            font-size: 16px;
            position: relative;
            overflow: hidden;
        }

        .chart-placeholder::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(139, 69, 19, 0.1), transparent);
            animation: chartShimmer 3s ease-in-out infinite;
        }

        @keyframes chartShimmer {
            0% { left: -100%; }
            50% { left: 100%; }
            100% { left: 100%; }
        }

        /* Animated Progress Bars */
        .progress-bar {
            background: #e8dcc8;
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            margin: 8px 0;
        }

        .progress-fill-animated {
            height: 100%;
            background: linear-gradient(90deg, #8b4513, #a0522d);
            border-radius: 4px;
            width: 0%;
            animation: progressFill 2s ease-out forwards;
        }

        @keyframes progressFill {
            to {
                width: var(--progress);
            }
        }

        /* Pulsing Elements */
        .pulse {
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.02);
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

            // Animated counter for stats
            function animateCounter(element, target) {
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    } else {
                        element.textContent = Math.floor(current);
                    }
                }, 20);
            }

            // Trigger counter animations when cards come into view
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target.querySelector('.stat-counter');
                        if (counter && !counter.classList.contains('animated')) {
                            counter.classList.add('animated');
                            const target = parseInt(counter.textContent);
                            counter.textContent = '0';
                            setTimeout(() => animateCounter(counter, target), 500);
                        }
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.stat-card').forEach(card => {
                observer.observe(card);
            });

            // Real-time notifications
            function showNotification(message, type = 'success') {
                const notificationBadge = document.getElementById('notificationBadge');
                const notification = document.createElement('div');
                notification.className = `notification notification-${type}`;

                notification.innerHTML = `
                    <div>${message}</div>
                    <button class="notification-close" onclick="this.parentElement.remove()">&times;</button>
                `;

                notificationBadge.appendChild(notification);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.style.animation = 'slideOutRight 0.5s ease forwards';
                        setTimeout(() => notification.remove(), 500);
                    }
                }, 5000);
            }

            // Simulate real-time updates
            setTimeout(() => {
                showNotification('Dashboard berhasil dimuat!', 'success');
            }, 2000);

            setTimeout(() => {
                showNotification('Data terbaru telah disinkronisasi', 'info');
            }, 5000);

            // Chart functionality
            let currentChart = null;
            const chartFilters = document.querySelectorAll('.filter-btn');

            chartFilters.forEach(btn => {
                btn.addEventListener('click', function() {
                    chartFilters.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    updateChart(this.dataset.period);
                });
            });

            function updateChart(period) {
                // Simulate chart data based on period
                const data = {
                    '7d': {
                        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                        data: [12, 19, 8, 15, 25, 22, 18]
                    },
                    '30d': {
                        labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                        data: [45, 52, 38, 61]
                    },
                    '12m': {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                        data: [120, 135, 98, 142, 165, 178, 156, 189, 203, 187, 221, 245]
                    }
                };

                createChart(data[period]);
            }

            function createChart(data) {
                const ctx = document.getElementById('activityChart');
                const placeholder = document.getElementById('chartPlaceholder');

                // Check if Chart.js is loaded
                if (typeof Chart === 'undefined') {
                    ctx.style.display = 'none';
                    placeholder.style.display = 'flex';
                    return;
                }

                if (!ctx) return;

                ctx.style.display = 'block';
                placeholder.style.display = 'none';

                if (currentChart) {
                    currentChart.destroy();
                }

                currentChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Aktivitas',
                            data: data.data,
                            borderColor: '#8b4513',
                            backgroundColor: 'rgba(139, 69, 19, 0.1)',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#8b4513',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 6,
                            pointHoverRadius: 8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(139, 69, 19, 0.1)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        },
                        elements: {
                            line: {
                                borderCapStyle: 'round'
                            }
                        },
                        animation: {
                            duration: 2000,
                            easing: 'easeOutQuart'
                        }
                    }
                });
            }

            // Initialize chart with default data
            updateChart('7d');

            // Add smooth scrolling to all internal links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });

        // Add CSS animation keyframes for notifications
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOutRight {
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
            .notification-info {
                background: linear-gradient(135deg, #17a2b8, #20c997);
            }
        `;
        document.head.appendChild(style);
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
            <a href="{{ route('admin.dashboard') }}" class="menu-item active">
                <span class="menu-icon"><i class="fas fa-tachometer-alt"></i></span>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('/admin/user') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-users"></i></span>
                <span>Kelola Pengguna</span>
            </a>
            <a href="{{ url('/admin/buku') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-book"></i></span>
                <span>Kelola Buku</span>
            </a>
            <a href="{{ url('/admin/kategori') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-tags"></i></span>
                <span>Kelola Kategori</span>
            </a>
            <a href="{{ url('/admin/pesanan') }}" class="menu-item">
                <span class="menu-icon"><i class="fas fa-clipboard-list"></i></span>
                <span>Kelola Pesanan</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Overlay for mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Notification Badge -->
    <div class="notification-badge" id="notificationBadge"></div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <div class="logo">BookHaven Admin</div>
            <div class="user-menu">
                <span class="welcome-text">Selamat datang, {{ $user->Nama_Lengkap }}</span>
                <span class="role-badge">{{ $user->Role }}</span>
                <a href="/logout" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
            </div>
        </div>
    </header>

    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Main Content -->
    <main class="main-container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="page-title">Dashboard Admin</h1>
        <p class="page-subtitle">Kelola sistem BookHaven dengan mudah dan efisien</p>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-trend trend-up">+12%</div>
                <div class="stat-icon"><i class="fas fa-users"></i></div>
                <div class="stat-number"><span class="stat-counter">{{ $totalUsers }}</span></div>
                <div class="stat-label">Total Pengguna</div>
                <div class="progress-bar">
                    <div class="progress-fill-animated" style="--progress: 75%"></div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-trend trend-up">+5%</div>
                <div class="stat-icon"><i class="fas fa-user-shield"></i></div>
                <div class="stat-number"><span class="stat-counter">{{ $totalAdmins }}</span></div>
                <div class="stat-label">Total Admin</div>
                <div class="progress-bar">
                    <div class="progress-fill-animated" style="--progress: 60%"></div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-trend trend-up">+28%</div>
                <div class="stat-icon"><i class="fas fa-book"></i></div>
                <div class="stat-number"><span class="stat-counter">0</span></div>
                <div class="stat-label">Total Buku</div>
                <div class="progress-bar">
                    <div class="progress-fill-animated" style="--progress: 40%"></div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-trend trend-down">-3%</div>
                <div class="stat-icon"><i class="fas fa-chart-bar"></i></div>
                <div class="stat-number"><span class="stat-counter">0</span></div>
                <div class="stat-label">Total Transaksi</div>
                <div class="progress-bar">
                    <div class="progress-fill-animated" style="--progress: 85%"></div>
                </div>
            </div>
        </div>

        <!-- Interactive Chart Section -->
        <div class="chart-section">
            <div class="chart-header">
                <h2 class="chart-title">Aktivitas Sistem</h2>
                <div class="chart-filters">
                    <button class="filter-btn active" data-period="7d">7 Hari</button>
                    <button class="filter-btn" data-period="30d">30 Hari</button>
                    <button class="filter-btn" data-period="12m">12 Bulan</button>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="activityChart"></canvas>
                <div class="chart-placeholder" id="chartPlaceholder" style="display: none;">
                    <i class="fas fa-chart-line"></i> Chart akan dimuat di sini...
                </div>
            </div>
        </div>

    </main>
</body>
</html>


