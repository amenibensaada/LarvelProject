<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporteur;


class TransporteurController extends Controller
{
    // Afficher la liste des transporteurs de l'utilisateur authentifié
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filtrer les transporteurs par nom s'il y a un critère de recherche
        $transporteurs = Transporteur::when($search, function ($query, $search) {
            return $query->where('nom', 'like', '%' . $search . '%');
        })->get();

        return view('transporteurs.index', compact('transporteurs'));

    }
  

    // Afficher tous les transporteurs
    public function allTransporteurs()
    {
        $transporteurs = Transporteur::all();
        return view('transporteurs.index', compact('transporteurs'));
        var_dump($transporteurs);
    }

    // Afficher le formulaire de création d'un nouveau transporteur
    public function create()
    {
        return view('transporteurs.create');
    }

    // Enregistrer un nouveau transporteur
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:transporteurs',
        ]);

        Transporteur::create([
            'nom' => $request->input('nom'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            
        ]);

        return redirect()->route('transporteurs.index')->with('success', 'Transporteur ajouté avec succès.');
    }

    // Afficher le formulaire de modification d'un transporteur
    public function edit($id)
    {
        $transporteur = Transporteur::findOrFail($id);
        return view('transporteurs.edit', compact('transporteur'));
    }

    // Mettre à jour un transporteur
    public function update(Request $request, $id)
    {
        $transporteur = Transporteur::findOrFail($id);

        $request->validate([
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:transporteurs,email,' . $transporteur->id,
        ]);

        $transporteur->update([
            'nom' => $request->input('nom'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('transporteurs.index')->with('success', 'Transporteur mis à jour avec succès.');
    }

    // Supprimer un transporteur
    public function destroy($id)
    {
        $transporteur = Transporteur::findOrFail($id);
        $transporteur->delete();

        return redirect()->route('transporteurs.index')->with('success', 'Transporteur supprimé avec succès.');
    }
}
