<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kelola Pengguna - BookHaven</title>
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		/* Copy of buku/index styles (trimmed where appropriate) */
		* { margin: 0; padding: 0; box-sizing: border-box; }
		body { font-family: 'Instrument Sans', sans-serif; background: #f8f9fa; color: #2c2416; line-height: 1.6; transition: margin-left 0.3s ease; }

		/* Sidebar Toggle */
		.sidebar-toggle { position: fixed; top: 20px; left: 20px; z-index: 1001; background: #8b4513; color: white; border: none; border-radius: 8px; padding: 10px 12px; cursor: pointer; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: all 0.3s ease; }
		.sidebar-toggle:hover { background: #6d3610; transform: scale(1.05); }

		/* Collapsible Sidebar */
		.sidebar { position: fixed; top: 0; left: -280px; width: 280px; height: 100vh; background: white; box-shadow: 2px 0 15px rgba(0,0,0,0.1); z-index: 1000; transition: left 0.3s ease; overflow-y: auto; }
		.sidebar.open { left: 0; }
		.sidebar-header { padding: 20px; border-bottom: 1px solid #e8dcc8; background: linear-gradient(135deg, #8b4513, #a0522d); color: white; }
		.sidebar-title { font-family: 'Playfair Display', serif; font-size: 20px; font-weight: 700; margin-bottom: 5px; }
		.sidebar-subtitle { font-size: 14px; opacity: 0.8; }
		.sidebar-menu { padding: 20px 0; }
		.menu-item { display:flex; align-items:center; padding:12px 20px; text-decoration:none; color:#2c2416; transition: all 0.3s ease; border-left:4px solid transparent; }
		.menu-item:hover { background:#f8f9fa; border-left-color:#8b4513; color:#8b4513; }
		.menu-item.active { background:#f8f9fa; border-left-color:#8b4513; color:#8b4513; font-weight:600; }
		.menu-icon { margin-right:12px; font-size:18px; width:20px; }

		/* Overlay for mobile */
		.sidebar-overlay { position: fixed; top:0; left:0; width:100%; height:100vh; background: rgba(0,0,0,0.5); z-index:999; opacity:0; visibility:hidden; transition: all 0.3s ease; }
		.sidebar-overlay.show { opacity:1; visibility:visible; }

		/* Main content adjustment */
		body.sidebar-open { margin-left: 280px; }

		/* Header/Navbar */
		.navbar { background: white; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); padding: 1rem 0; position: fixed; top: 0; left: 0; right: 0; z-index: 998; }
		.navbar-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; display:flex; justify-content:space-between; align-items:center; }
		.navbar-logo { font-family: 'Playfair Display', serif; font-size:24px; font-weight:700; color:#8b4513; }
		.user-menu { display:flex; align-items:center; gap:20px; }
		.welcome-text { font-weight:500; color:#2c2416; }
		.role-badge { background:#8b4513; color:white; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:600; }
		.logout-btn { color:#dc3545; text-decoration:none; font-weight:500; }

		.container { max-width:1200px; margin:0 auto; padding:20px; padding-top:150px; }
		.header { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; background:white; padding:24px 32px; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.05); }
		.header h1 { font-family:'Playfair Display', serif; font-size:32px; color:#2c2416; margin-bottom:8px; }
		.header p { color:#6b5d4f; margin:0; }
		.header-actions { display:flex; gap:16px; align-items:center; }

		/* Buttons */
		.btn {
			padding: 10px 16px;
			border-radius: 10px;
			text-decoration: none;
			font-weight: 600;
			display: inline-flex;
			align-items: center;
			gap: 8px;
			font-size: 14px;
			border: none;
			cursor: pointer;
			transition: transform 0.12s ease, box-shadow 0.12s ease, opacity 0.12s ease;
			box-shadow: 0 2px 6px rgba(44,36,22,0.06);
		}

		.btn:focus {
			outline: none;
			box-shadow: 0 3px 10px rgba(139,69,19,0.18);
		}

		.btn:hover {
			transform: translateY(-2px);
			box-shadow: 0 6px 18px rgba(44,36,22,0.12);
		}

		.btn-primary {
			background: linear-gradient(180deg,#a2632d,#8b4513);
			color: #fff;
			border: 1px solid rgba(0,0,0,0.06);
		}

		.btn-secondary {
			background: linear-gradient(180deg,#7a7f85,#6c757d);
			color: #fff;
			border: 1px solid rgba(0,0,0,0.06);
		}

		.btn-danger {
			background: linear-gradient(180deg,#e05a5f,#dc3545);
			color: #fff;
			border: 1px solid rgba(0,0,0,0.06);
		}

		/* Small buttons for table actions */
		.btn-sm {
			padding: 8px 12px;
			font-size: 13px;
			border-radius: 8px;
			box-shadow: 0 1px 6px rgba(44,36,22,0.06);
		}

		.actions .btn { padding-left: 10px; padding-right: 10px; }

		.search-section { background:white; padding:24px; border-radius:12px; margin-bottom:24px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
		.search-form { display:flex; gap:16px; align-items:center; }
		.search-input { flex:1; padding:12px 16px; border:2px solid #e8dcc8; border-radius:8px; font-size:16px; }

		.users-table { width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.05); }
		.users-table th, .users-table td { padding:14px 16px; text-align:left; border-bottom:1px solid #f1e8dc; }
		.users-table th { background:#f8f4ef; color:#6b5d4f; font-size:14px; }

		.avatar { width:48px; height:48px; border-radius:10px; display:inline-flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#8b4513,#a0522d); color:white; font-weight:700; margin-right:12px; }
		.book-actions, .actions { display:flex; gap:8px; }

		.no-data, .no-books { text-align:center; padding:60px 20px; background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.05); }

		.pagination { display:flex; justify-content:center; gap:8px; margin-top:32px; }
		.pagination a, .pagination span { padding:12px 16px; border:1px solid #e8dcc8; text-decoration:none; color:#2c2416; border-radius:8px; }
		.pagination a:hover { background:#8b4513; color:white; border-color:#8b4513; }
		.pagination .current { background:#8b4513; color:white; border-color:#8b4513; }

		.alert { padding:16px 20px; border-radius:8px; margin-bottom:20px; display:flex; align-items:center; gap:12px; }
		.alert-success { background:#d4edda; border:1px solid #c3e6cb; color:#155724; }

		@media (max-width:768px) {
			body.sidebar-open { margin-left:0; }
			.container { padding:150px 16px 16px 16px; }
			.header { flex-direction:column; gap:16px; text-align:center; }
			.header-actions { width:100%; justify-content:center; }
			.search-form { flex-direction:column; }
			.users-table td:nth-child(4), .users-table th:nth-child(4) { display:none; }
		}
	</style>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
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

			if (sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
			if (sidebarOverlay) sidebarOverlay.addEventListener('click', toggleSidebar);
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
			<a href="{{ route('admin.user.index') }}" class="menu-item active">
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
			<a href="{{ url('/admin/pesanan') }}" class="menu-item">
				<span class="menu-icon"><i class="fas fa-clipboard-list"></i></span>
				<span>Kelola Pesanan</span>
			</a>
		</nav>
	</div>

	<!-- Sidebar Overlay for mobile -->
	<div class="sidebar-overlay" id="sidebarOverlay"></div>

	<!-- Header/Navbar -->
	<header class="navbar">
		<div class="navbar-container">
			<div class="navbar-logo">BookHaven Admin</div>
			<div class="user-menu">
				<span class="welcome-text">Selamat datang, {{ auth()->user()->Nama_Lengkap }}</span>
				<span class="role-badge">{{ auth()->user()->Role }}</span>
				<a href="/logout" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
			</div>
		</div>
	</header>

	<form id="logout-form" action="/logout" method="POST" style="display: none;">
		@csrf
	</form>

	<div class="container">
		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif

		<div class="header">
			<div>
				<h1>Kelola Pengguna</h1>
				<p>Kelola pengguna terdaftar di BookHaven</p>
			</div>
			<div class="header-actions">
				<a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Pengguna</a>
			</div>
		</div>

		<div class="search-section">
			<form method="GET" action="{{ route('admin.user.index') }}" class="search-form">
				<input type="text" name="search" placeholder="Cari pengguna... (nama, email)" value="{{ $search ?? request('search') }}" class="search-input">
				<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
				@if(!empty($search ?? request('search')))
					<a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Reset</a>
				@endif
			</form>
		</div>

		@if(isset($users) && $users->count() > 0)
			<table class="users-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Role</th>
						<th>Terdaftar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $loop->iteration + (($users->currentPage()-1) * $users->perPage()) }}</td>
							<td>
								<span class="avatar">{{ strtoupper(substr($user->Nama_Lengkap ?? $user->name ?? '-',0,1)) }}</span>
								{{ $user->Nama_Lengkap ?? $user->name ?? '-' }}
							</td>
							<td>{{ $user->email ?? '-' }}</td>
							<td>{{ $user->Role ?? ($user->role ?? '-') }}</td>
							<td>{{ optional($user->created_at)->format('d M Y') }}</td>
							<td class="actions">
								<a href="{{ route('admin.user.show', $user->id_user) }}" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
								<a href="{{ route('admin.user.edit', $user->id_user) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
								<form method="POST" action="{{ route('admin.user.destroy', $user->id_user) }}" style="display:inline;">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengguna ini?')"><i class="fas fa-trash"></i> Hapus</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{{-- Pagination --}}
			@if ($users->hasPages())
				<nav class="pagination" role="navigation" aria-label="Pagination">
					@if ($users->onFirstPage())
						<span class="disabled" aria-disabled="true">&laquo; Sebelumnya</span>
					@else
						<a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo; Sebelumnya</a>
					@endif

					@foreach (range(1, $users->lastPage()) as $page)
						@if ($page == $users->currentPage())
							<span class="current">{{ $page }}</span>
						@else
							<a href="{{ $users->url($page) }}">{{ $page }}</a>
						@endif
					@endforeach

					@if ($users->hasMorePages())
						<a href="{{ $users->nextPageUrl() }}" rel="next">Selanjutnya &raquo;</a>
					@else
						<span class="disabled" aria-disabled="true">Selanjutnya &raquo;</span>
					@endif
				</nav>
			@endif

		@else
			<div class="no-books">
				<i class="fas fa-user-friends" style="font-size:64px;color:#8b4513;margin-bottom:20px"></i>
				<h3>Tidak ada pengguna</h3>
				<p>
					@if($search)
						Tidak ditemukan pengguna dengan kata kunci "{{ $search }}".
					@else
						Belum ada pengguna terdaftar.
					@endif
				</p>
				<a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Tambah Pengguna</a>
			</div>
		@endif
	</div>
</body>
</html>

