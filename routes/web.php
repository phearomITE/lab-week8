<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;

// Public landing page - display only
Route::get('/', function () {
    $features = \App\Models\Feature::all(); 
    return view('layouts.services', compact('features')); 
})->name('home');

Route::get('/features/manage', [FeatureController::class, 'manage'])->name('features.manage');
Route::resource('features', FeatureController::class)->except(['index']);
