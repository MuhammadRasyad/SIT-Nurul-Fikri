<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('units', function (Blueprint $table) {
        $table->id();
        $table->foreignId('ppdb_id')->constrained('ppdbs')->onDelete('cascade');
        $table->string('unit_name');
        $table->integer('quota');
        $table->date('start_date')->nullable();
        $table->enum('status', ['not_started', 'in_progress', 'completed'])->default('not_started');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
