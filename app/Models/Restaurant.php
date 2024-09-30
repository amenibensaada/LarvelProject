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
        'status',  // New field
        'user_id', // Foreign key for the user relationship
        'image',

    ];
     /**
     * Get the items for the restaurant.
     */
    public function items()
    {
        return $this->hasMany(RestaurantItem::class); // Restaurant has many items
    }
}
