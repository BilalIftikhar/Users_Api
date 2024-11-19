<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    //
    public function index()
{
    $news = News::all();  // Fetch all news
    return view('admin.news.index', compact('news'));
}
public function create()
{
    return view('admin.news.create');
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'detail' => 'required|string',
        'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Handle picture upload
    $picturePath = $request->file('picture') ? $request->file('picture')->store('news', 'public') : null;

    // Create the news entry
    News::create([
        'title' => $request->title,
        'date' => $request->date,
        'detail' => $request->detail,
        'picture' => $picturePath,
    ]);

    return redirect()->route('admin.news.index')->with('success', 'News added successfully.');
}

}
