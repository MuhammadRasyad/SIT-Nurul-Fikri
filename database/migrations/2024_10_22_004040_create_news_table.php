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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image');
            $table->enum('unit', ['TK', 'SD', 'SMP', 'Utama']);
            $table->enum('category', ['program', 'extracurricular', 'activity', 'achievement']);
            $table->boolean('trending')->default(false);
            $table->unsignedBigInteger('user_id'); // Refers to user who uploaded the news
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Foreign key to the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
