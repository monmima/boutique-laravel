<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\ProduitCategorie;
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
        // getting data from the pivot table is done from the Produit.php model

        $produits = Produit::all();
        $categories = ProduitCategorie::all();

        return view("index", [
            "produits" => $produits,
            "categories" => $categories
        ]);
        
    }

    // show the edit form
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = ProduitCategorie::all();

        // icigo

        return view("/edit", [
            "produit" => $produit,
            "categories" => $categories
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
        
        $validated = $request->validate([
            "nom" => "required|unique:produits|min:5|max:255",
            "prix" => "required",
            "quantite_disponible" => "required",
            "quantite_restockage" => "required",
            // "categorie" => "required"
        ]);

        //

        $produit = new Produit();

        $produit->nom = request("nom");
        $produit->prix = request("prix");
        $produit->quantite_disponible = request("quantite_disponible");
        $produit->quantite_restockage = request("quantite_restockage");
        // $produit->categorie = request("categorie");

        $produit->save();

        // icigo
        // https://github.com/LaravelDaily/Laravel-many-to-many-demo/blob/master/app/Http/Controllers/ArticlesController.php

        // $article = Article::create($request->only(['title']));
        // $tags = explode(",", $request->get('tags'));
        // $tag_ids = [];
        // foreach ($tags as $tag) {
        //     $tag_db = Tag::where('name', trim($tag))->firstOrCreate(['name' => trim($tag)]);
        //     $tag_ids[] = $tag_db->id;
        // }
        // $article->tags()->attach($tag_ids);
        // return redirect()->route('articles.index');

        /////////////////

        // $article = Article::create($request->only(['title']));
        // $categories = explode(",", $request->get("1"));
        // $tag_ids = [];
        // foreach ($tags as $tag) {
        //     $tag_db = Tag::where('name', trim($tag))->firstOrCreate(['name' => trim($tag)]);
        //     $tag_ids[] = $tag_db->id;
        // }
        // $article->tags()->attach($tag_ids);
        // return redirect()->route('articles.index');



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
    public function update(Request $request, $id)
    {
        //

        $validated = $request->validate([
            "nom" => "required|unique:produits|min:5|max:255",
            "prix" => "required",
            "quantite_disponible" => "required",
            "quantite_restockage" => "required",
            // "categorie" => "required"
        ]);

        $produit = Produit::findOrFail($id);
        $categories = ProduitCategorie::all();

        // updating produit table
        $produit->nom = request("nom");
        $produit->prix = request("prix");
        $produit->quantite_disponible = request("quantite_disponible");
        $produit->quantite_restockage = request("quantite_restockage");
        // $produit->categorie = request("categorie");
        $produit->save();

        // icigo
        // --processing categories-- //

            // 1. creating an array of ticked boxes
            $input = $request->all();

            // 2. removing useless stuff from the array before working with it any further
            unset($input["_token"]);
            unset($input["_method"]);
            unset($input["nom"]);
            unset($input["prix"]);
            unset($input["quantite_disponible"]);
            unset($input["quantite_restockage"]);

            // 3. wiping the slate clean for the categories
            $produit->categories()->detach($categories);

            // 4. attaching new categories that are ticked
            // the purpose of array_keys is to return the names of the keys, not their values
            $produit->categories()->attach(array_keys($input));

            // 5. returning the keys and their values to the console
            error_log(print_r(array_keys($input), true));
            error_log(print_r($input, true));

        // --end processing categories-- //

        // back to the main page
        $produits = Produit::all();

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect("/");
    }


}
