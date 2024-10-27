<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\Association;

use Illuminate\Http\Request;

class BeneficiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $beneficiaires = Beneficiaire::all();
            $associations = Association::all();

            return view('beneficiares.index', compact('beneficiaires', 'associations'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $associations = Association::all(); // Récupère toutes les associations

        return view('beneficiares.create', compact('associations')); // Passe les associations à la vue

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'nom' => 'required',
            'besoins' => 'required|string|min:6',
            'associationId' => 'required',

        ],[
            'nom.required' => 'Le nom du bénéficiaire est requis.',
            'besoins.required' => 'Les besoins sont requis.',
            'associationId.required' => 'Veuillez sélectionner une association valide.',
        ]);

        
        
        
        Beneficiaire::create([
            'nom' => $request->nom, // Le champ 'nom' dans la base de données
            'besoins' => $request->besoins,
            'associationId' => $request->associationId,

        ]);
    
        return redirect()->route('beneficiares.index')->with('success', 'beneficiares added successfully.');;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beneficiaires = Beneficiaire::findOrFail($id);
        return view('beneficiaire.show', compact('beneficiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function edit($id)
     {
         $beneficiaire = Beneficiaire::findOrFail($id); // Récupère le bénéficiaire
         $associations = Association::all(); // Récupérer toutes les associations
         return view('beneficiares.edit', compact('beneficiaire', 'associations'));// Passe le bénéficiaire et les associations à la vue
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
            $beneficiaire = Beneficiaire::findOrFail($id); // Trouver le bénéficiaire par son ID
        
            $request->validate([
                'nom' => 'required',
                'besoins' => 'required',
                'associationId' => 'required',
            ]);
        
            $beneficiaire->update([
                'nom' => $request->input('nom'),
                'besoins' => $request->input('besoins'),
                'associationId' => $request->input('associationId'),
            ]);
        
            return redirect()->route('beneficiares.index')->with('success', 'Bénéficiaire mis à jour avec succès.');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beneficiaire = Beneficiaire::findOrFail($id);
        $beneficiaire->delete();
    
        return redirect()->route('beneficiares.index')->with('success', 'beneficiaire deleted successfully.');
    }
}
