<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm you account</title>
</head>
<body>
<div class="container my-2">
        <img class='mx-auto w-25' width="120px" src="{{ asset('assets/images/logo_black.png') }}" alt="Logo">
        <h1 class="title p-1">Félecitation </h1>
        <h3>Hello {{ $name }}</h3>
        <p class="p-1">
            "Cher {{ $name }}, C'est avec plaisir que nous vous annonçons que votre compte sur <strong>DREAMS STORE</strong> a été créé avec succès. Connectez-vous dès maintenant pour accéder à votre compte et découvrir tout ce que notre site a à offrir."
        </p>
</div>
</body>
</html>