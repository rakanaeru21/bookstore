<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna - BookHaven</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: Arial, sans-serif; background:#f8f9fa; color:#2c2416; }
        .container { max-width:900px; margin:60px auto; padding:20px; }
        .card { background:white; border-radius:12px; padding:24px; box-shadow:0 6px 20px rgba(0,0,0,0.06); border:1px solid #e8dcc8; }
        .back { display:inline-flex; align-items:center; gap:8px; color:#8b4513; text-decoration:none; margin-bottom:16px; }
        .header { display:flex; justify-content:space-between; align-items:center; margin-bottom:12px; }
        .title { font-size:22px; font-weight:700; }
        .meta { color:#6b5d4f; }
        .detail-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-top:16px; }
        .field { background:#fbfaf8; padding:12px; border-radius:8px; border:1px solid #f1e8dc; }
        .label { font-size:12px; color:#6b5d4f; font-weight:600; margin-bottom:6px; }
        .value { font-size:16px; font-weight:600; color:#2c2416; }
        .actions { display:flex; gap:8px; margin-top:18px; }
        .btn { padding:10px 14px; border-radius:8px; text-decoration:none; color:white; font-weight:600; }
        .btn-primary { background:#8b4513; }
        .btn-secondary { background:#6c757d; }
        .btn-danger { background:#dc3545; }
    </style>
    </head>
<body>
    <div class="container">
        <a href="{{ route('admin.user.index') }}" class="back"><i class="fas fa-arrow-left"></i> Kembali ke daftar pengguna</a>

        <div class="card">
            <div class="header">
                <div>
                    <div class="title">{{ $user->Nama_Lengkap ?? $user->name }}</div>
                    <div class="meta">ID: #{{ $user->id_user }}</div>
                </div>
                <div>
                    <div class="meta">Terdaftar: {{ optional($user->created_at)->format('d M Y, H:i') }}</div>
                </div>
            </div>

            <div class="detail-grid">
                <div class="field">
                    <div class="label">Nama Lengkap</div>
                    <div class="value">{{ $user->Nama_Lengkap ?? $user->name }}</div>
                </div>
                <div class="field">
                    <div class="label">Username</div>
                    <div class="value">{{ $user->Username ?? '-' }}</div>
                </div>

                <div class="field">
                    <div class="label">Email</div>
                    <div class="value">{{ $user->Email ?? $user->email }}</div>
                </div>
                <div class="field">
                    <div class="label">No. HP</div>
                    <div class="value">{{ $user->NoHp ?? '-' }}</div>
                </div>

                <div class="field" style="grid-column:1 / -1;">
                    <div class="label">Alamat</div>
                    <div class="value">{{ $user->Alamat ?? '-' }}</div>
                </div>

                <div class="field">
                    <div class="label">Role</div>
                    <div class="value">{{ $user->Role ?? '-' }}</div>
                </div>
                <div class="field">
                    <div class="label">Terakhir Diubah</div>
                    <div class="value">{{ optional($user->updated_at)->format('d M Y, H:i') }}</div>
                </div>
            </div>

            <div class="actions">
                <a href="{{ route('admin.user.edit', $user->id_user) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>

                <form method="POST" action="{{ route('admin.user.destroy', $user->id_user) }}" onsubmit="return confirm('Anda yakin ingin menghapus pengguna ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Hapus</button>
                </form>

                <a href="{{ route('admin.user.index') }}" class="btn btn-secondary"><i class="fas fa-list"></i> Daftar Pengguna</a>
            </div>
        </div>
    </div>
</body>
</html>
