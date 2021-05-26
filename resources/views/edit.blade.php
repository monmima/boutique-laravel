<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="/{{ $produit->id }}" name="edit" id="edit">
        <!-- cross-site request forgery -->
        @csrf 
        <!-- because modern browsers/forms can only take two different methods -->
        @method('PUT')

        <p><input type="text" name="nom" id="nom" placeholder="{{ $produit->nom }}" minlength="5" maxlength="255" required></p>
        <p><input type="number" name="prix" id="prix" placeholder="{{ $produit->prix }}" required></p>
        <p><input type="number" name="quantite_disponible" id="quantite_disponible" placeholder="{{ $produit->quantite_disponible }}" required></p>
        <p><input type="number" name="quantite_restockage" id="quantite_restockage" placeholder="{{ $produit->quantite_restockage }}" required></p>
        <p><input type="text" name="categorie" id="categorie" placeholder="{{ $produit->categorie }}" required></p>

        <!--BOUTONS-->
        <div class="espaces-boutons">
            <button type="reset" value="Reset">Reset</button>
            <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
        </div>
    </form>
</body>
</html>