<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RfidCard;

class RfidCardController extends Controller
{
    public function index()
    {
        $rfidCards = RfidCard::all();
        return view('rfid.index', compact('rfidCards'));
    }

    public function registerCard(Request $request)
    {
        $request->validate([
            'uid' => 'required|unique:rfid_cards',
            'name' => 'required',
        ]);

        RfidCard::create($request->all());
        return response()->json(['message' => 'RFID berhasil didaftarkan!']);
    }
}
