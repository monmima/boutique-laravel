<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ["nom", "prix", "quantite_disponible", "quantite_restockage"];

    // to always eager load the categories relationship
    protected $with = ['categories'];

    public function categories()
    {
        return $this->belongsToMany(ProduitCategorie::class);
    }

    public static function getValidationRules($produitId = null) {
        $rules = [
            "nom" => ["required", "min:5", "max:255"],
            "prix" => "required",
            "quantite_disponible" => "required",
            "quantite_restockage" => "required",
            "categories" => ['required', 'array']
        ];
        if($produitId)
            $rules['nom'][] = Rule::unique("produits")->ignore($produitId);
        return $rules;
    }
}
