<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - BookHaven</title>
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
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
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

        .btn-back {
            background: #f5f5f4;
            color: #57534e;
            border: 2px solid #e7e5e4;
        }

        .btn-back:hover {
            background: #e7e5e4;
            border-color: #d6d3d1;
            transform: translateY(-1px);
        }

        /* Main Content */
        .profile-section {
            padding: 50px 0;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #78350f;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: #78716c;
            font-size: 16px;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 30px;
        }

        /* Profile Sidebar */
        .profile-sidebar {
            background: white;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(120, 53, 15, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .profile-avatar-section {
            text-align: center;
            padding-bottom: 24px;
            border-bottom: 1px solid #e7e5e4;
            margin-bottom: 24px;
        }

        .profile-avatar-large {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 36px;
            margin: 0 auto 16px;
            box-shadow: 0 8px 25px rgba(120, 53, 15, 0.3);
        }

        .profile-sidebar-name {
            font-weight: 700;
            font-size: 20px;
            color: #1c1917;
            margin-bottom: 4px;
        }

        .profile-sidebar-email {
            color: #78716c;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .profile-role-badge {
            display: inline-block;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            color: #78350f;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 8px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 10px;
            color: #57534e;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            color: #78350f;
        }

        .sidebar-menu a i {
            width: 20px;
            text-align: center;
        }

        /* Profile Content */
        .profile-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(120, 53, 15, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e7e5e4;
        }

        .card-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #f5ebe0 0%, #e6d5c3 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #78350f;
            font-size: 18px;
        }

        .card-title {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #1c1917;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #1c1917;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-label span {
            color: #dc2626;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #d4c4b0;
            border-radius: 12px;
            font-size: 15px;
            background: #faf8f5;
            transition: all 0.3s ease;
            font-family: 'Instrument Sans', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #78350f;
            background: white;
            box-shadow: 0 0 0 4px rgba(120, 53, 15, 0.08);
        }

        .form-input::placeholder {
            color: #a8a29e;
        }

        textarea.form-input {
            resize: vertical;
            min-height: 100px;
        }

        .form-hint {
            font-size: 12px;
            color: #78716c;
            margin-top: 6px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(120, 53, 15, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(120, 53, 15, 0.35);
        }

        /* Alert Messages */
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            border: 1px solid #6ee7b7;
            color: #065f46;
        }

        .alert-error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        .alert-icon {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            flex-shrink: 0;
        }

        .alert-success .alert-icon {
            background: #10b981;
            color: white;
        }

        .alert-error .alert-icon {
            background: #ef4444;
            color: white;
        }

        /* Error Messages */
        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .error-message i {
            font-size: 12px;
        }

        .form-input.error {
            border-color: #dc2626;
            background: #fef2f2;
        }

        /* Password Strength */
        .password-requirements {
            background: #f5f5f4;
            border-radius: 10px;
            padding: 14px;
            margin-top: 12px;
        }

        .password-requirements h4 {
            font-size: 13px;
            color: #57534e;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .password-requirements ul {
            list-style: none;
            font-size: 12px;
            color: #78716c;
        }

        .password-requirements li {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
        }

        .password-requirements li i {
            font-size: 10px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-sidebar {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 28px;
            }

            .profile-card {
                padding: 20px;
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
                <a href="{{ route('user.dashboard') }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <section class="profile-section">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Edit Profil</h1>
                <p class="page-subtitle">Kelola informasi akun dan keamanan Anda</p>
            </div>

            <div class="profile-grid">
                <!-- Sidebar -->
                <div class="profile-sidebar">
                    <div class="profile-avatar-section">
                        <div class="profile-avatar-large">
                            {{ strtoupper(substr($user->Nama_Lengkap, 0, 1)) }}{{ strtoupper(substr(explode(' ', $user->Nama_Lengkap)[1] ?? '', 0, 1)) }}
                        </div>
                        <div class="profile-sidebar-name">{{ $user->Nama_Lengkap }}</div>
                        <div class="profile-sidebar-email">{{ $user->Email }}</div>
                        <span class="profile-role-badge">{{ $user->Role }}</span>
                    </div>
                    <ul class="sidebar-menu">
                        <li><a href="#profile-info" class="active"><i class="fas fa-user"></i> Informasi Profil</a></li>
                        <li><a href="#change-password"><i class="fas fa-lock"></i> Ubah Password</a></li>
                        <li><a href="{{ route('user.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                    </ul>
                </div>

                <!-- Content -->
                <div class="profile-content">
                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            <div class="alert-icon"><i class="fas fa-check"></i></div>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-error">
                            <div class="alert-icon"><i class="fas fa-exclamation"></i></div>
                            <div>
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Profile Information Card -->
                    <div class="profile-card" id="profile-info">
                        <div class="card-header">
                            <div class="card-icon"><i class="fas fa-user-edit"></i></div>
                            <h2 class="card-title">Informasi Profil</h2>
                        </div>

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap <span>*</span></label>
                                    <input type="text" name="Nama_Lengkap" class="form-input @error('Nama_Lengkap') error @enderror"
                                           value="{{ old('Nama_Lengkap', $user->Nama_Lengkap) }}" placeholder="Masukkan nama lengkap">
                                    @error('Nama_Lengkap')
                                        <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Username <span>*</span></label>
                                    <input type="text" name="Username" class="form-input @error('Username') error @enderror"
                                           value="{{ old('Username', $user->Username) }}" placeholder="Masukkan username">
                                    @error('Username')
                                        <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Email <span>*</span></label>
                                    <input type="email" name="Email" class="form-input @error('Email') error @enderror"
                                           value="{{ old('Email', $user->Email) }}" placeholder="Masukkan email">
                                    @error('Email')
                                        <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="text" name="NoHp" class="form-input @error('NoHp') error @enderror"
                                           value="{{ old('NoHp', $user->NoHp) }}" placeholder="Masukkan nomor telepon">
                                    @error('NoHp')
                                        <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <textarea name="Alamat" class="form-input @error('Alamat') error @enderror"
                                          placeholder="Masukkan alamat lengkap">{{ old('Alamat', $user->Alamat) }}</textarea>
                                @error('Alamat')
                                    <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </form>
                    </div>

                    <!-- Change Password Card -->
                    <div class="profile-card" id="change-password">
                        <div class="card-header">
                            <div class="card-icon"><i class="fas fa-shield-alt"></i></div>
                            <h2 class="card-title">Ubah Password</h2>
                        </div>

                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="form-label">Password Saat Ini <span>*</span></label>
                                <input type="password" name="current_password" class="form-input @error('current_password') error @enderror"
                                       placeholder="Masukkan password saat ini">
                                @error('current_password')
                                    <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Password Baru <span>*</span></label>
                                    <input type="password" name="password" class="form-input @error('password') error @enderror"
                                           placeholder="Masukkan password baru">
                                    @error('password')
                                        <div class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Konfirmasi Password Baru <span>*</span></label>
                                    <input type="password" name="password_confirmation" class="form-input"
                                           placeholder="Ulangi password baru">
                                </div>
                            </div>

                            <div class="password-requirements">
                                <h4><i class="fas fa-info-circle"></i> Persyaratan Password:</h4>
                                <ul>
                                    <li><i class="fas fa-circle"></i> Minimal 6 karakter</li>
                                    <li><i class="fas fa-circle"></i> Disarankan kombinasi huruf dan angka</li>
                                    <li><i class="fas fa-circle"></i> Hindari menggunakan informasi pribadi</li>
                                </ul>
                            </div>

                            <button type="submit" class="btn-primary" style="margin-top: 20px;">
                                <i class="fas fa-key"></i> Ubah Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Smooth scroll for sidebar links
        document.querySelectorAll('.sidebar-menu a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });

                    // Update active state
                    document.querySelectorAll('.sidebar-menu a').forEach(a => a.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>
