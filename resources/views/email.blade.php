<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title','email')</title>
    <style>
        .but{
  text-decoration: none;
  position: relative;
  border: none;
  font-size: 14px;
  font-family: inherit;
  color: black !important;
  width: 9em;
  height: 3em;
  line-height: 2em;
  text-align: center;
  background: linear-gradient(90deg,#f15412, #ffcb61,#ffeb3b,#03a9f4);
  background-size: 300%;
  border-radius: 30px;
  z-index: 1;
  max-width: 100% !important;
}
.but:before {
  content: '';
  position: absolute;
  top: -5px;
  left: -5px;
  right: -5px;
  bottom: -5px;
  z-index: -1;
  background: linear-gradient(90deg ,#f15412,#f441a5,#ffeb3b,#03a9f4);
  background-size: 400%;
  border-radius: 35px;
  transition: 1s;
}

.but:hover::before {
  filter: blur(20px);
}
.cont {
        padding: 70px 0px;
    }

    </style>
</head>
<body>
@extends('Master_page')
@section('content')

<div class="container justify-content-center mx-2 cont ">
    @include('incs.flash')
<h2> Envoyer un email :</h2>
</div>
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('send.email') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="recipient_email">Recipient Email:</label>
                    <input type="email" class="form-control" name="recipient_email" required>
                </div>

                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" name="subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="but"><i class="fa fa-paper-plane mx-1"></i>Send Email</button>
            </form>
        </div>
    </div>
@endsection

    
</body>
</html>


<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

