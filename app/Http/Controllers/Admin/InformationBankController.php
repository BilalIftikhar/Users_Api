<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationBank;
use Illuminate\Http\Request;

class InformationBankController extends Controller
{
    // Show all entries
    public function index()
    {
        $entries = InformationBank::paginate(10); // Paginate results
        return view('admin.information_bank.index', compact('entries'));
    }

    // Show the create form
    public function create()
    {
        return view('admin.information_bank.create');
    }

    // Store a new entry
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'audio_link' => 'nullable|string|max:255',
            'video_link' => 'nullable|string|max:255',
        ]);

        $picturePath = $request->file('picture') ? $request->file('picture')->store('information_banks', 'public') : null;
       

        InformationBank::create([
            'name' => $request->name,
            'description' => $request->description,
            'picture' => $picturePath,
            'audio_link' => $request->audio_link,
            'video_link' => $request->video_link,
        ]);

        return redirect()->route('admin.information_bank.index')->with('success', 'Entry added successfully.');
    }

    // Fetch data for API
    public function fetchAll()
    {
        return response()->json(InformationBank::all(), 200);
    }
}
