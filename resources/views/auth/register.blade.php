<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BookHaven</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600|playfair-display:700" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background: linear-gradient(135deg, #f5f1e8 0%, #e8dcc8 100%);
            color: #2c2416;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            position: relative;
        }

        .back-to-home {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #8b4513;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s;
        }

        .back-to-home:hover {
            color: #6d3610;
        }

        .back-to-home::before {
            content: "←";
            font-size: 18px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: #8b4513;
            margin-bottom: 10px;
        }

        .register-title {
            font-size: 28px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .register-subtitle {
            color: #6b5d4f;
            font-size: 16px;
        }

        .register-form {
            display: grid;
            gap: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #2c2416;
        }

        .form-input {
            padding: 14px 16px;
            border: 2px solid #e8dcc8;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: #faf8f3;
        }

        .form-input:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            background: white;
        }

        .form-input.error {
            border-color: #dc3545;
            background: #fff5f5;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 4px;
        }

        .btn-primary {
            background: #8b4513;
            color: white;
            padding: 16px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.3);
        }

        .btn-primary:hover {
            background: #6d3610;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(139, 69, 19, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e8dcc8;
        }

        .login-link a {
            color: #8b4513;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .textarea-input {
            min-height: 100px;
            resize: vertical;
        }

        @media (max-width: 768px) {
            .register-container {
                padding: 30px 20px;
                margin: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .register-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <a href="/" class="back-to-home">Kembali ke Beranda</a>

        <div class="register-header">
            <div class="logo">BookHaven</div>
            <h1 class="register-title">Daftar Akun</h1>
            <p class="register-subtitle">Bergabunglah dengan komunitas pembaca kami</p>
        </div>

        <form method="POST" action="/register" class="register-form">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text"
                           id="nama_lengkap"
                           name="nama_lengkap"
                           class="form-input @error('nama_lengkap') error @enderror"
                           value="{{ old('nama_lengkap') }}"
                           required>
                    @error('nama_lengkap')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text"
                           id="username"
                           name="username"
                           class="form-input @error('username') error @enderror"
                           value="{{ old('username') }}"
                           required>
                    @error('username')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-input @error('email') error @enderror"
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_hp" class="form-label">No. Handphone</label>
                    <input type="tel"
                           id="no_hp"
                           name="no_hp"
                           class="form-input @error('no_hp') error @enderror"
                           value="{{ old('no_hp') }}"
                           required>
                    @error('no_hp')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group full-width">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat"
                          name="alamat"
                          class="form-input textarea-input @error('alamat') error @enderror"
                          required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password"
                           id="password"
                           name="password"
                           class="form-input @error('password') error @enderror"
                           required>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="form-input"
                           required>
                </div>
            </div>

            <button type="submit" class="btn-primary">Daftar Sekarang</button>
        </form>

        <div class="login-link">
            <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
        </div>
    </div>
</body>
</html>
