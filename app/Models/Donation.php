<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'association_id',
        'user_id',
        'status'
    ];

    // Define the relationship with the User model
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function association()
    {
        return $this->belongsTo(Association::class);
    }


    public function restaurantItems()
    {
        return $this->hasMany(RestaurantItem::class);
    }


}
