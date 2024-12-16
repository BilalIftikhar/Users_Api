<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\RentalMachinery;
use Illuminate\Http\Request;

class RentalMachineryController extends Controller
{
    // Show all machinery listings
    public function index()
    {
        $machineries = RentalMachinery::with('city')->paginate(10);
        return view('admin.rental_machinery.index', compact('machineries'));
    }

    // Show the create form
    public function create()
    {
        $cities = City::all(); // Fetch cities for the dropdown
        return view('admin.rental_machinery.create', compact('cities'));
    }

    // Store a new machinery listing
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'location' => 'required|string|max:255',
        'city_id' => 'required|exists:cities,id',
        'services' => 'nullable|string', // Validate as a string (it will be a comma-separated string from the form)
        'description' => 'nullable|string',
        'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);

    // Convert services to an array
    $servicesRaw = json_decode($request->services, true); // Decode the JSON string
    $servicesArray = array_map(function ($item) {
        return $item['value'] ?? null; // Extract 'value' from each item
    }, $servicesRaw);

    // Remove any null values
    $servicesArray = array_filter($servicesArray);

    // Handle the picture upload
    $picturePath = $request->file('picture') 
        ? $request->file('picture')->store('rental_machinery', 'public') 
        : null;

    // Save the data
    RentalMachinery::create([
        'name' => $request->name,
        'phone_number' => $request->phone_number,
        'location' => $request->location,
        'city_id' => $request->city_id,
        'services' => json_encode($servicesArray), // Save services as a JSON array
        'description' => $request->description,
        'picture' => $picturePath,
    ]);

    return redirect()->route('admin.rental_machinery.index')->with('success', 'Machinery added successfully.');
}


    // Fetch all machinery via API
    public function fetchAll(Request $request)
    {
        $query = RentalMachinery::query();

        // Filter by city if specified
        if ($request->has('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        return response()->json($query->with('city')->get(), 200);
    }
    public function destroy($id)
    {
        $Crop = RentalMachinery::findOrFail($id);
        $Crop->delete();

        return redirect()->route('admin.rental_machinery.index')->with('success', 'Rental machinery deleted successfully');
    }
}
