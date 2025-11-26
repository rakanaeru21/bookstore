<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - BookHaven</title>
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
            max-width: 600px;
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

        .form-label {
            display: block;
            font-weight: 600;
            color: #2c2416;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e8dcc8;
            border-radius: 12px;
            font-size: 18px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: #8b4513;
            box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
        }

        .form-error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 6px;
        }

        .btn {
            padding: 16px 32px;
            border-radius: 12px;
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

        .icon-preview {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            margin: 0 auto 20px auto;
            box-shadow: 0 8px 30px rgba(139, 69, 19, 0.3);
        }

        @media (max-width: 768px) {
            .container {
                padding: 16px;
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
        <a href="{{ route('admin.kategori.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar Kategori
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
            <div class="icon-preview">
                <i class="fas fa-tags"></i>
            </div>
            <h1>Tambah Kategori Baru</h1>
            <p>Buat kategori baru untuk mengorganisir buku di BookHaven</p>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('admin.kategori.store') }}">
                @csrf
                
                <div class="form-group">
                    <label for="Nama_Kategori" class="form-label">Nama Kategori <span class="required">*</span></label>
                    <input 
                        type="text" 
                        id="Nama_Kategori" 
                        name="Nama_Kategori" 
                        class="form-input" 
                        value="{{ old('Nama_Kategori') }}" 
                        required
                        placeholder="Masukkan nama kategori (contoh: Fiksi, Non-Fiksi, Sejarah, dll.)"
                        maxlength="255"
                    >
                    @error('Nama_Kategori')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                    <small style="color: #6b5d4f; margin-top: 8px; display: block;">
                        Nama kategori harus unik dan tidak boleh sama dengan kategori yang sudah ada.
                    </small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan Kategori
                    </button>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>