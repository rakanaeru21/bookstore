# BookHaven Authentication System

## Setup Database

1. **Buat Database MySQL**
   ```sql
   CREATE DATABASE bookstore;
   ```

2. **Copy Environment Configuration**
   ```bash
   cp .env.example .env
   ```

3. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

4. **Run Migrations**
   ```bash
   php artisan migrate
   ```

5. **Run Seeders (Opsional - untuk data test)**
   ```bash
   php artisan db:seed
   ```

## Default Users (Setelah Seeding)

### Admin Account
- **Username**: `admin`
- **Email**: `admin@bookhaven.com` 
- **Password**: `admin123`
- **Role**: Admin

### User Account
- **Username**: `user`
- **Email**: `user@bookhaven.com`
- **Password**: `user123` 
- **Role**: User

## Fitur Authentication

### 1. Register
- URL: `/register`
- Form fields:
  - Nama Lengkap (required)
  - Username (required, unique)
  - Email (required, unique)
  - No. Handphone (required)
  - Alamat (required)
  - Password (required, min: 8 characters)
  - Konfirmasi Password (required, must match)
- Default role: User
- Auto login setelah register berhasil

### 2. Login
- URL: `/login`
- Support login dengan Username atau Email
- Checkbox "Ingat saya" untuk remember token
- Redirect berdasarkan role:
  - Admin → `/admin/dashboard`
  - User → `/user/dashboard`

### 3. Logout
- Method: POST `/logout`
- Invalidate session dan redirect ke homepage

### 4. Role-based Dashboard

#### Admin Dashboard (`/admin/dashboard`)
- Statistik pengguna
- Quick actions untuk manajemen
- Hanya bisa diakses oleh user dengan role "Admin"

#### User Dashboard (`/user/dashboard`)
- Profil user
- Fitur untuk user biasa
- Hanya bisa diakses oleh user dengan role "User"

### 5. Middleware Protection

#### RoleMiddleware
- Proteksi route berdasarkan role
- Usage: `Route::middleware(['role:Admin'])->group(...)`
- Auto redirect jika role tidak sesuai

## Database Schema

### Tabel: `t_user`
- `id_user` (Primary Key)
- `Nama_Lengkap` (VARCHAR)
- `Username` (VARCHAR, Unique)
- `Email` (VARCHAR, Unique) 
- `NoHp` (VARCHAR)
- `Alamat` (TEXT)
- `Password` (VARCHAR, Hashed)
- `Role` (ENUM: 'Admin', 'User', Default: 'User')
- `created_at`, `updated_at` (Timestamps)

## Security Features

1. **Password Hashing**: Menggunakan bcrypt
2. **CSRF Protection**: Token CSRF di semua form
3. **Input Validation**: Server-side validation untuk semua input
4. **Role-based Access**: Middleware untuk proteksi route
5. **Session Security**: Session invalidation saat logout

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   └── DashboardController.php
│   └── Middleware/
│       └── RoleMiddleware.php
└── Models/
    └── User.php

resources/views/
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
├── admin/
│   └── dashboard.blade.php
├── user/
│   └── dashboard.blade.php
└── welcome.blade.php

database/
├── migrations/
│   └── 0001_01_01_000000_create_users_table.php
└── seeders/
    ├── UserSeeder.php
    └── DatabaseSeeder.php

routes/
└── web.php
```

## Usage Examples

### Checking Authentication in Views
```php
@auth
    <p>Hello {{ Auth::user()->Nama_Lengkap }}!</p>
@endauth

@guest
    <a href="/login">Login</a>
@endguest
```

### Checking Role in Views  
```php
@if(Auth::user()->isAdmin())
    <a href="/admin/dashboard">Admin Panel</a>
@endif

@if(Auth::user()->isUser())
    <a href="/user/dashboard">Dashboard</a>
@endif
```

### Route Protection
```php
// Hanya Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);
});

// Hanya User
Route::middleware(['auth', 'role:User'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'userDashboard']);
});
```

## Troubleshooting

1. **Migration Error**: Pastikan database sudah dibuat dan konfigurasi `.env` benar
2. **Login Failed**: Periksa case-sensitivity pada Username/Email
3. **Access Denied**: Pastikan user memiliki role yang tepat
4. **Session Issue**: Clear browser cache atau regenerate app key

## Customization

Untuk menambah role baru:
1. Update migration enum `Role`
2. Tambah method di User model (contoh: `isManager()`)
3. Update middleware dan controller sesuai kebutuhan
