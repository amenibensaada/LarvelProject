<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Association; // Make sure this is imported
use App\Models\Beneficiaire; // Make sure this is imported

class BeneficiaireBackController extends Controller
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

            return view('back.beneficiareBack.index', compact('beneficiaires', 'associations'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    
        return redirect()->route('beneficiairesBack.index')->with('success', 'beneficiaire deleted successfully.');
    }
}
