<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantItem;
use App\Models\Restaurant;

class RestaurantItemController extends Controller
{
    // Show form for adding an item to a restaurant
    public function create($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        return view('restaurant_items.create', compact('restaurant'));
    }

    // Store a new item
    public function store(Request $request, $restaurantId)
{
    $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'quantity' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
    ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('item_images', 'public'); // Store in 'public/item_images'
    }

    // Create the item
    RestaurantItem::create([
        'restaurant_id' => $restaurantId,
        'name' => $request->name,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'image' => $imagePath,
    ]);

    return redirect()->route('restaurants.index')->with('success', 'Item added successfully');
}


    // Show form for editing an item
    public function edit($id)
    {
        $item = RestaurantItem::findOrFail($id);
        return view('restaurant_items.edit', compact('item'));
    }

    // Update the item
    public function update(Request $request, $id)
    {
        $item = RestaurantItem::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer|min:1',
        ]);

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('restaurants.index')->with('success', 'Item updated successfully');
    }

    // Delete the item
    public function destroy($id)
    {
        $item = RestaurantItem::findOrFail($id);
        $item->delete();

        return redirect()->route('restaurants.index')->with('success', 'Item deleted successfully');
    }
}

