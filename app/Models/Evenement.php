<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'image',
        'user_id',
        'evenement_category_id'
    ];

    protected $casts = ['start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function evenementCategory()
    {
        return $this->belongsTo(EvenementCategory::class);
    }

}
