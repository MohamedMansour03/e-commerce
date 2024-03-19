<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
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
.bb{
    position: relative;
    top: 50px;
}





    </style>
</head>
<body>
    @extends('Master_page')
    @section('content')
    <div class="container bb">
        <table class="table mx-5   ">
            <thead>
              <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
        
        @foreach ($products as $item)
        <tr>
            <td>{{$item['nom']  }}</td>
            <td>{{$item['prix']  }}DH</td>
            <td><img src="{{ asset('imgs/'.$item['image']) }}" alt="Image " class="img-fluid" width="100"></td>
            <td style="display: flex" >
                <a class="btn btn-warning" href="produits/{{ $item->id }}/edit"><i class="fa fa-pencil"  style="margin: 5px"></i>Modifier</a>
                &nbsp;&nbsp;
        
                <form action={{ route('destroy', ['id' => $item->id]) }} method="POST">
                    @csrf
                    @method('delete')
        
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">
                        <i class="fa fa-trash"  style="margin: 5px"></i>Supprimer
                    </button>
        
                    <!-- Modal de confirmation -->
                    <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer cet objet ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        {{ $products->links('vendor\pagination\custom') }}
    </div>
   
   
    @endsection

   
     
   
    
</body>
</html>