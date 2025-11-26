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
        Schema::create('t_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_user');
            $table->decimal('Total_harga', 12, 2); // 12 digits total, 2 decimal places
            $table->string('Ekspedisi');
            $table->enum('Status_Pembayaran', ['Menunggu', 'Berhasil', 'Gagal'])->default('Menunggu');
            $table->string('Bukti_Pembayaran')->nullable(); // for image path
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('id_user')->references('id_user')->on('t_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_transaksi');
    }
};
