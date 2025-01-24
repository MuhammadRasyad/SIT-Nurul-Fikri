<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = ['unit_id', 'name', 'nisn', 'status', 'ppdb_id'];
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    
    public function ppdb()
{
    return $this->belongsTo(Ppdb::class);
}


}
