<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $produit = Produit::all();

        return view("index"), [
            "produits" => $produits,
        ]);
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

        $produit = new Produit();

        $produit->name = request("name");
        $produit->prix = request("prix");
        $produit->quantiteDisponible = request("quantite_disponible");
        $produit->quantiteRestockage = request("quantite_restockage");
        $produit->categorie = request("categorie");

        $pizza->save();

        return redirect("/")->with("msg", "Produit ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //

        $produit = Produit::findOrFail($id);

        $produit->name = request("name");
        $produit->prix = request("prix");
        $produit->quantiteDisponible = request("quantite_disponible");
        $produit->quantiteRestockage = request("quantite_restockage");
        $produit->categorie = request("categorie");

        return redirect("/")->with("msg", "Mise à jour effectuée");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect("/");
    }
}
