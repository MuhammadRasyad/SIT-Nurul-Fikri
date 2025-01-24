<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['rfid_card_id', 'attendance_date', 'status'];

    public function rfidCard()
    {
        return $this->belongsTo(RfidCard::class, 'rfid_card_id');
    }
}
