<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\EvenementCategory;
use Illuminate\Http\Request;

class EvenementCategoryController extends Controller
{
    public function index()
    {
        $categories = EvenementCategory::all();
        return view('evenement_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('evenement_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        EvenementCategory::create($request->all());
        return redirect()->route('evenement-categories.index')->with('success', 'Category created successfully.');
    }

    public function show(EvenementCategory $evenementCategory)
    {
        return view('evenement_categories.show', compact('evenementCategory'));
    }

    public function edit(EvenementCategory $evenementCategory)
    {
        return view('evenement_categories.edit', compact('evenementCategory'));
    }

    public function update(Request $request, EvenementCategory $evenementCategory)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $evenementCategory->update($request->all());
        return redirect()->route('evenement-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(EvenementCategory $evenementCategory)
    {
        $evenementCategory->delete();
        return redirect()->route('evenement-categories.index')->with('success', 'Category deleted successfully.');
    }
}
