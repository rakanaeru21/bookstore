<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('t_transaksi', function (Blueprint $table) {
            $table->timestamp('Tanggal_Transaksi')->after('id_user');
            $table->string('Status', 50)->default('Pending')->after('Status_Pembayaran');
            $table->text('alamat_pengiriman')->after('Bukti_Pembayaran');
            $table->string('nomor_telepon', 20)->after('alamat_pengiriman');
            $table->string('metode_pembayaran', 20)->after('nomor_telepon');
            $table->text('catatan')->nullable()->after('metode_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_transaksi', function (Blueprint $table) {
            $table->dropColumn(['Tanggal_Transaksi', 'Status', 'alamat_pengiriman', 'nomor_telepon', 'metode_pembayaran', 'catatan']);
        });
    }
};
