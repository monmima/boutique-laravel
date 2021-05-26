<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This is the index page.</h1>

    <hr>

    <main>

        <div>
            @foreach($produits as $item)

                <ul>
                    <a href="{{ $item->id }}/edit">{{ $item->id }} | {{ $item->nom }} | {{ $item->prix }}</a>
                    
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

            <p><input type="text" name="nom" id="nom" placeholder="nom" required></p>
            <p><input type="number" name="prix" id="prix" placeholder="prix" required></p>
            <p><input type="number" name="quantite_disponible" id="quantite_disponible" placeholder="quantité disponible" required></p>
            <p><input type="number" name="quantite_restockage" id="quantite_restockage" placeholder="quantité de restockage" required></p>
            <p><input type="text" name="categorie" id="categorie" placeholder="categorie" required></p>


            <!--BOUTONS-->
            <div class="espaces-boutons">
                <button type="reset" value="Reset">Reset</button>
                <button type="submit" value="Submit" class="bouton-bleu">Submit</button>
            </div>
        </form>

    </main>
</body>
</html>