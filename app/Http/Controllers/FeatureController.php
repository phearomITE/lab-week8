<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{

    public function index()
    {
        $features = Feature::all();
        return view('layouts.services', compact('features')); // Just display
    }
    
    public function manage()
    {
        $features = Feature::all();
        return view('features.manage', compact('features')); // Full CRUD
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
    
        Feature::create($request->only('icon', 'name'));
    
        return redirect()->route('features.manage')->with('success', 'Feature added.');
    }
    
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);
    
        $feature->update($request->only('icon', 'name'));
    
        return redirect()->route('features.manage')->with('success', 'Feature updated.');
    }
    
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('features.manage')->with('success', 'Feature deleted.');
    }
}