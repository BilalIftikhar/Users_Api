<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAO;
use App\Models\City;

use Illuminate\Http\Request;

class FAOController extends Controller
{
    // Admin View: List FAO entries
    public function index()
    {
        $faos = FAO::paginate(10); // Paginate entries
        return view('admin.fao.index', compact('faos'));
    }

    // Admin View: Create FAO entry form
    public function create()
{
    $cities = City::all(); // Fetch all cities
    return view('admin.fao.create', compact('cities'));
}

    // Admin: Store FAO entry
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone_number' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'services' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        $servicesRaw = json_decode($request->services, true); // Decode the JSON string
        $servicesArray = array_map(function ($item) {
            return $item['value'] ?? null; // Extract 'value' from each item
        }, $servicesRaw);
    
        // Remove any null values
        $servicesArray = array_filter($servicesArray);

        $picturePath = $request->file('picture') ? $request->file('picture')->store('faos', 'public') : null;

        FAO::create([
            'name' => $request->name,
            'picture' => $picturePath,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
           'city_id' => $request->city_id, // Save city ID
            'services' => json_encode($servicesArray),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.fao.index')->with('success', 'FAO entry added successfully.');
    }

    // API: Fetch all FAO entries
    public function apiIndex()
    {
        return response()->json(FAO::with('city')->get());
    }

    // API: Filter FAO entries by city
    public function apiFilter(Request $request)
    {
        $faos = FAO::query();
    
        // if ($request->has('city_id')) {
        //     $faos->where('city_id', $request->city_id);
        // }
        // if ($request->has('name')) {
        //     $faos->where('name', 'like', '%' . $request->name . '%');
        // }
        $cityId = $request->city_id;
        $name = $request->name;

    if ($cityId || $name) {
        if ($cityId) {
            $faos->where('city_id', $cityId);
        }

        if ($name) {
            $faos->where('name', 'like', '%' . $name . '%');
        }

        return response()->json($faos->with('city')->get());
    }
    return response()->json([
        'message' => 'No filters provided.',
        'data' => []
    ], 400);
    }
    public function destroy($id)
    {
        $Crop = FAO::findOrFail($id);
        $Crop->delete();

        return redirect()->route('admin.fao.index')->with('success', 'FAO deleted successfully');
    }
    
}
