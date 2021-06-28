<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

</head>
<body>
    <form method="POST" action="/{{ $produit->id }}" name="edit" id="edit">
        <!-- cross-site request forgery -->
        @csrf
        <!-- because modern browsers/forms can only take two different methods -->
        @method('PUT')

        <p><input type="text" name="nom" id="nom" value="{{ $produit->nom }}" minlength="5" maxlength="255" placeholder="nom" required></p>

        @error("nom")
            <p class="error"><small>@error("nom"){{$message}}@enderror</small></p>
        @enderror

        <p><input type="number" name="prix" id="prix" value="{{ $produit->prix }}" placeholder="prix" required></p>

        @error("prix")
            <p class="error"><small>@error("prix"){{$message}}@enderror</small></p>
        @enderror

        <p><input type="number" name="quantite_disponible" id="quantite_disponible" placeholder="quantité disponible" value="{{ $produit->quantite_disponible }}" required></p>

        @error("quantite_disponible")
            <p class="error"><small>@error("quantite_disponible"){{$message}}@enderror</small></p>
        @enderror

        <p><input type="number" name="quantite_restockage" id="quantite_restockage" placeholder="quantité de restockage" value="{{ $produit->quantite_restockage }}" required></p>

        @error("quantite_restockage")
            <p class="error"><small>@error("quantite_restockage"){{$message}}@enderror</small></p>
        @enderror

        <!-- create array of ticked boxes -->
        <?php $tickedArray = array() ?>

        <!-- push data to the array -->
        @foreach($produit->categories as $tickedBox)
            <?php
                array_push($tickedArray, $tickedBox->name);
            ?>
        @endforeach

        <hr>

        @error("categories[]")
        <p class="error"><small>@error("categories[]"){{$message}}@enderror</small></p>
        @enderror
        <select multiple name="categories[]">
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" {{in_array($categorie->id, old('categories', $produit->categories->pluck('id')->toArray())) ? 'selected' : ''}}> {{ $categorie->name }} </option>
            @endforeach
        </select>


        <hr>

        <!--BOUTONS-->
        <div class="espaces-boutons">
            <button type="reset" value="Reset">Reset</button>
            <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
        </div>
    </form>

</body>
</html>
