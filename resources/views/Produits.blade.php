<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>  @section('title','Produits')</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

</head>
<body>
  @extends('Master_page')
  <div class="page-heading about-page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Liste des Prduits de la catégorie  {{ $categorie }}<h2>
                </div>
            </div>
        </div>
    </div>
  </div>
  @section('content')
  <section class="section" id="men">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="men-item-carousel">
                    <div class="owl-men-item owl-carousel">
                        @foreach ($products as $product)
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li> <a href="{{ url('cart/addc', ['id' => $product['id']]) }}" class="btn btn-block text-center text-dark" role="button"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('imgs/' . $product->image) }}" alt="{{ $product->nom }}">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $product->nom }}</h4>
                                    <span>${{ $product->prix }}</span>
                                   
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  @endsection
  
  
</body>
</html>  
