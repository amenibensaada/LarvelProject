<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'restaurant_id',
        'donation_id',
        'name',
        'description',
        'quantity',
        'image',
    ];

    // Relationship to the Restaurant model
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }


    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
