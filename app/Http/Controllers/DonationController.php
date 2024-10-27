<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Restaurant;
use App\Models\Association;
use App\Models\RestaurantItem;

class DonationController extends Controller
{
    /**
     * Display a listing of donations.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Filter donations based on the search query
        $donations = Donation::with('restaurant', 'user', 'association', 'restaurantItems')
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('restaurant', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%'); // Search by restaurant name
                })->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%'); // Search by user name
                });
            })
            ->get();


        $restaurants = Restaurant::all();

        return view('donations.index', ["donations" => $donations, "restaurants" => $restaurants]);
    }

    /**
     * Show the form for creating a new donation.
     */
    public function create()
    {
        $restaurants = Restaurant::where('user_id', auth()->id())->get();
        $associations = Association::all();

        return view('donations.create', ["restaurants" => $restaurants, "associations" => $associations]);
    }

    /**
     * Store a newly created donation in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'association_id' => 'required|exists:associations,id',
        ]);

        Donation::create([
            'restaurant_id' => $request->input('restaurant_id'),
            'association_id' => $request->input('association_id'),
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);


        return redirect()->route('donations.index')->with('success', 'Donation created successfully.');
    }

    /**
     * Display the specified donation.
     */
    public function show(Donation $donation)
    {
        return view('donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified donation.
     */
    public function edit($id)
    {
        $donation = Donation::findOrFail($id);
        $restaurants = Restaurant::all();
        return view('donations.edit', ["donation" => $donation, "restaurants" => $restaurants]);
    }

    /**
     * Update the specified donation in storage.
     */
    public function update(Request $request, $id)
    {
        $donation = Donation::findOrFail($id);

        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
        ]);

        $donation->update([
            'restaurant_id' => $request->input('restaurant_id'),
        ]);

        return redirect()->route('donations.index')->with('success', 'Donation updated successfully.');
    }

    public function add_to_donation(Request $request, $itemId, $donationId)
    {
        // Find the specific restaurant item by its ID
        $resItem = RestaurantItem::findOrFail($itemId);
    
        $resItem->donation_id = $donationId;
        $resItem->save();
    
        return redirect()->route('donations.index')->with('success', 'Item added to donation successfully.');
    }
    
    
    public function remove_from_donation(Request $request, $itemId)
    {
        $resItem = RestaurantItem::findOrFail($itemId);
    
        $resItem->donation_id = null;
        $resItem->save();
    ;

        return redirect()->route('donations.index')->with('success', 'Donation Removed successfully.');
    }


    /**
     * Remove the specified donation from storage.
     */
    public function destroy($id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully.');
    }

    public function adminIndex()
    {
        $donations = Donation::all(); // Fetch all donations
        return view('admin.donations.index', compact('donations'));
    }

    public function adminEdit($id)
    {
        $donation = Donation::findOrFail($id); // Fetch specific donation by ID
        return view('admin.donations.update', compact('donation'));
    }

    public function adminUpdate(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:pending,valid', // Ensure the status is either pending or valid
        ]);

        // Fetch the specific donation by ID
        $donation = Donation::findOrFail($id);

        // Update the donation status
        $donation->status = $request->status;
        $donation->save(); // Save changes to the database

        // Redirect back to the donations index or another route with a success message
        return redirect()->route('admin.donations.index')->with('success', 'Donation updated successfully.');
    }
}
