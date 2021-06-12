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

        // // JSON
        // return [
        //     "foo" => "bar",
        //     "laravel" => "automatically turns arrays into JSON",
        //     "Firefox" => "gives a nice layout to arrays, but not Brave"
        // ];

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
