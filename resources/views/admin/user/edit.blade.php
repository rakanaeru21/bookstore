<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna - BookHaven</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background:#f8f9fa; color:#2c2416; }
        .container { max-width:900px; margin:60px auto; padding:20px; }
        .card { background:white; border-radius:12px; padding:24px; box-shadow:0 6px 20px rgba(0,0,0,0.06); border:1px solid #e8dcc8; }
        .back { display:inline-flex; align-items:center; gap:8px; color:#8b4513; text-decoration:none; margin-bottom:16px; }
        .form-group { margin-bottom:16px; }
        label { display:block; font-weight:600; margin-bottom:6px; color:#6b5d4f; }
        input[type=text], input[type=email], input[type=password], textarea, select { width:100%; padding:12px 14px; border-radius:8px; border:1px solid #e8dcc8; font-size:14px; }
        textarea { min-height:100px; }
        .actions { display:flex; gap:8px; margin-top:12px; }
        .btn { padding:10px 14px; border-radius:8px; text-decoration:none; color:white; font-weight:600; border:none; cursor:pointer; }
        .btn-primary { background:#8b4513; }
        .btn-secondary { background:#6c757d; }
        .error { color:#dc3545; font-size:13px; margin-top:6px; }
    </style>
    </head>
<body>
    <div class="container">
        <a href="{{ route('admin.user.show', $user->id_user) }}" class="back"><i class="fas fa-arrow-left"></i> Kembali ke detail</a>
        <div class="card">
            <h2 style="margin-bottom:8px">Edit Pengguna</h2>
            <p style="color:#6b5d4f;margin-bottom:16px">Ubah data pengguna sesuai kebutuhan</p>

            <form method="POST" action="{{ route('admin.user.update', $user->id_user) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="Nama_Lengkap">Nama Lengkap</label>
                    <input type="text" id="Nama_Lengkap" name="Nama_Lengkap" value="{{ old('Nama_Lengkap', $user->Nama_Lengkap ?? $user->name) }}">
                    @error('Nama_Lengkap') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="Username">Username</label>
                    <input type="text" id="Username" name="Username" value="{{ old('Username', $user->Username) }}">
                    @error('Username') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" id="Email" name="Email" value="{{ old('Email', $user->Email ?? $user->email) }}">
                    @error('Email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="NoHp">No. HP</label>
                    <input type="text" id="NoHp" name="NoHp" value="{{ old('NoHp', $user->NoHp) }}">
                    @error('NoHp') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <textarea id="Alamat" name="Alamat">{{ old('Alamat', $user->Alamat) }}</textarea>
                    @error('Alamat') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="Role">Role</label>
                    <select id="Role" name="Role">
                        <option value="User" {{ old('Role', $user->Role) == 'User' ? 'selected' : '' }}>User</option>
                        <option value="Admin" {{ old('Role', $user->Role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('Role') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="Password">Password (kosongkan jika tidak ingin mengubah)</label>
                    <input type="password" id="Password" name="Password">
                    @error('Password') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="actions">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                    <a href="{{ route('admin.user.show', $user->id_user) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
