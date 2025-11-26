# Debug Instructions untuk Login Issues

## Langkah-langkah Debugging:

### 1. Cek Database Setup
```bash
# Pastikan XAMPP MySQL running
# Buat database jika belum ada
mysql -u root -p
CREATE DATABASE bookstore;
exit

# Jalankan migrations
php artisan migrate

# Jalankan seeder untuk data test
php artisan db:seed
```

### 2. Cek Environment
```bash
# Copy .env.example ke .env jika belum
cp .env.example .env

# Generate app key
php artisan key:generate

# Clear cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### 3. Test Manual Login
**Admin Test:**
- Username: `admin`
- Email: `admin@bookhaven.com` 
- Password: `admin123`

**User Test:**
- Username: `user`
- Email: `user@bookhaven.com`
- Password: `user123`

### 4. Cek Error Logs
```bash
# Lihat Laravel logs
tail -f storage/logs/laravel.log

# Atau cek di browser developer tools:
# F12 → Network tab → Submit login form → Lihat response
```

### 5. Debug Routes
```bash
# Cek semua routes yang tersedia
php artisan route:list
```

### 6. Kemungkinan Masalah:

#### A. Session Storage Issue
- Pastikan folder `storage/framework/sessions` writable
- Cek setting SESSION_DRIVER di .env (harus `database`)

#### B. Database Connection Issue  
- Cek setting DB_* di .env
- Pastikan MySQL running di port 3306

#### C. Authentication Model Issue
- Model User menggunakan custom table `t_user`
- Primary key custom `id_user`
- Password field custom `Password`

### 7. Test di Browser:
1. Buka `/login` 
2. F12 → Network tab
3. Masukkan credentials test
4. Submit form
5. Lihat response:
   - Status code harus 302 (redirect)
   - Location header harus mengarah ke dashboard
   
### 8. Jika Masih Error:
Tambahkan debugging di AuthController:

```php
// Tambahkan setelah Auth::loginUsingId()
Log::info('User logged in:', ['user_id' => $user->id_user, 'auth_check' => Auth::check()]);
```

Lalu lihat di `storage/logs/laravel.log` untuk debug info.
