<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <style>
    .cont {
        padding: 70px 0px;
    }
            table {
  border-collapse:collapse;
  color: #404040;
  width: 950px;
  margin: 10px;
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
.but{
  text-decoration: none;
  margin: 10px;
  position: relative;
  border: none;
  font-size: 10px;
  font-family: inherit;
  color: black !important;
  width: 15em;
  height: 4em;
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









    </style>
</head>
<body>
 @extends('Master_page')
<div class=" container con">
@section('content')
    <h2>Cart Details:</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $id => $details)
                <tr>
                    <td>{{ $details['name'] }}</td>
                    <td>{{ $details['price'] }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>{{ $details['price'] * $details['quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total: {{ $total }}</h3>

    <form action="{{ route('session') }}" method="POST">
        @csrf
        <input type="hidden" name="productname" value="Product Name">
        <input  type="hidden" name="total" value="{{ $total }}">
        <button type="submit"  class="but">Proceed to Payment</button>
    </form>
    @endsection

</div>
  
</body>
</html>
