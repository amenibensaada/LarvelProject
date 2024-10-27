<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Association; // Make sure this is imported


class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('search'); // Récupère la requête de recherche
        $associations = Association::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('nom', 'like', "%{$query}%")
                                 ->orWhere('email', 'like', "%{$query}%");
        })->get();
    
        return view('associations.index', compact('associations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('associations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:6',
            'email' => 'required|email|unique:associations,email',
            'telephone' => 'required|numeric|digits:8',  // Changed 'number' to 'numeric'
            'addresse' => 'required|string|max:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'nom.required' => 'Le nom de l\'association est requis.',
            'email.required' => 'L\'adresse e-mail est requise.',
            'email.email' => 'Veuillez entrer une adresse e-mail valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'telephone.required' => 'Le numéro de téléphone est requis.',
            'telephone.numeric' => 'Le numéro de téléphone doit être un nombre.',  // Optional: Add a custom message for numeric
            'addresse.required' => 'L\'adresse est requise.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Les formats d\'image acceptés sont jpeg, png, jpg, et gif.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.'
        ]);
    

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('association_images', 'public');
    
            // Vérification du téléchargement de l'image
            if (!$imagePath) {
                return back()->withErrors(['image' => 'Image upload failed.']);
            }
        }
        
    
        // Crée l'association avec les noms de champs corrects
        Association::create([
            'nom' => $request->nom, // Le champ 'nom' dans la base de données
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->addresse,
            'image' => $imagePath, // Save image path to the database

        ]);
    
        return redirect()->route('associations.index')->with('success', 'Association added successfully.');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $association = Association::findOrFail($id);
    return view('associations.show', compact('association'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $association = Association::findOrFail($id);
        return view('associations.edit', compact('association'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $association = Association::findOrFail($id);
    
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:associations,email,' . $association->id,
            'telephone' => 'required',
            'adresse' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image file

            
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($association->image) {
                // Only attempt to delete if the path is valid
                if (Storage::disk('public')->exists($association->image)) {
                    Storage::disk('public')->delete($association->image);
                }
            }

            // Store the new image
            $imagePath = $request->file('image')->store('association_images', 'public');
        } else {
            // Keep the old image if no new one is uploaded
            $imagePath = $association->image;
        }
    
        // Update restaurant
        $association->update([
            'nom' => $request->input('nom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'image' => $imagePath, // Save image path to the database
        ]);
    
        return redirect()->route('associations.index')->with('success', 'association updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $association = Association::findOrFail($id);
        $association->delete();
    
        return redirect()->route('associations.index')->with('success', 'Association deleted successfully.');
    }
}
