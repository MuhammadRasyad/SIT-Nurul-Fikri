<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
     protected $fillable = ['ppdb_id', 'unit_name', 'quota', 'start_date', 'status'];

    public function ppdb()
    {
        return $this->belongsTo(Ppdb::class);
    }
    
       // PPDB Model (App\Models\PPDB)
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
    
    // Model Unit
    public function hasSufficientQuota()
    {
        // Ambil jumlah pendaftar yang sudah terdaftar di unit ini
        $currentRegistrations = $this->applicants()->count();
    
        // Periksa apakah jumlah pendaftar melebihi kuota
        return $currentRegistrations < $this->quota;
    }

    

}
