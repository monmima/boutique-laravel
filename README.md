# boutique-laravel

Boutique en Laravel

This app was deployed on [Heroku](https://boutique-laravel.herokuapp.com/). For now, the deployed version has a bug.

# Creating A Many-To-Many Relationship (Pivot Table)

Thanks to [Code with Daryl](https://www.youtube.com/watch?v=2oFNu_RhTt4) for providing his tutorial on YouTube. Also, thanks to [Qirolab](https://www.youtube.com/watch?v=JQ01o10Mva4).

____

- https://appdividend.com/2018/05/17/laravel-many-to-many-relationship-example/
- https://www.larashout.com/laravel-eloquent-many-to-many-relationship

___

The categories won't display correctly at the moment. Currently working on this. See http://127.0.0.1:8000/1 to see what happens.

___

If you're product and categories won't work together, please think about doing the following:

1. Your ProduitController.php file should look like this:

        "categories" => $produit->categories

2. Your Produit.php model should look like this:

        class Produit extends Model
        {
            use HasFactory;

            public function categories()
            {
                return $this->belongsToMany(ProduitCategorie::class);
            }
        }

3. Your ProduitController.php model should look like this:

        class ProduitCategorie extends Model
        {
            use HasFactory;

            public function produits()
            {
                return $this->belongsToMany(Produit::class);
            }
        }

4. Your category table could be name "produit_categories" and things should work just fine.
    
