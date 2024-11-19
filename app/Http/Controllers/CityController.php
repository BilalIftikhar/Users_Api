<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::paginate(10); // Fetch all cities
        return view('admin.city.index', compact('cities'));
    }
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

        return redirect()->route('admin.city.index')->with('success', 'City added successfully!');
    }
    public function getCity()
    {
        // Fetch all cities from the database
        $cities = City::all();

        // Return the cities in a JSON format
        return response()->json([
            'success' => true,
            'data' => $cities
        ]);
    }
}
