<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Livraison;


class ReclamationController extends Controller
{
     // Afficher la liste des réclamations pour une livraison donnée
     public function index($livraisonId)
     {
         $livraison = Livraison::findOrFail($livraisonId);
         $reclamations = $livraison->reclamations;
         return view('reclamations.index', compact('livraison', 'reclamations'));
     }

     // Afficher le formulaire pour une nouvelle réclamation
     public function create($livraisonId)
     {
         $livraison = Livraison::findOrFail($livraisonId);
         return view('reclamations.create', compact('livraison'));
     }

     // Enregistrer une réclamation
     public function store(Request $request, $livraisonId)
     {
         $request->validate([
             'description' => 'required|string',
         ]);

         Reclamation::create([
             'description' => $request->input('description'),
             'livraison_id' => $livraisonId,
         ]);

         return redirect()->route('reclamations.index', $livraisonId)->with('success', 'Réclamation ajoutée avec succès.');
     }
public function edit($id){
    $livraison = Livraison::findOrFail($id);

    $reclamation = Reclamation::findOrFail($id);
    return view('reclamations.edit', compact('reclamation','livraison'));


}
     // Mettre à jour une réclamation
     public function update(Request $request, $id)
     {

         $reclamation = Reclamation::findOrFail($id);


         $request->validate([
             'description' => 'required|string',
             'status' => 'required|string',
         ]);

         $reclamation->update([
             'description' => $request->input('description'),
             'status' => $request->input('status'),
         ]);

         return redirect()->route('reclamations.index', $reclamation->livraison_id)->with('success', 'Réclamation mise à jour avec succès.');
     }



     // Supprimer une réclamation
     public function destroy($id)
     {
         $reclamation = Reclamation::findOrFail($id);
         $reclamation->delete();

         return redirect()->route('reclamations.index', $reclamation->livraison_id)->with('success', 'Réclamation supprimée avec succès.');
     }
}
