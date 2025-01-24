<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;

class ClassRoomController extends Controller
{
 public function index()
    {
        $classes = ClassRoom::all(); // Get all classrooms
        return view('iot.class.index', compact('classes')); // Pass data to the view
    }

    public function create()
    {
        return view('iot.class.create'); // Return the create class view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:class_rooms',
            'is_open' => 'required|boolean', // Ensure that status is a boolean
        ]);

        // Create a new class room
        ClassRoom::create([
            'name' => $request->name,
            'is_open' => $request->is_open, // Save the status as well (1 or 0)
        ]);

        // Redirect to the class index page with a success message
        return redirect()->route('class.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function toggleStatus(Request $request)
    {
        // Find the class by ID
        $class = ClassRoom::findOrFail($request->id);

        // Toggle the status (active <=> inactive)
        $class->is_open = !$class->is_open;

        // Save the class with the new status
        $class->save();

        // Return a JSON response
        return response()->json(['message' => 'Status kelas berhasil diubah!']);
    }
}
