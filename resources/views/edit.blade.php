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

        <p><input type="text" name="nom" id="nom" value="{{ $produit->nom }}" minlength="5" maxlength="255" placeholder="nom" required></p>
        <p><input type="number" name="prix" id="prix" value="{{ $produit->prix }}" placeholder="prix" required></p>
        <p><input type="number" name="quantite_disponible" id="quantite_disponible" placeholder="quantité disponible" value="{{ $produit->quantite_disponible }}" required></p>
        <p><input type="number" name="quantite_restockage" id="quantite_restockage" placeholder="quantité de restockage" value="{{ $produit->quantite_restockage }}" required></p>

        {{-- <p><input type="text" name="categorie" id="categorie" value="{{ $produit->categorie }}" placeholder="catégorie" required></p> --}}

        <!-- create array of ticked boxes -->
        <?php $tickedArray = array() ?>

        <!-- push data to the array -->
        @foreach($produit->categories as $tickedBox)

            <?php
                array_push($tickedArray, $tickedBox->name);
            ?>

        @endforeach

        <hr>

        <!-- compare and print the data -->
        @foreach($categories as $categorie)

            @if (in_array($categorie->name, $tickedArray))
                <input type="checkbox" id="{{ $categorie->id }}" name="{{ $categorie->id }}" value="{{ $categorie->name }}" checked>
                <label for="{{ $categorie->id }}">{{ $categorie->name }}</label><br>
            @else
                <input type="checkbox" id="{{ $categorie->id }}" name="{{ $categorie->id }}" value="{{ $categorie->name }}">
                <label for="{{ $categorie->id }}">{{ $categorie->name }}</label><br>
            @endif

        @endforeach

        <hr>

        <!--BOUTONS-->
        <div class="espaces-boutons">
            <button type="reset" value="Reset">Reset</button>
            <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
        </div>
    </form>


    <!-- error message if validation doesn't pass -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>