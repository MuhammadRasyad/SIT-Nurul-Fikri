<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'image', 'unit', 'category', 'trending', 'user_id', 'published_at'
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // To get recent or trending news
    public function scopeTrending($query)
    {
        return $query->where('trending', true)->orderBy('published_at', 'desc');
    }
}
