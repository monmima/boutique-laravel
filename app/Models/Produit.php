<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    // icigo
    // I cannot use this and the protected value below as well; I don't know why
    // protected $fillable = ["nom", "prix", "quantite_disponible", "quantite_restockage"];
    // protected $guarded = [];

    // to associate pivot table to the the results
    protected $with = ['categories'];

    public function categories()
    {
        return $this->belongsToMany(ProduitCategorie::class);
    }
}
