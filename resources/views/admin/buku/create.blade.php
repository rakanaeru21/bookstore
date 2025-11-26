<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku - BookHaven</title>
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
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b5d4f;
        }

        .form-container {
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            border: 1px solid #e8dcc8;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e8dcc8;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 6px;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload-input {
            position: absolute;
            left: -9999px;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            padding: 24px;
            border: 2px dashed #e8dcc8;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
            color: #6b5d4f;
        }

        .file-upload-label:hover {
            border-color: #8b4513;
            background: rgba(139, 69, 19, 0.05);
            color: #8b4513;
        }

        .file-upload-label i {
            font-size: 24px;
        }

        .preview-container {
            margin-top: 16px;
            text-align: center;
        }

        .preview-image {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn {
            padding: 14px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 16px;
        }

        .btn-primary {
            background: #8b4513;
            color: white;
        }

        .btn-primary:hover {
            background: #6d3610;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #545b62;
        }

        .form-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e8dcc8;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #8b4513;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #6d3610;
        }

        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .required {
            color: #dc3545;
        }

        @media (max-width: 768px) {
            .container {
                padding: 16px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .header {
                padding: 24px 16px;
            }

            .form-container {
                padding: 24px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('admin.buku.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Buku
        </a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="header">
            <h1>Tambah Buku Baru</h1>
            <p>Tambahkan buku baru ke dalam koleksi BookHaven</p>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('admin.buku.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="Judul" class="form-label">Judul Buku <span class="required">*</span></label>
                        <input
                            type="text"
                            id="Judul"
                            name="Judul"
                            class="form-input"
                            value="{{ old('Judul') }}"
                            required
                            placeholder="Masukkan judul buku"
                        >
                        @error('Judul')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Pengarang" class="form-label">Pengarang <span class="required">*</span></label>
                        <input
                            type="text"
                            id="Pengarang"
                            name="Pengarang"
                            class="form-input"
                            value="{{ old('Pengarang') }}"
                            required
                            placeholder="Masukkan nama pengarang"
                        >
                        @error('Pengarang')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_kategori" class="form-label">Kategori <span class="required">*</span></label>
                    <select id="id_kategori" name="id_kategori" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id_kategori }}" {{ old('id_kategori') == $category->id_kategori ? 'selected' : '' }}>
                                {{ $category->Nama_Kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Sinopsis" class="form-label">Sinopsis <span class="required">*</span></label>
                    <textarea
                        id="Sinopsis"
                        name="Sinopsis"
                        class="form-textarea"
                        required
                        placeholder="Masukkan sinopsis buku"
                    >{{ old('Sinopsis') }}</textarea>
                    @error('Sinopsis')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="ISBN" class="form-label">ISBN <span class="required">*</span></label>
                        <input
                            type="text"
                            id="ISBN"
                            name="ISBN"
                            class="form-input"
                            value="{{ old('ISBN') }}"
                            required
                            placeholder="Masukkan nomor ISBN"
                            maxlength="13"
                        >
                        @error('ISBN')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Tahun_Terbit" class="form-label">Tahun Terbit <span class="required">*</span></label>
                        <input
                            type="number"
                            id="Tahun_Terbit"
                            name="Tahun_Terbit"
                            class="form-input"
                            value="{{ old('Tahun_Terbit') }}"
                            required
                            min="1900"
                            max="{{ date('Y') }}"
                            placeholder="Contoh: 2023"
                        >
                        @error('Tahun_Terbit')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="Penerbit" class="form-label">Penerbit <span class="required">*</span></label>
                    <input
                        type="text"
                        id="Penerbit"
                        name="Penerbit"
                        class="form-input"
                        value="{{ old('Penerbit') }}"
                        required
                        placeholder="Masukkan nama penerbit"
                    >
                    @error('Penerbit')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="Stok" class="form-label">Stok <span class="required">*</span></label>
                        <input
                            type="number"
                            id="Stok"
                            name="Stok"
                            class="form-input"
                            value="{{ old('Stok') }}"
                            required
                            min="0"
                            placeholder="Masukkan jumlah stok"
                        >
                        @error('Stok')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Harga" class="form-label">Harga (Rp) <span class="required">*</span></label>
                        <input
                            type="number"
                            id="Harga"
                            name="Harga"
                            class="form-input"
                            value="{{ old('Harga') }}"
                            required
                            min="0"
                            step="0.01"
                            placeholder="Masukkan harga buku"
                        >
                        @error('Harga')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="Cover" class="form-label">Cover Buku</label>
                    <div class="file-upload">
                        <input
                            type="file"
                            id="Cover"
                            name="Cover"
                            class="file-upload-input"
                            accept="image/jpeg,image/png,image/jpg,image/gif"
                            onchange="previewImage(this)"
                        >
                        <label for="Cover" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Pilih gambar cover atau drag & drop di sini</span>
                        </label>
                    </div>
                    <div class="preview-container" id="imagePreview" style="display: none;">
                        <img id="preview" class="preview-image" alt="Preview">
                    </div>
                    <small style="color: #6b5d4f; margin-top: 8px; display: block;">
                        Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                    </small>
                    @error('Cover')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Buku
                    </button>
                    <a href="{{ route('admin.buku.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.style.display = 'none';
            }
        }

        // File upload drag and drop functionality
        const fileUploadLabel = document.querySelector('.file-upload-label');
        const fileInput = document.getElementById('Cover');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            fileUploadLabel.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            fileUploadLabel.style.borderColor = '#8b4513';
            fileUploadLabel.style.background = 'rgba(139, 69, 19, 0.05)';
        }

        function unhighlight(e) {
            fileUploadLabel.style.borderColor = '#e8dcc8';
            fileUploadLabel.style.background = '#f8f9fa';
        }

        fileUploadLabel.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            fileInput.files = files;
            previewImage(fileInput);
        }
    </script>
</body>
</html>
