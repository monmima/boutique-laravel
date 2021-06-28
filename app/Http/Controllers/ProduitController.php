<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\ProduitCategorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // getting data from the pivot table is done from the Produit.php model
        return view("index", [
            "produits" => Produit::all(),
            "categories" => ProduitCategorie::all()
        ]);

    }

    // show the edit form
    public function edit(Produit $produit)
    {
        return view("/edit", [
            "produit" => $produit,
            "categories" => ProduitCategorie::all()
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

        $validated = $request->validate(Produit::getValidationRules());

        $produit = Produit::create($validated);
        $produit->categories()->sync($validated['categories']);
        return redirect("/")->with("msg", "Produit ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $id)
    {
        $id = Produit::find(1);

        // JSON
        return [
            "produit" => $id
        ];
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
        $validated = $request->validate(Produit::getValidationRules($produit->id));
        $produit->update($validated);
        $produit->categories()->sync($validated['categories']);
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->categories()->detach();
        $produit->delete();

        return redirect("/");
    }


}
