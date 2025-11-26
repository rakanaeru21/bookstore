# Fitur Keranjang Belanja - BookHaven

## Fitur yang Telah Diimplementasi

### 1. **Tambah ke Keranjang**
- User dapat menambahkan buku ke keranjang dari dashboard
- Validasi stok tersedia sebelum menambah ke keranjang
- Jika buku sudah ada di keranjang, quantity akan bertambah
- Notifikasi sukses/error yang informatif

### 2. **Beli Sekarang**
- Langsung menambah buku ke keranjang dan redirect ke halaman cart
- Sama dengan "Tambah ke Keranjang" tapi langsung ke checkout

### 3. **Halaman Keranjang (/cart)**
- Tampilan semua item yang ada di keranjang
- Update quantity item
- Hapus item dari keranjang
- Kosongkan seluruh keranjang
- Ringkasan total harga
- Navigasi kembali untuk belanja lagi

### 4. **Validasi Stok**
- Cek stok tersedia saat menambah ke keranjang
- Batasi quantity berdasarkan stok yang tersedia
- Tampilan status stok di dashboard (tersedia/terbatas/habis)
- Tombol disabled jika stok habis

### 5. **Indikator Keranjang**
- Badge counter di tombol keranjang menampilkan total item
- Update realtime setelah menambah/mengurangi item

## Route yang Tersedia

```php
// Cart routes (memerlukan autentikasi)
POST   /cart/add       - Tambah buku ke keranjang
POST   /cart/buy-now   - Beli sekarang (tambah ke cart + redirect)
GET    /cart           - Tampilan halaman keranjang
POST   /cart/update    - Update quantity item di keranjang
POST   /cart/remove    - Hapus item dari keranjang
POST   /cart/clear     - Kosongkan semua item
```

## Teknologi yang Digunakan

- **Session-based Cart**: Menggunakan PHP session untuk menyimpan data keranjang
- **Laravel Validation**: Validasi input dan stok
- **Responsive Design**: Compatible dengan desktop dan mobile
- **Flash Messages**: Feedback sukses/error kepada user
- **CSRF Protection**: Keamanan form dengan token

## File yang Dimodifikasi/Dibuat

1. `app/Http/Controllers/CartController.php` - Logic keranjang
2. `resources/views/cart.blade.php` - Halaman keranjang (completely redesigned)
3. `resources/views/user/dashboard.blade.php` - Updated dengan link keranjang dan validasi stok
4. `routes/web.php` - Route keranjang dengan middleware auth

## Cara Penggunaan

1. **Login sebagai User** di sistem BookHaven
2. **Browsing buku** di dashboard user
3. **Klik "Tambah ke Keranjang"** pada buku yang diinginkan
4. **Atau klik "Beli Sekarang"** untuk langsung ke keranjang
5. **Klik tombol "🛒 Keranjang"** di header untuk melihat keranjang
6. **Kelola items** di halaman keranjang (update qty, hapus, dll)
7. **Proses Checkout** (fitur ini bisa dikembangkan selanjutnya)

## Next Steps / Pengembangan Lanjutan

- [ ] Sistem checkout dengan pembayaran
- [ ] Integrasi dengan tabel transaksi
- [ ] Wishlist/Save for later
- [ ] Persistent cart (database-based)
- [ ] Kupon diskon
- [ ] Kalkulasi ongkir
- [ ] Email notifikasi
- [ ] Riwayat pembelian

## Testing

Untuk testing, pastikan:
- Database sudah di-seed dengan data buku dan memiliki stok > 0
- User sudah terdaftar dan bisa login
- Server Laravel berjalan dengan `php artisan serve`

Fitur keranjang siap digunakan! 🎉
