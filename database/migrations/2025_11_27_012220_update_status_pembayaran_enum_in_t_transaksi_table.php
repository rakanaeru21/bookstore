<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update the enum to include 'Menunggu Verifikasi'
        DB::statement("ALTER TABLE t_transaksi MODIFY COLUMN Status_Pembayaran ENUM('Menunggu', 'Menunggu Verifikasi', 'Berhasil', 'Gagal') NOT NULL DEFAULT 'Menunggu'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE t_transaksi MODIFY COLUMN Status_Pembayaran ENUM('Menunggu', 'Berhasil', 'Gagal') NOT NULL DEFAULT 'Menunggu'");
    }
};
