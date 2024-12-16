<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyApiController extends Controller
{
    public function index()
    {
        return response()->json(Company::with('city')->get());
    }

    public function filter(Request $request)
    {
       $query = Company::query();

$cityId = $request->city_id;
$name = $request->name;

if ($cityId || $name) {
    if ($cityId) {
        $query->where('city_id', $cityId);
    }

    if ($name) {
        $query->where('name', 'like', '%' . $name . '%');
    }

    return response()->json($query->with('city')->get());
}

// If both are null, return an appropriate response
return response()->json([
    'message' => 'No filters provided.',
    'data' => []
], 400);
    }
}

