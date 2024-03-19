<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Great+Vibes&family=Marck+Script&family=Sevillana&display=swap');
                .n{
font-family: 'Beau Rivage', cursive;
font-family: 'Great Vibes', cursive;
font-family: 'Marck Script', cursive;
font-family: 'Sevillana', cursive;
        }
         .cont {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgb(255, 255, 255);
            overflow: hidden;
            padding: 70px 0px;
        
        }

        .heading {
            font-size: 1em;
            color: #2e2e2e;
            font-weight: 700;
            margin: 5px 0 10px 0;
            text-align: center;
            z-index: 2;
            
        }

        .inputContainer {
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }

        

        .inputField {
            width: 100%;
            height: 30px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid rgb(173, 173, 173);
            margin: 10px 0;
            color: black;
            font-size: .9em;
            font-weight: 800;
            box-sizing: border-box;
            padding-left: 30px;
            font-family: 'Beau Rivage', cursive;
        }

        .inputField:focus {
            outline: none;
            border-bottom: 2px solid rgb(199, 114, 255);
        }

        .inputField::placeholder {
            color: rgb(80, 80, 80);
            font-size: 1em;
            font-weight: 500;
        }

        #button {
            z-index: 2;
            position: relative;
            width: 100%;
            border: none;
            background-color: rgb(162, 104, 255);
            height: 30px;
            color: white;
            font-size: .8em;
            font-weight: 500;
            letter-spacing: 1px;
            margin: 10px;
            cursor: pointer;
        }

        #button:hover {
            background-color: rgb(126, 84, 255);
        }

        .forgotLink {
            z-index: 2;
            font-size: .7em;
            font-weight: 500;
            color: rgb(44, 24, 128);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 20px;
        }
       

   
    </style>
</head>

<body>
    @extends('Master_page')

    @section('content')
    <div class="cont">
        <h1 class="n">Edit product</h1>
        <div class="row justify-content-center">
                    <div class="card-body form-container">
                        <form action="/produits/{{$produit->id}}" method="POST" enctype="multipart/form-data" class="form_main">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="nom" class="heading">Nom du produit</label>
                                @error('nom')
                                {{ $message }}
                                @enderror
                                <div class="inputContainer">
                                    <i class="inputIcon fas fa-user"></i>
                                    <input type="text" class="inputField" id="nom" name="nom" value="{{ $produit->nom }}" placeholder="Nom du produit">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="prix" class="heading">Prix du produit</label>
                                @error('prix')
                                {{ $message }}
                                @enderror
                                <div class="inputContainer">
                                    <i class="inputIcon fas fa-dollar-sign"></i>
                                    <input type="text" class="inputField" id="prix" name="prix" value="{{ $produit->prix }}" placeholder="Prix du produit">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image" class="heading">{{ __('Image du produit') }}</label>
                                <div class="inputContainer">
                                    <i class="inputIcon fas fa-image"></i>
                                    <input id="image" type="file" class="inputField" name="image" placeholder="Image du produit">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="categorie" class="heading">Catégorie du produit</label>
                                @error('categorie')
                                {{ $message }}
                                @enderror
                                <div class="inputContainer">
                                    <i class="inputIcon fas fa-list"></i>
                                    <input type="text" class="inputField" id="categorie" name="categorie" value="{{ $produit->categorie }}" placeholder="Catégorie du produit">
                                </div>
                            </div>

                            <button type="submit" id="button"><i class="fas fa-save"></i> Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>











<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

