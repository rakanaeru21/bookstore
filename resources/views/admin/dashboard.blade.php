<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BookHaven</title>
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

        .page-header {
            margin-bottom: 32px;
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

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            padding: 24px;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            transition: box-shadow 0.2s ease;
        }

        .stat-card:hover {
            box-shadow: var(--shadow-md);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .stat-card.users .stat-icon { background: var(--primary); }
        .stat-card.admins .stat-icon { background: var(--secondary); }
        .stat-card.books .stat-icon { background: var(--accent); }
        .stat-card.transactions .stat-icon { background: var(--primary-light); }

        .stat-trend {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .trend-up {
            background: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        .trend-down {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        .stat-content {
            position: relative;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 4px;
            line-height: 1.2;
        }

        .stat-label {
            color: var(--gray-500);
            font-weight: 500;
            font-size: 14px;
        }

        .stat-progress {
            margin-top: 14px;
        }

        .progress-bar {
            background: var(--gray-200);
            height: 6px;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 10px;
            width: var(--progress);
        }

        .stat-card.users .progress-fill { background: var(--primary); }
        .stat-card.admins .progress-fill { background: var(--secondary); }
        .stat-card.books .progress-fill { background: var(--accent); }
        .stat-card.transactions .progress-fill { background: var(--primary-light); }

        /* Quick Actions */
        .quick-actions {
            background: var(--white);
            padding: 28px;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            margin-bottom: 32px;
        }

        .section-header {
            margin-bottom: 20px;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 20px 16px;
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 14px;
            text-decoration: none;
            color: var(--gray-700);
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s ease;
            text-align: center;
        }

        .action-btn:hover {
            background: var(--white);
            border-color: var(--primary);
            color: var(--primary);
        }

        .action-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .action-btn:nth-child(1) .action-icon { background: rgba(139, 69, 19, 0.1); color: var(--primary); }
        .action-btn:nth-child(2) .action-icon { background: rgba(210, 105, 30, 0.1); color: var(--secondary); }
        .action-btn:nth-child(3) .action-icon { background: rgba(40, 167, 69, 0.1); color: var(--success); }
        .action-btn:nth-child(4) .action-icon { background: rgba(205, 133, 63, 0.1); color: var(--accent); }

        /* Chart Section */
        .chart-section {
            background: var(--white);
            padding: 28px;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            margin-bottom: 32px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .chart-title {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: var(--gray-900);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chart-title i {
            color: var(--primary);
        }

        .chart-filters {
            display: flex;
            gap: 6px;
            background: var(--gray-100);
            padding: 4px;
            border-radius: 10px;
        }

        .filter-btn {
            padding: 8px 16px;
            border: none;
            background: transparent;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--gray-600);
        }

        .filter-btn.active {
            background: var(--white);
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        .filter-btn:hover:not(.active) {
            color: var(--primary);
        }

        .chart-container {
            height: 300px;
            position: relative;
            margin-top: 16px;
        }

        .chart-placeholder {
            width: 100%;
            height: 100%;
            background: var(--gray-50);
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
            font-size: 14px;
            gap: 10px;
        }

        .chart-placeholder i {
            font-size: 40px;
            opacity: 0.5;
        }

        /* Notification Badge */
        .notification-badge {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1000;
            max-width: 340px;
        }

        .notification {
            background: var(--white);
            color: var(--gray-800);
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 10px;
            box-shadow: var(--shadow-lg);
            border-left: 4px solid var(--success);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .notification-icon {
            width: 36px;
            height: 36px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--success);
            font-size: 16px;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 2px;
        }

        .notification-message {
            font-size: 12px;
            color: var(--gray-500);
        }

        .notification-close {
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            font-size: 16px;
            padding: 4px;
        }

        .notification-close:hover {
            color: var(--gray-600);
        }

        .notification-info {
            border-left-color: var(--primary);
        }

        .notification-info .notification-icon {
            background: rgba(139, 69, 19, 0.1);
            color: var(--primary);
        }

        /* Success Message */
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

        /* Responsive */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .actions-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .page-title {
                font-size: 22px;
            }

            .page-subtitle {
                margin-left: 0;
                margin-top: 8px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .actions-grid {
                grid-template-columns: 1fr;
            }

            .chart-container {
                height: 240px;
            }

            .chart-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .sidebar-toggle {
                top: 16px;
                left: 16px;
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar functionality
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
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

            sidebarToggle.addEventListener('click', openSidebar);
            sidebarOverlay.addEventListener('click', closeSidebar);

            // Close button inside sidebar
            const sidebarClose = document.getElementById('sidebarClose');
            sidebarClose.addEventListener('click', closeSidebar);

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

                // Create gradient with brown color
                const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 300);
                gradient.addColorStop(0, 'rgba(139, 69, 19, 0.2)');
                gradient.addColorStop(1, 'rgba(139, 69, 19, 0.01)');

                currentChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Aktivitas',
                            data: data.data,
                            borderColor: '#8b4513',
                            backgroundColor: gradient,
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#8b4513',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: '#fff',
                                titleColor: '#2c2416',
                                bodyColor: '#6b5d4f',
                                borderColor: '#e8dcc8',
                                borderWidth: 1,
                                cornerRadius: 8,
                                padding: 12,
                                callbacks: {
                                    label: function(context) {
                                        return ' ' + context.parsed.y + ' aktivitas';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(139, 69, 19, 0.08)',
                                    drawBorder: false
                                },
                                ticks: {
                                    color: '#6b5d4f',
                                    font: { size: 12 }
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#6b5d4f',
                                    font: { size: 12 }
                                }
                            }
                        }
                    }
                });
            }

            // Initialize chart
            updateChart('7d');
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
                <a href="{{ route('admin.dashboard') }}" class="menu-item active">
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
                <a href="{{ url('/admin/buku') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-book"></i></span>
                    <span class="menu-text">Kelola Buku</span>
                </a>
                <a href="{{ url('/admin/kategori') }}" class="menu-item">
                    <span class="menu-icon"><i class="fas fa-folder"></i></span>
                    <span class="menu-text">Kelola Kategori</span>
                </a>
            </div>
            <div class="menu-section">
                <div class="menu-section-title">Transaksi</div>
                <a href="{{ url('/admin/pesanan') }}" class="menu-item">
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
                        {{ strtoupper(substr($user->Nama_Lengkap, 0, 1)) }}
                    </div>
                    <div class="user-details">
                        <span class="welcome-text">{{ $user->Nama_Lengkap }}</span>
                        <span class="role-badge">{{ $user->Role }}</span>
                    </div>
                </div>
                <a href="/logout" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
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
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="page-header">
            <h1 class="page-title">
                <div class="page-title-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                Dashboard
            </h1>
            <p class="page-subtitle">Selamat datang kembali! Berikut ringkasan aktivitas sistem BookHaven Anda.</p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card users">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i> 12%
                    </div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalUsers }}</div>
                    <div class="stat-label">Total Pengguna</div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar">
                        <div class="progress-fill" style="--progress: 75%"></div>
                    </div>
                </div>
            </div>

            <div class="stat-card admins">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-user-shield"></i>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i> 5%
                    </div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">{{ $totalAdmins }}</div>
                    <div class="stat-label">Total Admin</div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar">
                        <div class="progress-fill" style="--progress: 60%"></div>
                    </div>
                </div>
            </div>

            <div class="stat-card books">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i> 28%
                    </div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Buku</div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar">
                        <div class="progress-fill" style="--progress: 40%"></div>
                    </div>
                </div>
            </div>

            <div class="stat-card transactions">
                <div class="stat-header">
                    <div class="stat-icon">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div class="stat-trend trend-down">
                        <i class="fas fa-arrow-down"></i> 3%
                    </div>
                </div>
                <div class="stat-content">
                    <div class="stat-number">0</div>
                    <div class="stat-label">Total Transaksi</div>
                </div>
                <div class="stat-progress">
                    <div class="progress-bar">
                        <div class="progress-fill" style="--progress: 85%"></div>
                    </div>
                </div>
            </div>
        </div>

        

        <!-- Interactive Chart Section -->
        <div class="chart-section">
            <div class="chart-header">
                <h2 class="chart-title">
                    <i class="fas fa-chart-line"></i>
                    Aktivitas Sistem
                </h2>
                <div class="chart-filters">
                    <button class="filter-btn active" data-period="7d">7 Hari</button>
                    <button class="filter-btn" data-period="30d">30 Hari</button>
                    <button class="filter-btn" data-period="12m">12 Bulan</button>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="activityChart"></canvas>
                <div class="chart-placeholder" id="chartPlaceholder" style="display: none;">
                    <i class="fas fa-chart-area"></i>
                    <span>Memuat grafik...</span>
                </div>
            </div>
        </div>

    </main>
</body>
</html>


