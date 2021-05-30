<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitCategorie extends Model
{
    use HasFactory;

    public function produitCategories()
    {
        return $this->belongsToMany(ProduitCategorie::class);
    }
}
