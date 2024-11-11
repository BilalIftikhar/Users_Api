<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function create()
    {
        return view('admin.city.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        City::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.city.create')->with('success', 'City added successfully!');
    }
}
