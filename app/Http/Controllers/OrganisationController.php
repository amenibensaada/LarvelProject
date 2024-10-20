<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use Illuminate\Support\Facades\Storage;


class OrganisationController extends Controller
{
        // Display a list of organisations
        public function index()
        {            
            return view('organisations.index', ["organisations" =>  Organisation::all()]);
        }

        // Show form for creating a new restaurant
        public function create()
        {
            return view('organisations.create');
        }





    // Store a new organisation
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:organisations',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
    
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('organisation_images', 'public'); // Store image in 'public/organisation_images'
        }
    
        // Create organisation
        Organisation::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'image' => $imagePath, // Save image path to the database
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);
    
        return redirect()->route('organisations.index')->with('success', 'Organisation added successfully.');
    }


    
        public function edit($id)
        {
            return view('organisations.edit', ["organisation" => Organisation::findOrFail($id)]);
        }
    
        // Update organisation
        public function update(Request $request, $id)
        {
            $organisation = Organisation::findOrFail($id);
        
            $request->validate([
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:organisations,email,' . $organisation->id,
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image file
            ]);
        
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete the old image if exists
                if ($organisation->image) {
                    Storage::disk('public')->delete($organisation->image);
                }
        
                // Store the new image
                $imagePath = $request->file('image')->store('organisation_images', 'public');
            } else {
                $imagePath = $organisation->image; // Keep the old image if no new one is uploaded
            }
        
            // Update organisation
            $organisation->update([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'image' => $imagePath, // Save image path to the database
                'status' => $request->input('status', $organisation->status)
            ]);
        
            return redirect()->route('organisations.index')->with('success', 'organisation updated successfully.');
        }
        
    
        // Delete a organisation
        public function destroy($id)
        {
            $restaurant = Organisation::findOrFail($id);
            $restaurant->delete();
    
            return redirect()->route('organisations.index')->with('success', 'Organisation deleted successfully.');
        }
    
}
