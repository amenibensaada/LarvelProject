<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\EvenementCategory;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index(Request $request)
    {
        $categories = EvenementCategory::all();
        $query = Evenement::with('evenementCategory');

        if ($request->has('evenement_category')) {
            $query->where('evenement_category_id', $request->evenement_category);
        }

        $events = $query->get();

        return view('events.index', compact('events', 'categories'));
    }

    public function adminindex(Request $request)
    {
        $categories = EvenementCategory::all();
        $query = Evenement::with('evenementCategory');

        if ($request->has('evenement_category')) {
            $query->where('evenement_category_id', $request->evenement_category);
        }

        $events = $query->get();

        return view('events.indexadmin', compact('events', 'categories'));
    }

    public function create()
    {
        $categories = EvenementCategory::all();
        return view('events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255', 
            'description' => 'nullable|string',
            'location' => 'required|string|max:255', 
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'evenement_category_id' => 'required|exists:evenement_categories,id', 
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('evenement_images', 'public');
        }
        
        Evenement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'image' => $imagePath,
            'user_id' => auth()->id(), 
            'evenement_category_id' => $request->input('evenement_category_id'),
        ]);
        
        return redirect()->route('events.index')->with('success', 'Event added successfully.');
    }

    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);

        $categories = EvenementCategory::all();

        return view('events.edit', compact('evenement', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $event = Evenement::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'evenement_category_id' => 'required|exists:evenement_categories,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('evenement_images', 'public');
        } else {
            $imagePath = $event->image; 
        }

        $event->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'image' => $imagePath,
            'evenement_category_id' => $request->input('evenement_category_id'),
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Evenement::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
    
}
