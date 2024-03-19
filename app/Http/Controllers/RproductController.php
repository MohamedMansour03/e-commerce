<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class RproductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits=Produit::paginate(3);
        return view('home', ['products' => $produits ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('Addproduit');
    }
  
    public function store(AddProductRequest $request)
    {
        $request->validated();

         // récupérer les valeurs des champs :
         $nom=$request->input('nom');
         $prix=$request->input('prix');
         $categorie=$request->input('categorie');
         $image=$request->file('image')->getClientOriginalName();




         //Créer un objet Produit

         $Produit= new Produit();

         $Produit->nom=$nom;
         $Produit->prix=$prix;
         $Produit->categorie=$categorie;
         $Produit->image=$image;

           // enregistrer dans la table articles
         $Produit->save();

           // enregistrer dans le dossier (public\images)


           $request->file('image')->move(public_path('imgs'), $image);

           return back()->with('success','You have successfully added a new Product.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit=Produit::find($id);
       return view('edit')->with('produit', $produit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddProductRequest $request, $id)
    {
        $request->validated();

        // récupérer les nouvelles valeurs des champs :
        $nom=$request->input('nom');
        $prix=$request->input('prix');
        $categorie=$request->input('categorie');

        $image='';



       // récupérer l'objet Produit via l'id

        $Produit=Produit::find($id);

       // update with save



         $Produit->nom=$nom;
         $Produit->prix=$prix;
         $Produit->categorie=$categorie;
         if($request->hasFile('image')) {
            $image=$request->file('image')->getClientOriginalName();
// enregistrer dans le dossier (public\images)


$request->file('image')->move(public_path('imgs'), $image);

        }else{
            $image= $Produit->image;
        }
         $Produit->image=$image;


         $Produit->save();



          return back()->with('successupdate','You have successfully updated a product.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


         // récupérer l'objet article via l'id

         $Produit=Produit::find($id);


         // delete with delete

         $Produit->delete();

         return back()->with('successdelete','You have successfully deleted a product.');

    }

    public function cart()
    {


         return view('cart');

    }

    public function addToCart($id)
    {


        $product = Produit::find($id);


        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->nom,
                        "quantity" => 1,
                        "price" => $product->prix,
                        "photo" => $product->image
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart); // this code put product of choose in cart

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->nom,
            "quantity" => 1,
            "price" => $product->prix,
            "photo" => $product->image
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return redirect()->back()->with('success', 'Product added to cart successfully!');



    }


    public function updatec(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
    
            if (isset($cart[$request->id])) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
            }
        }
    
        return redirect('cart'); 
    }
    
     
     public function removec(Request $request)
     {
         if ($request->id) {
             $cart = session()->get('cart');
     
             if (isset($cart[$request->id])) {
                 unset($cart[$request->id]);
                 session()->put('cart', $cart);
             }
             session()->flash('success', 'Product removed successfully');
         }
         return redirect('cart'); 
     }


     public function email()
    {
        return view('email');

    }
    public function sendEmail(Request $request)
    {
        $data = [
            'recipient_email' => $request->input('recipient_email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
    
        // Envoyer l'e-mail en utilisant la classe Mailable
        Mail::to($data['recipient_email'])->send(new TestMail($data));
    
        return back()->with('success','Email sent successfully!');
    }











   
}












