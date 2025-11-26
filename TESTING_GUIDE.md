# Test Authentication System

## Manual Testing Steps

### 1. Test Register
- [ ] Buka `/register`
- [ ] Isi form dengan data valid
- [ ] Submit form
- [ ] Cek apakah redirect ke dashboard user
- [ ] Cek apakah pesan sukses muncul

### 2. Test Login Admin
- [ ] Buka `/login`
- [ ] Login dengan username: `admin` password: `admin123`
- [ ] Cek redirect ke `/admin/dashboard`
- [ ] Cek pesan welcome dengan nama lengkap

### 3. Test Login User
- [ ] Logout dari admin
- [ ] Buka `/login`
- [ ] Login dengan username: `user` password: `user123`
- [ ] Cek redirect ke `/user/dashboard`
- [ ] Cek pesan welcome dengan nama lengkap

### 4. Test Access Control
- [ ] Sebagai user, coba akses `/admin/dashboard`
- [ ] Harus redirect ke `/user/dashboard` dengan pesan error
- [ ] Sebagai admin, coba akses `/user/dashboard`
- [ ] Harus redirect ke `/admin/dashboard` dengan pesan error

### 5. Test Guest Access
- [ ] Logout
- [ ] Coba akses `/admin/dashboard` atau `/user/dashboard`
- [ ] Harus redirect ke `/login`
- [ ] Login kemudian coba akses `/login` atau `/register`
- [ ] Harus redirect ke dashboard sesuai role

## Database Commands

```bash
# Create database
mysql -u root -p
CREATE DATABASE bookstore;
exit

# Setup Laravel
php artisan key:generate
php artisan migrate
php artisan db:seed

# Start server
php artisan serve
```

## Expected Behavior

### User Registration:
- Form validation berjalan
- Password di-hash dengan bcrypt
- Default role = 'User'
- Auto login setelah register
- Redirect ke `/user/dashboard`

### User Login:
- Support login dengan username atau email
- Password verification dengan Hash::check()
- Role-based redirect:
  - Admin → `/admin/dashboard`
  - User → `/user/dashboard`
- Remember me functionality
- Session regeneration untuk security

### Access Control:
- Guest middleware untuk login/register pages
- Auth middleware untuk protected routes
- Role middleware untuk role-specific routes
- Auto redirect jika akses tidak sesuai role

### Security Features:
- CSRF protection di semua form
- Password hashing dengan bcrypt
- Session regeneration saat login
- Session invalidation saat logout
- Input validation server-side

## Troubleshooting

1. **Database Connection**: Pastikan XAMPP MySQL running dan database `bookstore` sudah dibuat
2. **Migration Error**: Jalankan `php artisan migrate:fresh --seed` untuk reset
3. **Session Issue**: Clear browser cookies atau jalankan `php artisan config:clear`
4. **Permission Error**: Pastikan storage dan bootstrap/cache writable
