<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $table = 'visits'; // Nama tabel di database

    protected $fillable = ['user_id', 'ip_address', 'created_at']; // Tambahkan field yang diperlukan
}
