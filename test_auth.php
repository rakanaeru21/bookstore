<?php

// Test script untuk debug authentication
// Jalankan dengan: php test_auth.php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Hash;

// Setup database connection
$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'bookstore',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

try {
    // Test koneksi database
    $pdo = $capsule->getConnection()->getPdo();
    echo "✅ Database connection berhasil!\n\n";

    // Test apakah tabel t_user ada
    $tables = $capsule->getConnection()->select("SHOW TABLES LIKE 't_user'");
    if (empty($tables)) {
        echo "❌ Tabel t_user tidak ditemukan!\n";
        echo "Jalankan: php artisan migrate\n";
        exit;
    }
    echo "✅ Tabel t_user ditemukan!\n\n";

    // Test struktur tabel
    $columns = $capsule->getConnection()->select("DESCRIBE t_user");
    echo "📋 Struktur tabel t_user:\n";
    foreach ($columns as $column) {
        echo "  - {$column->Field} ({$column->Type})\n";
    }
    echo "\n";

    // Test apakah ada data user
    $userCount = $capsule->table('t_user')->count();
    echo "👥 Jumlah user: {$userCount}\n";

    if ($userCount == 0) {
        echo "⚠️  Tidak ada user. Jalankan: php artisan db:seed\n";
    } else {
        echo "📝 Data user yang ada:\n";
        $users = $capsule->table('t_user')->select(['id_user', 'Username', 'Email', 'Role'])->get();
        foreach ($users as $user) {
            echo "  - ID: {$user->id_user}, Username: {$user->Username}, Email: {$user->Email}, Role: {$user->Role}\n";
        }
    }

    echo "\n✅ Database setup terlihat benar!\n";

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Pastikan:\n";
    echo "1. XAMPP MySQL berjalan\n";
    echo "2. Database 'bookstore' sudah dibuat\n";
    echo "3. File .env sudah dikonfigurasi dengan benar\n";
}
