<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('city')->paginate(10);
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.company.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'location' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'services' => 'required|string',
            'description' => 'nullable|string',
            'website_link' => 'nullable|url',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $picturePath = $request->file('picture') ? $request->file('picture')->store('companies', 'public') : null;

        Company::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'location' => $request->location,
            'city_id' => $request->city_id,
            'services' => $request->services,
            'description' => $request->description,
            'website_link' => $request->website_link,
            'picture' => $picturePath,
        ]);

        return redirect()->route('admin.company.index')->with('success', 'Company added successfully.');
    }
}
