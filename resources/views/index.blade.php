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
    <header>
        <h1>This is the index page.</h1>

        <p><a href="/categories" title="Catégories de produits">Voir les catégories</a> - <a href="https://github.com/monmima/boutique-laravel">Dépôt sur Github</a></p>

    </header>

    <hr>

    <main>

        <div>
            @foreach($produits as $item)

                <ul>
                    <a href="{{ $item->id }}/edit">{{ $item->id }} <br> {{ $item->nom }} <br> {{ $item->prix }} <br>

                    Catégorie(s):
                    @foreach($item->categories as $categorie)
                        - {{ $categorie["name"] }}
                    @endforeach</a>

                    <form action="/{{ $item->id }}/delete" method="post">
                        <input class="btn btn-default" type="submit" value="Delete {{ $item->nom }}" />
                        @csrf
                        @method('delete')
                    </form>
                </ul>

            @endforeach
        </div>

        <hr>

        <form method="POST" action="/" name="create" id="create">
            @csrf <!-- cross-site request forgery -->

            <!-- value="{{ old('nom') }}" ===> https://laravel.com/docs/8.x/requests#old-input -->

            <p><input type="text" name="nom" id="nom" placeholder="nom" minlength="5" maxlength="255" value="{{ old('nom') }}" required></p>

            @error("nom")
                <p class="error"><small>@error("nom"){{$message}}@enderror</small></p>
            @enderror

            <p><input type="number" name="prix" id="prix" placeholder="prix" value="{{ old('prix') }}" required></p>

            @error("prix")
                <p class="error"><small>@error("prix"){{$message}}@enderror</small></p>
            @enderror

            <p><input type="number" name="quantite_disponible" id="quantite_disponible" placeholder="quantité disponible" value="{{ old('quantite_disponible') }}" required></p>

            @error("quantite_disponible")
                <p class="error"><small>@error("quantite_disponible"){{$message}}@enderror</small></p>
            @enderror

            <p><input type="number" name="quantite_restockage" id="quantite_restockage" placeholder="quantité de restockage" value="{{ old('quantite_restockage') }}" required></p>

            @error("quantite_restockage")
                <p class="error"><small>@error("quantite_restockage"){{$message}}@enderror</small></p>
            @enderror

            @foreach($categories as $categorie)
                <input type="checkbox" id="{{ $categorie->id }}" name="{{ $categorie->id }}" value="{{ $categorie->name }}">
                <label for="{{ $categorie->id }}">{{ $categorie->name }}</label><br>
            @endforeach

            <!--BOUTONS-->
            <div class="espaces-boutons">
                <button type="reset" value="Reset">Reset</button>
                <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
            </div>
        </form>

    </main>
</body>
</html>
