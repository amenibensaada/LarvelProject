<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{

    use HasFactory;

    protected $fillable = [
        'date_livraison',
        'status',
        'quantite_livree',
        'association_id',
        'produit_alimentaire_id',
        'transporteur_id',
        'user_id', // Foreign key for the user relationship

    ];

    public function transporteur()
    {
        return $this->belongsTo(Transporteur::class);
    }
    public function reclamations()
    {
        return $this->hasMany(Reclamation::class);
    }

}
