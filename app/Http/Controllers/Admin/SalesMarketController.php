<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\SalesMarket;
use App\Models\City;
use Illuminate\Http\Request;

class SalesMarketController extends Controller
{
    // Admin: Show all sales market entries
    public function index()
    {
        $salesMarkets = SalesMarket::with('city')->paginate(10);
        return view('admin.sales_market.index', compact('salesMarkets'));
    }

    // Admin: Show form to create a new entry
    public function create()
    {
        $cities = City::all();
        return view('admin.sales_market.create', compact('cities'));
    }

    // Admin: Store new entry
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'location' => 'nullable|string',
            'city_id' => 'required|exists:cities,id',
            'services' => 'nullable|string',
            'description' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        $picturePath = $request->file('picture') ? $request->file('picture')->store('sales_market', 'public') : null;

        SalesMarket::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'city_id' => $request->city_id,
            'services' => $request->services,
            'description' => $request->description,
            'picture' => $picturePath,
        ]);

        return redirect()->route('admin.sales_market.index')->with('success', 'Sales market entry added successfully.');
    }

    // API: Fetch all entries
    public function apiIndex(Request $request)
    {
        $query = SalesMarket::with('city');

        if ($request->has('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        return response()->json($query->get());
    }
    public function destroy($id)
    {
        $Crop = SalesMarket::findOrFail($id);
        $Crop->delete();

        return redirect()->route('admin.sales_market.index')->with('success', 'sales market deleted successfully');
    }
}
