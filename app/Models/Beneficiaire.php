<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model
{
    use HasFactory;
    protected $table = 'benef'; // Spécifiez le nom de la table

    protected $fillable = [
        'nom',
        'associationId',
        'besoins',
       

    ];
}
