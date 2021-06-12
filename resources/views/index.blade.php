<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

            <p><input type="text" name="nom" id="nom" placeholder="nom" minlength="5" maxlength="255" required></p>
            <p><input type="number" name="prix" id="prix" placeholder="prix" required></p>
            <p><input type="number" name="quantite_disponible" id="quantite_disponible" placeholder="quantité disponible" required></p>
            <p><input type="number" name="quantite_restockage" id="quantite_restockage" placeholder="quantité de restockage" required></p>

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

    </main>
</body>
</html>