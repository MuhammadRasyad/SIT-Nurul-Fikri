<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
    {
          Schema::create('visitors', function (Blueprint $table) {
            $table->id(); // Kolom ID utama
            $table->string('ip_address')->unique(); // Kolom untuk menyimpan IP pengunjung (unik)
            $table->timestamp('last_active'); // Kolom untuk mencatat waktu terakhir aktif
            $table->timestamps(); // Kolom bawaan Laravel: created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitors'); // Menghapus tabel jika rollback
    }
};
