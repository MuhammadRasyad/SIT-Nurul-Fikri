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
    Schema::table('applicants', function (Blueprint $table) {
        $table->unsignedBigInteger('ppdb_id');  // Menambahkan kolom ppdb_id
        $table->foreign('ppdb_id')->references('id')->on('ppdbs')->onDelete('cascade');  // Menambahkan relasi foreign key
    });
}

public function down()
{
    Schema::table('applicants', function (Blueprint $table) {
        $table->dropForeign(['ppdb_id']);
        $table->dropColumn('ppdb_id');
    });
}

};
