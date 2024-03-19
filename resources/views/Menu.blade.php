<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

</head>

<body>
     <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="/" class="logo">
                            <img width="120px" src="{{ asset('assets/images/logo_black.png') }}" alt="Logo">
                        </a>
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="/" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="/produitsr/homme">Men's</a></li>
                            <li class="scroll-to-section"><a href="/produitsr/femme">Wommen's</a></li>
                            <li class="scroll-to-section"><a href="/produitsr/enfant">Kid's</a></li>
                            @if(Auth::user())
                                @if(Auth::user()->role==='ADMIN')
                                    <li class="scroll-to-section">
                                        <a href="{{ route('create') }}">Add a New Product</a>
                                    </li>
                                    <li class="scroll-to-section">
                                        <a href="/espaceadmin">Update</a>
                                    </li>
                                    <li class="scroll-to-section">
                                        <a href="/email">Send Email</a>
                                    </li>
                                @endif

                                @if(Auth::user()->role==='USER')
                                    <li class="scroll-to-section">
                                        <a href="/espaceclient">Client area</a>
                                    </li>
                                @endif

                                <li class="scroll-to-section">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit" class="btn">Disconnect</button>
                                    </form>
                                </li>
                            @else
                                <li class="scroll-to-section">
                                    <a href="/login">login</a>
                                </li>
                                <li class="scroll-to-section">
                                    <a href="/register">Register</a>
                                </li>
                            @endif
                            <li class="scroll-to-section">
                                <a  href="/cart"><img width="25px" style="margin-bottom: 50%" src="{{ asset('assets/images/icon-cart.svg') }}" alt="icon-cart"></a>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                            
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

</body>

</html>
