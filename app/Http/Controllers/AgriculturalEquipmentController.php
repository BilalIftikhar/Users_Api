<?php

// app/Http/Controllers/AgriculturalEquipmentController.php
namespace App\Http\Controllers;

use App\Models\AgriculturalEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgriculturalEquipmentController extends Controller
{
    // Display the form to add new equipment
    public function create()
    {
        return view('admin.agricultural_equipment.create');
    }

    // Store new equipment data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png',
            'audio_link' => 'nullable|string',
            'video_link' => 'nullable|string',
        ]);

        // Handle file upload if there's an image
        $picturePath = $request->file('picture') ? $request->file('picture')->store('equipments') : null;

        AgriculturalEquipment::create([
            'name' => $request->name,
            'description' => $request->description,
            'picture' => $picturePath,
            'audio_link' => $request->audio_link,
            'video_link' => $request->video_link,
        ]);

        return redirect()->route('admin.agricultural_equipment.create')->with('success', 'Equipment added successfully.');
    }

    // API to get all equipment
    public function index()
    {
        $equipments = AgriculturalEquipment::all();
        return response()->json($equipments);
    }
}

