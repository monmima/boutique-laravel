<?php

namespace App\Http\Controllers;

use App\Models\ProduitCategorie;
use Illuminate\Http\Request;

class ProduitCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // getting data from the pivot table is done from the Produit.php model

        $categories = ProduitCategorie::all();

        return [
            "ProduitCategorie" => $categories,
        ];

        // // JSON
        // return [
        //     "foo" => "bar",
        //     "laravel" => "automatically turns arrays into JSON",
        //     "Firefox" => "gives a nice layout to arrays, but not Brave"
        // ];
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProduitCategorie  $produitCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(ProduitCategorie $produitCategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProduitCategorie  $produitCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProduitCategorie $produitCategorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProduitCategorie  $produitCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProduitCategorie $produitCategorie)
    {
        //
    }
}
