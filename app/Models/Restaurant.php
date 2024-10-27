<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'image',
        'user_id',
        'status'
    ];
     /**
     * Get the items for the restaurant.
     */
    public function items()
    {
        return $this->hasMany(RestaurantItem::class); // Restaurant has many items
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Additional relationships and logic can be added here
}
