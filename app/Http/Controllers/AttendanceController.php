<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('rfidCard', 'classRoom')->get();
        return view('attendance.index', compact('attendances'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uid' => 'required',
            'device_name' => 'required',
        ]);

        $rfidCard = RfidCard::where('uid', $request->uid)->first();
        if (!$rfidCard) {
            return response()->json(['error' => 'RFID tidak terdaftar!'], 404);
        }

        Attendance::create([
            'rfid_card_id' => $rfidCard->id,
            'class_room_name' => $request->device_name,
            'status' => 'Hadir', // Default status
        ]);

        return response()->json(['message' => 'Absensi berhasil disimpan!']);
    }
}
