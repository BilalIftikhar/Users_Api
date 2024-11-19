<?php

// app/Http/Controllers/AgriculturalEquipmentController.php
namespace App\Http\Controllers;

use App\Models\AgriculturalEquipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgriculturalEquipmentController extends Controller
{
    public function index()
    {
        // Fetch all equipment with pagination (10 per page)
        $equipment = AgriculturalEquipment::paginate(10);

        // Return the index view with data
        return view('admin.agricultural_equipment.index', compact('equipment'));
    }
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
        $picturePath = $request->file('picture')
            ? $request->file('picture')->store('equipments', 'public')
            : null;


        AgriculturalEquipment::create([
            'name' => $request->name,
            'description' => $request->description,
            'picture' => $picturePath,
            'audio_link' => $request->audio_link,
            'video_link' => $request->video_link,
        ]);

        return redirect()->route('admin.agricultural_equipment.index')->with('success', 'Equipment added successfully.');
    }

    // API to get all equipment
    public function getAgricultureEquipment()
    {
        $equipments = AgriculturalEquipment::all();
        return response()->json($equipments);
    }
}
