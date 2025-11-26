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
        Schema::create('t_buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('Judul');
            $table->string('Pengarang');
            $table->unsignedBigInteger('id_kategori');
            $table->text('Sinopsis');
            $table->string('ISBN')->unique();
            $table->integer('Tahun_Terbit');
            $table->string('Penerbit');
            $table->string('Cover')->nullable(); // for image path
            $table->integer('Stok')->default(0);
            $table->decimal('Harga', 10, 2); // 10 digits total, 2 decimal places
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('id_kategori')->references('id_kategori')->on('t_kategori')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_buku');
    }
};
