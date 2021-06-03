<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    // to associate pivot table to the the results
    protected $with = ['categories'];

    public function categories()
    {
        return $this->belongsToMany(ProduitCategorie::class);
    }
}
