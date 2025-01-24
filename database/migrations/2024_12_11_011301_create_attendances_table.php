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
        Schema::create('attendances', function (Blueprint $table) {
                   $table->id();
            $table->foreignId('rfid_card_id')->constrained('rfid_cards')->onDelete('cascade');
            $table->date('attendance_date');
            $table->enum('status', ['hadir', 'izin', 'alfa'])->default('hadir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
