<?php

namespace App\Http\Controllers; 

use App\Http\Controllers\Controller; 
use App\Models\Command;
use App\Models\Produit;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request; 

class StripeController extends Controller
{
    public function checkout()
    {
        // Récupérer le panier depuis la session
        $cart = Session::get('cart');

        // Calculer le total du panier
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Retourner la vue du paiement avec les détails du panier
        return view('checkout', compact('cart', 'total'));
    }

    public function session(Request $request)
    {
        // Configuration de la clé API Stripe
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        
        // Récupérer le nom du produit et le total depuis la requête
        $productName = $request->input('productname');
        $totalPrice = $request->input('total');

        // Créer une session de paiement avec Stripe
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $productName,
                        ],
                        'unit_amount' => $totalPrice * 100, // Convertir le total en cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success'), // URL de redirection en cas de succès
            'cancel_url' => route('checkout'), // URL de redirection en cas d'annulation
        ]);

        // Rediriger l'utilisateur vers l'URL de paiement Stripe
        return redirect()->away($session->url); 
    }

    public function success(Request $request)
    {
        // Récupérer le panier depuis la session
        $cart = Session::get('cart');

        // Parcourir les éléments du panier et enregistrer chaque commande dans la base de données
        foreach ($cart as $item) {
            $product = Produit::where('nom', $item['name'])->first();

            if (isset($product)) {
                $command = new Command();
                $command->product_id = $product->id; 
                $command->product_name = $item['name'];
                $command->price = $item['price'];
                $command->quantity = $item['quantity'];
                $command->subtotal = $item['price'] * $item['quantity'];
                $command->save();
            }
        }

        // Effacer le panier après avoir enregistré la commande
        Session::forget('cart');

        // Retourner la vue de paiement réussi
        return view('payment_success');
    }
}



//return redirect()->rout('')->with('' ,'')