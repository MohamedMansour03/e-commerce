<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
          body {
            border: 2px solid #333; 
            padding: 20px; 
            font-family: Arial, sans-serif;
            color: #333; 
        }
    table {
  border-collapse:collapse;
  color: #404040;
}

th {
  font-size: 16px;
  border-bottom: 3px solid    #ffcb61 !important;
  padding: 5px 20px;
  font-weight: 600;
}
td {
  font-weight: 500;
  padding: 5px 30px;
  font-size: 16px;
  text-align: center;

}


tr:nth-child(2n){
  background-color: #f6f9f9;
}
tr:nth-child(2n) td {
 
  border-top:  1px solid #e0e0e0;
}



  </style>
</head>
<body>
    <h2> Our Promotions of products   </h2>
  
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">image</th>
    
          </tr>
        </thead>
        <tbody>
    
    @foreach ($products as $item)
    <tr>
        <td>{{$item['nom']  }}</td>
        <td>{{$item['prix']  }}DH</td>
        <td>
          <img  width="100px" src="{{ public_path('imgs/' . $item->image) }}" alt="{{ $item->nom }}">
        </td>

    
      </tr>
    
    @endforeach
    
    
        </tbody>
      </table>
    
</body>
</html>