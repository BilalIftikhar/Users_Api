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
            'services' => 'required|string',
            'description' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $picturePath = $request->file('picture') ? $request->file('picture')->store('rental_machinery', 'public') : null;

        RentalMachinery::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'city_id' => $request->city_id,
            'services' => $request->services,
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
