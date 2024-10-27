<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livraison;
use App\Models\Transporteur;


class LivraisonController extends Controller
{

    // Afficher la liste des livraisons de l'utilisateur authentifié
  /*  public function index()
    {
        $livraisons = Livraison::all();
        return view('livraisons.index', compact('livraisons'));
    }*/
    public function index()
    {

        $livraisons = Livraison::where('user_id', auth()->id())->get();

        return view('livraisons.index', compact('livraisons'));
    }

    public function allLivraisons(Request $request)
    {
        $query = Livraison::with('transporteur');
        if ($request->has('sort')) {
            $order = $request->get('sort') === 'desc' ? 'desc' : 'asc';
            $query->orderBy('date_livraison', $order);
        }

         $livraisons = $query->get(); // Execute the query here


        return view('livraisons.livraison', compact('livraisons'));    }

    // Afficher le formulaire de création d'une nouvelle livraison
    public function create()
    {
 $transporteurs = Transporteur::all();

    return view('livraisons.create', compact('transporteurs'));    }

    // Enregistrer une nouvelle livraison
    public function store(Request $request)
    {

        $request->validate([
            'date_livraison' => 'required|date',
            'status' => 'required|string',
            'quantite_livree' => 'required|integer',
            'transporteur_id' => 'required|exists:transporteurs,id',


        ]);

        Livraison::create([
            'date_livraison' => $request->input('date_livraison'),
            'status' => $request->input('status'),
            'quantite_livree' => $request->input('quantite_livree'),
            'association_id' =>5,
            'produit_alimentaire_id' =>5,
            'transporteur_id' => $request->input('transporteur_id'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('livraisons.index')->with('success', 'Livraison ajoutée avec succès.');
    }

    // Afficher le formulaire de modification d'une livraison
    public function edit($id)
    { $transporteurs = Transporteur::all();

        $livraison = Livraison::findOrFail($id);
        return view('livraisons.edit', compact('livraison','transporteurs'));
    }

    // Mettre à jour une livraison
    public function update(Request $request, $id)
    {
        $livraison = Livraison::findOrFail($id);

        $request->validate([
            'date_livraison' => 'required|date',
            'status' => 'required|string',
            'quantite_livree' => 'required|integer',
            'association_id' => 'exists:associations,id',
            'produit_alimentaire_id' => 'exists:produit_alimentaires,id',
            'transporteur_id' => 'exists:transporteurs,id',
        ]);

        $livraison->update([
            'date_livraison' => $request->input('date_livraison'),
            'status' => $request->input('status'),
            'quantite_livree' => $request->input('quantite_livree'),
            'association_id' =>5 ,
            'produit_alimentaire_id' => 55,
            'transporteur_id' => $request->input('transporteur_id'),
            'user_id' => auth()->user()->id,

        ]);

        return redirect()->route('livraisons.index')->with('success', 'Livraison mise à jour avec succès.');
    }

    // Supprimer une livraison
    public function destroy($id)
    {
        $livraison = Livraison::findOrFail($id);
        $livraison->delete();

        return redirect()->route('livraisons.index')->with('success', 'Livraison supprimée avec succès.');
    }
}
