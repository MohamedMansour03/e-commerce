<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title', 'Cart')</title>
    <style>
    .cont {
        padding: 70px 0px;
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
.bb{
    position: relative;
    top: 200px !important;
}
.nn{
    color: white !important;
    background-color: red !important;
}
.cc{
    color: white !important;
    background-color:   black !important;

}


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






    </style>
</head>
<body>
 @extends('Master_page')
@section('content')
@include('incs.flash')
<div class="container cont ">
    <table id="cart" class="table table-hover table-condensed ">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <?php $total += $details['price'] * $details['quantity'] ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('imgs/'.$details['photo']) }}" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $details['price'] }}-$</td>
                        <td data-th="Quantity" style="display: flex; align-items: center;">
                            <form action="{{ url('update-cart') }}" method="post" style="display: flex; align-items: center;">
                                @method('PATCH')
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control quantity mr-2" style="width: 60px; margin-right: 5px;" />
                                <button type="submit" class="btn btn-sxl cc" style="padding: 6px 10px;"><i class="fa fa-pencil"></i></button>
                            </form>
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }}-$</td>
                        <td class="actions" data-th="">
                            <form action="{{ url('remove-from-cart') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-sxl  nn"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td><button class="but"><a style="color:  black" href="{{ route('checkout') }}"  >checkout</a></button></td>
                <td></td>
                <td></td>
                <td class="hidden-xll text-center"><strong>Total {{ $total }} -$</strong></td>
              
            </tr>
        </tfoot>
    </table>


</div>


@endsection




    
</body>
</html>