<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Great+Vibes&family=Marck+Script&family=Sevillana&display=swap" rel="stylesheet">
    <title>@yield('title', 'add')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Great+Vibes&family=Marck+Script&family=Sevillana&display=swap');
        .n{
font-family: 'Beau Rivage', cursive;
font-family: 'Great Vibes', cursive;
font-family: 'Marck Script', cursive;
font-family: 'Sevillana', cursive;
        }

        body {
            margin: 0;
            padding: 0;
            font-size: 50px;

        }

        .con {
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
            margin: 10px 0 ;
            color: black;
            font-size: .9em;
            font-weight: 700;
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
    <div class="container justify-content-center mt-3">
        @include('incs.flash')
    </div>
    <div class="con">
        <h1 class="text-center n">Add product</h1>
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <form method="POST" action="/produits" enctype="multipart/form-data" class="form_main">
                        @csrf

                        <div class="form-group">
                            <label for="nom" class="heading">
                                <i class="inputIcon fas fa-user"></i>
                                {{ __('Nom du produit') }}
                            </label>
                            <input id="nom" type="text" class="inputField form-control" name="nom">
                            @error('nom')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="prix" class="heading">
                                <i class="inputIcon fas fa-dollar-sign"></i>
                                {{ __('Prix du produit') }}
                            </label>
                            <input id="prix" type="text" class="inputField form-control" name="prix">
                            @error('prix')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categorie" class="heading">
                                <i class="inputIcon fas fa-list"></i>
                                {{ __('Catégorie du produit') }}
                            </label>
                            <input id="categorie" type="text" class="inputField form-control" name="categorie">
                            @error('categorie')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="heading">
                                <i class="inputIcon fas fa-image"></i>
                                {{ __('Image du produit') }}
                            </label>
                            <input  id="image" type="file" class="inputField form-control-file  " name="image">
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary" id="button">
                                {{ __('Ajouter le produit') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @endsection
</body>



</html>
