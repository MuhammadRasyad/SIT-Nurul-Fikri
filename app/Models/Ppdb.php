<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'start_date', 'end_date', 'status'];
      
      public function units()
    {
        return $this->hasMany(Unit::class);
    }
    
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
    
    
    public function getRemainingQuotaAttribute()
    {
        $totalQuota = $this->units->sum('quota');
        $totalApplicants = $this->applicants()->count();
        return $totalQuota - $totalApplicants;
    }

     
}
