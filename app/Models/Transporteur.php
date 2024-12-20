<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporteur extends Model
{

    use HasFactory;

    protected $fillable = ['nom', 'telephone', 'email'];

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }
}
