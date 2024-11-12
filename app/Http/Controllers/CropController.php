<?php


namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    /**
     * Display a listing of crops.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crops = Crop::all();
        return response()->json(['success' => true, 'data' => $crops]);
    }
    public function create()
    {
        return view('admin.crop.create');
    }

    /**
     * Store a new crop.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:crops,name|max:255',
        ]);

        $crop = Crop::create(['name' => $request->name]);
        return redirect()->route('admin.crop.create')->with('success', 'Crop added successfully!');
    }
}
