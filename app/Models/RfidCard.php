<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfidCard extends Model
{
    use HasFactory;

    protected $fillable = ['rfid_uid', 'student_name', 'class_id'];

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}
