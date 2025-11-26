<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BookHaven</title>
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
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(139, 69, 19, 0.1);
            border-radius: 50%;
            pointer-events: none;
            animation: float 20s infinite ease-in-out;
        }

        .particle:nth-child(1) { width: 80px; height: 80px; top: 20%; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 40px; height: 40px; top: 60%; left: 80%; animation-delay: 3s; }
        .particle:nth-child(3) { width: 60px; height: 60px; top: 80%; left: 20%; animation-delay: 6s; }
        .particle:nth-child(4) { width: 30px; height: 30px; top: 30%; left: 70%; animation-delay: 9s; }
        .particle:nth-child(5) { width: 50px; height: 50px; top: 10%; left: 50%; animation-delay: 12s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 0.8; }
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #f5f1e8 0%, #e8dcc8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }

        .loading-overlay.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid rgba(139, 69, 19, 0.3);
            border-top: 4px solid #8b4513;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
            opacity: 0;
            transform: translateY(30px);
            animation: slideInUp 0.8s ease-out 0.3s forwards;
        }

        @keyframes slideInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
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

        .login-header {
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

        .login-title {
            font-size: 28px;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #6b5d4f;
            font-size: 16px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
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
            transition: all 0.3s ease;
            background: #faf8f3;
            position: relative;
        }

        .form-input:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
            background: white;
            transform: translateY(-2px);
        }

        .form-input.error {
            border-color: #dc3545;
            background: #fff5f5;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Input Focus Effects */
        .form-group {
            position: relative;
        }

        .form-input:focus + .focus-border {
            transform: scaleX(1);
        }

        .focus-border {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #8b4513, #d4a574);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 4px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: -8px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #8b4513;
        }

        .forgot-password {
            color: #8b4513;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .btn-primary {
            background: linear-gradient(135deg, #8b4513, #a0522d);
            color: white;
            padding: 16px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #6d3610, #8b4513);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(139, 69, 19, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(139, 69, 19, 0.3);
        }

        /* Loading state for button */
        .btn-primary.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-primary.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            margin: auto;
            border: 2px solid transparent;
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        .register-link {
            text-align: center;
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e8dcc8;
        }

        .register-link a {
            color: #8b4513;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-alert {
            background: #fff5f5;
            border: 1px solid #fecaca;
            color: #dc3545;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .login-container {
                padding: 30px 20px;
                margin: 20px;
            }

            .login-title {
                font-size: 24px;
            }

            .form-options {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }

        /* Password visibility toggle */
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #8b4513;
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
            z-index: 5;
        }

        .password-field {
            position: relative;
        }

        /* Success animation */
        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .success-animation {
            animation: successPulse 0.6s ease-in-out;
        }
    </style>
    <script>
        // Loading screen management
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.querySelector('.loading-overlay').classList.add('hidden');
            }, 1000);
        });

        // Form interaction enhancements
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const inputs = document.querySelectorAll('.form-input');
            const submitButton = document.querySelector('.btn-primary');

            // Add focus borders to input fields
            inputs.forEach(input => {
                const focusBorder = document.createElement('div');
                focusBorder.className = 'focus-border';
                input.parentNode.appendChild(focusBorder);
            });

            // Enhanced form validation
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() === '') {
                        this.classList.add('error');
                        this.style.animation = 'shake 0.5s ease-in-out';
                    } else {
                        this.classList.remove('error');
                        this.style.animation = '';
                    }
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('error') && this.value.trim() !== '') {
                        this.classList.remove('error');
                        this.style.animation = '';
                    }
                });
            });

            // Password visibility toggle
            const passwordField = document.getElementById('password');
            const toggleButton = document.createElement('button');
            toggleButton.type = 'button';
            toggleButton.className = 'password-toggle';
            toggleButton.innerHTML = '👁️';
            toggleButton.title = 'Toggle password visibility';

            passwordField.parentNode.classList.add('password-field');
            passwordField.parentNode.appendChild(toggleButton);

            toggleButton.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '👁️' : '🙈';
            });

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                submitButton.classList.add('loading');
                submitButton.textContent = '';

                // Add a small delay to show the loading state
                setTimeout(() => {
                    // Form will submit normally after showing loading state
                }, 500);
            });

            // Add smooth scroll effect for error messages
            const errorAlert = document.querySelector('.error-alert');
            if (errorAlert) {
                errorAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            // Add typing effect to subtitle
            const subtitle = document.querySelector('.login-subtitle');
            if (subtitle) {
                const text = subtitle.textContent;
                subtitle.textContent = '';
                let i = 0;

                setTimeout(() => {
                    const typeWriter = setInterval(() => {
                        subtitle.textContent += text.charAt(i);
                        i++;
                        if (i > text.length - 1) {
                            clearInterval(typeWriter);
                        }
                    }, 50);
                }, 1200);
            }
        });

        // Create floating particles
        function createParticles() {
            const particlesContainer = document.querySelector('.particles');
            const numParticles = 5;

            for (let i = 0; i < numParticles; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.width = (Math.random() * 50 + 20) + 'px';
                particle.style.height = particle.style.width;
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 15) + 's';

                particlesContainer.appendChild(particle);
            }
        }

        // Initialize particles when page loads
        window.addEventListener('load', createParticles);
    </script>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay">
        <div class="spinner"></div>
    </div>

    <!-- Animated Background Particles -->
    <div class="particles"></div>

    <div class="login-container">
        <a href="/" class="back-to-home">Kembali ke Beranda</a>

        <div class="login-header">
            <div class="logo">BookHaven</div>
            <h1 class="login-title">Masuk</h1>
            <p class="login-subtitle">Selamat datang kembali di sanctuary literatur Anda</p>
        </div>

        @if ($errors->any())
            <div class="error-alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        @if (session('error'))
            <div class="error-alert">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login" class="login-form" id="loginForm">
            @csrf

            <div class="form-group">
                <label for="login" class="form-label">Username atau Email</label>
                <input type="text"
                       id="login"
                       name="login"
                       class="form-input @error('login') error @enderror"
                       value="{{ old('login') }}"
                       required
                       autocomplete="username">
                @error('login')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-input @error('password') error @enderror"
                       required
                       autocomplete="current-password">
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Ingat saya</span>
                </label>
                <a href="#" class="forgot-password">Lupa password?</a>
            </div>

            <button type="submit" class="btn-primary">Masuk</button>
        </form>

        <div class="register-link">
            <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>
