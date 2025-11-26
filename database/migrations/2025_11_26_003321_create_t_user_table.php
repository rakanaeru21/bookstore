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
        Schema::create('t_user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('Nama_Lengkap');
            $table->string('Username')->unique();
            $table->string('Email')->unique();
            $table->string('NoHp');
            $table->text('Alamat');
            $table->string('Password');
            $table->enum('Role', ['Admin', 'User'])->default('User');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_user');
    }
};
