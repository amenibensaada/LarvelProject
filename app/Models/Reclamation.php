<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'status',
        'livraison_id',
    ];

    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }
}