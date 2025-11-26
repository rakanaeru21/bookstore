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
        Schema::create('t_detail_transaksi', function (Blueprint $table) {
            $table->id('id_detail_transaksi');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_user_customer'); // user dengan role 'User'
            $table->unsignedBigInteger('id_user_admin')->nullable(); // user dengan role 'Admin'
            $table->unsignedBigInteger('id_buku');
            $table->integer('kuantiti');
            $table->decimal('harga', 10, 2); // 10 digits total, 2 decimal places
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('id_transaksi')->references('id_transaksi')->on('t_transaksi')->onDelete('cascade');
            $table->foreign('id_user_customer')->references('id_user')->on('t_user')->onDelete('cascade');
            $table->foreign('id_user_admin')->references('id_user')->on('t_user')->onDelete('set null');
            $table->foreign('id_buku')->references('id_buku')->on('t_buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_detail_transaksi');
    }
};
