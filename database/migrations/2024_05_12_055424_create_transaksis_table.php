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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constraint('user');
            $table->foreignId('jadwal_id')->constraint('jadwal');
            $table->foreignId('kursi_id')->constraint('kursi');
            $table->integer('jumlah_tiket');
            $table->decimal('total_harga');
            $table->enum('status_pembayaran',['pending','lunas','canceled','refunded']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
