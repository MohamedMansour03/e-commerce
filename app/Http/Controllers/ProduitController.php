<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ProduitController extends Controller
{

    public function home()
    {
        $products = Produit::all();
        return view('home', ['products' => $products]);
    }

    public function espaceadmin()
    {
        $produits = Produit::paginate(3);
        return view('espaceadmin', ['products' => $produits]);
    }

    public function espaceclient()
    {
        return view('espaceclient');


    }
  

    public function getProdByCat(Request $rq)
    {
        $cat = $rq->route('cat');
        $produits = Produit::where('categorie', '=', $cat)->get();

        return view('Produits', [
            'products' => $produits,
            'categorie' => $cat
        ]);
    }

    public function cataloguepdf()
    {
        // Récupérer les produits avec un solde égal à 1
        $products = Produit::where('solde', 1)->get();
        $data = [
            'products' => $products,
        ];

        // Générer le PDF
        $pdf = PDF::loadView('catalogue', $data); // Use 'PDF' here, not 'Pdf'

       $filename = 'catalogue.pdf';

       return $pdf->download($filename);
    }












}





