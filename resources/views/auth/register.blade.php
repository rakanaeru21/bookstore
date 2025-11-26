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
            animation: float 25s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
            33% { transform: translateY(-30px) rotate(120deg); opacity: 0.6; }
            66% { transform: translateY(-15px) rotate(240deg); opacity: 0.9; }
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
            flex-direction: column;
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
            margin-bottom: 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            color: #8b4513;
            font-weight: 500;
            opacity: 0;
            animation: fadeInOut 2s ease-in-out infinite;
        }

        @keyframes fadeInOut {
            0%, 100% { opacity: 0.5; }
            50% { opacity: 1; }
        }

        .register-container {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
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

        /* Progress Indicator */
        .progress-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .progress-step {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e8dcc8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 14px;
            color: #6b5d4f;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .progress-step.active {
            background: #8b4513;
            color: white;
            transform: scale(1.1);
        }

        .progress-step.completed {
            background: #28a745;
            color: white;
        }

        .progress-line {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: #e8dcc8;
            z-index: 1;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #8b4513, #28a745);
            width: 0%;
            transition: width 0.5s ease;
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

        .form-input.valid {
            border-color: #28a745;
            background: #f8fff8;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        /* Real-time validation indicators */
        .validation-indicator {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .form-group {
            position: relative;
        }

        .form-input.valid + .validation-indicator {
            opacity: 1;
            color: #28a745;
        }

        .form-input.error + .validation-indicator {
            opacity: 1;
            color: #dc3545;
        }

        /* Password strength indicator */
        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: #e8dcc8;
            border-radius: 2px;
            overflow: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .password-strength.visible {
            opacity: 1;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak .strength-fill {
            width: 33%;
            background: #dc3545;
        }

        .strength-medium .strength-fill {
            width: 66%;
            background: #ffc107;
        }

        .strength-strong .strength-fill {
            width: 100%;
            background: #28a745;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 4px;
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

        .btn-primary:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

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

            .progress-indicator {
                margin-bottom: 20px;
            }

            .progress-step {
                width: 25px;
                height: 25px;
                font-size: 12px;
            }
        }

        /* Floating labels */
        .floating-label {
            position: relative;
            margin-bottom: 20px;
        }

        .floating-label .form-label {
            position: absolute;
            top: 16px;
            left: 16px;
            color: #6b5d4f;
            pointer-events: none;
            transition: all 0.3s ease;
            background: white;
            padding: 0 4px;
        }

        .floating-label .form-input:focus + .form-label,
        .floating-label .form-input:not(:placeholder-shown) + .form-label {
            top: -8px;
            left: 12px;
            font-size: 12px;
            color: #8b4513;
        }
    </style>
    <script>
        // Loading screen management
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.querySelector('.loading-overlay').classList.add('hidden');
            }, 1200);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registerForm');
            const inputs = document.querySelectorAll('.form-input');
            const submitButton = document.querySelector('.btn-primary');
            const progressSteps = document.querySelectorAll('.progress-step');
            const progressFill = document.querySelector('.progress-fill');

            // Real-time validation
            const validators = {
                nama_lengkap: (value) => value.trim().length >= 2,
                username: (value) => /^[a-zA-Z0-9_]{3,20}$/.test(value),
                email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
                no_hp: (value) => /^[0-9+\-\s()]{10,15}$/.test(value),
                alamat: (value) => value.trim().length >= 10,
                password: (value) => value.length >= 6,
                password_confirmation: (value) => {
                    const password = document.getElementById('password').value;
                    return value === password && value.length >= 6;
                }
            };

            // Add validation indicators
            inputs.forEach(input => {
                const indicator = document.createElement('div');
                indicator.className = 'validation-indicator';
                input.parentNode.appendChild(indicator);
            });

            // Password strength indicator
            const passwordField = document.getElementById('password');
            const strengthIndicator = document.createElement('div');
            strengthIndicator.className = 'password-strength';
            strengthIndicator.innerHTML = '<div class="strength-fill"></div>';
            passwordField.parentNode.appendChild(strengthIndicator);

            // Real-time validation
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    const validator = validators[this.name];
                    const indicator = this.parentNode.querySelector('.validation-indicator');

                    if (validator && validator(this.value)) {
                        this.classList.remove('error');
                        this.classList.add('valid');
                        indicator.textContent = '✓';
                    } else if (this.value.trim() !== '') {
                        this.classList.remove('valid');
                        this.classList.add('error');
                        indicator.textContent = '✗';
                    } else {
                        this.classList.remove('valid', 'error');
                        indicator.textContent = '';
                    }

                    // Password strength
                    if (this.name === 'password') {
                        updatePasswordStrength(this.value);
                    }

                    // Update progress
                    updateProgress();
                });
            });

            function updatePasswordStrength(password) {
                const strengthIndicator = document.querySelector('.password-strength');
                const strengthFill = document.querySelector('.strength-fill');

                if (password.length === 0) {
                    strengthIndicator.classList.remove('visible');
                    return;
                }

                strengthIndicator.classList.add('visible');

                let strength = 0;
                if (password.length >= 6) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/[0-9]/.test(password)) strength++;
                if (/[^a-zA-Z0-9]/.test(password)) strength++;

                strengthIndicator.className = 'password-strength visible';

                if (strength <= 1) {
                    strengthIndicator.classList.add('strength-weak');
                } else if (strength <= 2) {
                    strengthIndicator.classList.add('strength-medium');
                } else {
                    strengthIndicator.classList.add('strength-strong');
                }
            }

            function updateProgress() {
                const validFields = document.querySelectorAll('.form-input.valid').length;
                const totalFields = inputs.length;
                const progressPercentage = (validFields / totalFields) * 100;

                progressFill.style.width = progressPercentage + '%';

                // Update progress steps
                const activeStep = Math.floor((validFields / totalFields) * 3);
                progressSteps.forEach((step, index) => {
                    if (index < activeStep) {
                        step.classList.add('completed');
                        step.classList.remove('active');
                    } else if (index === activeStep) {
                        step.classList.add('active');
                        step.classList.remove('completed');
                    } else {
                        step.classList.remove('active', 'completed');
                    }
                });

                // Enable/disable submit button
                const isFormValid = validFields === totalFields;
                submitButton.disabled = !isFormValid;
            }

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                const validFields = document.querySelectorAll('.form-input.valid').length;
                if (validFields !== inputs.length) {
                    e.preventDefault();
                    // Highlight invalid fields
                    inputs.forEach(input => {
                        if (!input.classList.contains('valid') && input.value.trim() !== '') {
                            input.classList.add('error');
                        }
                    });
                    return;
                }

                submitButton.classList.add('loading');
                submitButton.textContent = '';
            });

            // Add typing effect to subtitle
            const subtitle = document.querySelector('.register-subtitle');
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
                    }, 40);
                }, 1400);
            }
        });

        // Create floating particles
        function createParticles() {
            const particlesContainer = document.querySelector('.particles');
            const numParticles = 6;

            for (let i = 0; i < numParticles; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.width = (Math.random() * 40 + 25) + 'px';
                particle.style.height = particle.style.width;
                particle.style.animationDelay = Math.random() * 25 + 's';
                particle.style.animationDuration = (Math.random() * 15 + 20) + 's';

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
        <div class="loading-text">Mempersiapkan formulir...</div>
    </div>

    <!-- Animated Background Particles -->
    <div class="particles"></div>

    <div class="register-container">
        <a href="/" class="back-to-home">Kembali ke Beranda</a>

        <!-- Progress Indicator -->
        <div class="progress-indicator">
            <div class="progress-line">
                <div class="progress-fill"></div>
            </div>
            <div class="progress-step active">1</div>
            <div class="progress-step">2</div>
            <div class="progress-step">3</div>
        </div>

        <div class="register-header">
            <div class="logo">BookHaven</div>
            <h1 class="register-title">Daftar Akun</h1>
            <p class="register-subtitle">Bergabunglah dengan komunitas pembaca kami</p>
        </div>

        <form method="POST" action="/register" class="register-form" id="registerForm">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text"
                           id="nama_lengkap"
                           name="nama_lengkap"
                           class="form-input @error('nama_lengkap') error @enderror"
                           value="{{ old('nama_lengkap') }}"
                           placeholder=" "
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
