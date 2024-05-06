<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
       $features = Feature::all();
        
        return view('features.index', compact('features'));
        
    }

    public function create()
    {
        // Logic to display the create feature form

        return view('features.create');
    }

    public function store(Request $request)
    {
        // Logic to store a new feature in the database

        return redirect()->route('features.index');
    }

    public function show($id)
    {
        // Logic to display a specific feature

        $feature = Feature::findOrFail($id);
        
        return view('features.show', compact('feature'));
    }

    public function edit($id)
    {
        // Logic to display the edit feature form
        
    }

    public function update(Request $request, $id)
    {
        // Logic to update a feature in the database
    }

    public function destroy($id)
    {
        // Logic to delete a feature from the database
    }
}
