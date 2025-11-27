<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Bukti Pembayaran - BookHaven</title>
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
            background: #fafaf9;
            color: #1c1917;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header */
        header {
            padding: 20px 0;
            background: white;
            border-bottom: 1px solid #e7e5e4;
            position: sticky;
            top: 0;
            z-index: 100;
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
            gap: 10px;
        }

        .logo::before {
            content: "";
            width: 28px;
            height: 28px;
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            border-radius: 6px;
            display: inline-block;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #78350f 0%, #92400e 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #92400e 0%, #78350f 100%);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: transparent;
            color: #78350f;
            border: 1.5px solid #78350f;
        }

        .btn-secondary:hover {
            background: #78350f;
            color: white;
        }

        /* Alert Messages */
        .alert {
            padding: 16px 20px;
            border-radius: 12px;
            margin: 24px 0;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: #f0fdf4;
            border: 1px solid #22c55e;
            color: #15803d;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
        }

        .alert-error::before {
            content: "✗";
            width: 24px;
            height: 24px;
            background: #dc2626;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        /* Main Content */
        .main-content {
            padding: 48px 0;
            min-height: 60vh;
        }

        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: #1c1917;
            margin-bottom: 32px;
            text-align: center;
        }

        .upload-container {
            background: white;
            border-radius: 16px;
            padding: 32px;
            border: 1px solid #e7e5e4;
            box-shadow: 0 4px 20px rgba(120, 53, 15, 0.08);
            margin-bottom: 32px;
        }

        .transaction-info {
            background: #f8fafc;
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 32px;
        }

        .transaction-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #78350f;
            margin-bottom: 16px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .info-row:last-child {
            margin-bottom: 0;
            font-weight: 700;
            color: #78350f;
            font-size: 16px;
            border-top: 1px solid #e2e8f0;
            padding-top: 12px;
        }

        .upload-form {
            background: white;
        }

        .form-section {
            margin-bottom: 24px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #1c1917;
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e7e5e4;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #1c1917;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            left: -9999px;
        }

        .file-upload-label {
            display: block;
            padding: 24px;
            border: 2px dashed #e7e5e4;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: #fafafa;
        }

        .file-upload-label:hover {
            border-color: #78350f;
            background: #fffbeb;
        }

        .file-upload-label.has-file {
            border-color: #22c55e;
            background: #f0fdf4;
        }

        .upload-icon {
            font-size: 48px;
            color: #78350f;
            margin-bottom: 16px;
            display: block;
        }

        .upload-text {
            font-size: 16px;
            font-weight: 600;
            color: #1c1917;
            margin-bottom: 8px;
        }

        .upload-subtitle {
            font-size: 14px;
            color: #78716c;
        }

        .file-preview {
            margin-top: 16px;
            padding: 16px;
            background: #f1f5f9;
            border-radius: 8px;
            display: none;
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .file-icon {
            font-size: 24px;
            color: #22c55e;
        }

        .file-details {
            flex: 1;
        }

        .file-name {
            font-weight: 600;
            color: #1c1917;
            margin-bottom: 4px;
        }

        .file-size {
            font-size: 12px;
            color: #78716c;
        }

        .requirements {
            background: #fffbeb;
            border: 1px solid #fbbf24;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .requirements-title {
            font-weight: 600;
            color: #92400e;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .requirements-list {
            list-style: none;
            color: #78350f;
        }

        .requirements-list li {
            margin-bottom: 8px;
            padding-left: 20px;
            position: relative;
            font-size: 14px;
        }

        .requirements-list li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #fbbf24;
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-top: 32px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }

            .upload-container {
                padding: 24px;
            }

            .page-title {
                font-size: 28px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav>
                <a href="{{ route('user.dashboard') }}" class="logo">BookHaven</a>
                <div></div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <h1 class="page-title">Upload Bukti Pembayaran</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div class="upload-container">
                <!-- Transaction Info -->
                <div class="transaction-info">
                    <h3 class="transaction-title">Detail Transaksi</h3>
                    <div class="info-row">
                        <span>Nomor Pesanan:</span>
                        <span><strong>#{{ str_pad($transaksi->id_transaksi, 6, '0', STR_PAD_LEFT) }}</strong></span>
                    </div>
                    <div class="info-row">
                        <span>Tanggal Transaksi:</span>
                        <span>{{ \Carbon\Carbon::parse($transaksi->Tanggal_Transaksi)->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="info-row">
                        <span>Ekspedisi:</span>
                        <span>{{ $transaksi->Ekspedisi }}</span>
                    </div>
                    <div class="info-row">
                        <span>Metode Pembayaran:</span>
                        <span>
                            @if($transaksi->metode_pembayaran == 'transfer')
                                Transfer Bank
                            @else
                                Cash on Delivery
                            @endif
                        </span>
                    </div>
                    <div class="info-row">
                        <span>Total Pembayaran:</span>
                        <span>Rp {{ number_format($transaksi->Total_harga, 0, ',', '.') }}</span>
                    </div>
                </div>

                <!-- Requirements -->
                <div class="requirements">
                    <div class="requirements-title">
                        <i class="fas fa-info-circle"></i>
                        Syarat Upload Bukti Pembayaran:
                    </div>
                    <ul class="requirements-list">
                        <li>File harus berupa gambar (JPG, JPEG, PNG)</li>
                        <li>Maksimal ukuran file 2MB</li>
                        <li>Gambar harus jelas dan dapat dibaca</li>
                        <li>Pastikan nominal pembayaran sesuai dengan total pesanan</li>
                        <li>Pastikan tanggal transfer masih valid (dalam 24 jam)</li>
                    </ul>
                </div>

                <!-- Upload Form -->
                <form action="{{ route('payment.process-upload', $transaksi->id_transaksi) }}" method="POST" enctype="multipart/form-data" class="upload-form">
                    @csrf

                    <div class="form-section">
                        <h3 class="section-title">Upload Bukti Pembayaran</h3>

                        <div class="form-group">
                            <label class="form-label" for="bukti_pembayaran">Pilih File Bukti Pembayaran</label>
                            <div class="file-upload">
                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/jpeg,image/jpg,image/png" required>
                                <label for="bukti_pembayaran" class="file-upload-label" id="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                    <div class="upload-text">Klik untuk pilih file atau drag & drop</div>
                                    <div class="upload-subtitle">JPG, JPEG, PNG maksimal 2MB</div>
                                </label>
                                <div class="file-preview" id="file-preview">
                                    <div class="file-info">
                                        <i class="fas fa-file-image file-icon"></i>
                                        <div class="file-details">
                                            <div class="file-name" id="file-name"></div>
                                            <div class="file-size" id="file-size"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload" style="margin-right: 8px;"></i>
                            Upload Bukti Pembayaran
                        </button>
                        <a href="{{ route('payment.qris', $transaksi->id_transaksi) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('bukti_pembayaran').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const label = document.getElementById('file-upload-label');
            const preview = document.getElementById('file-preview');
            const fileName = document.getElementById('file-name');
            const fileSize = document.getElementById('file-size');

            if (file) {
                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Tipe file tidak valid. Silakan pilih file JPG, JPEG, atau PNG.');
                    e.target.value = '';
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    e.target.value = '';
                    return;
                }

                // Show file preview
                label.classList.add('has-file');
                preview.style.display = 'block';
                fileName.textContent = file.name;
                fileSize.textContent = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
            } else {
                label.classList.remove('has-file');
                preview.style.display = 'none';
            }
        });

        // Drag and drop functionality
        const label = document.getElementById('file-upload-label');
        const fileInput = document.getElementById('bukti_pembayaran');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            label.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            label.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            label.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            label.style.borderColor = '#78350f';
            label.style.background = '#fffbeb';
        }

        function unhighlight(e) {
            label.style.borderColor = '#e7e5e4';
            label.style.background = '#fafafa';
        }

        label.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                fileInput.files = files;
                fileInput.dispatchEvent(new Event('change'));
            }
        }
    </script>
</body>
</html>
