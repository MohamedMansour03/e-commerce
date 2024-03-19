<?php
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RproductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::resource('produits', RproductController::class);



Route::get('/',[ProduitController::class,'home']);



Route::get('/produitsr/{cat}', [ProduitController::class,'getProdByCat']) ;



Route::get('/espaceclient', [ProduitController::class,'espaceclient'])->middleware('useruser');
Route::get('/catalogue', [ProduitController::class,'cataloguepdf'])->middleware('useruser');


Route::get('/produits/create',[RproductController::class,'create'])->name('create');


Route::delete('/produits/{id}', [RproductController::class,'destroy'])->name('destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/espaceadmin', [ProduitController::class,'espaceadmin'])->middleware('adminuser');





Route::middleware(['adminuser'])->group(function () {


    Route::get('/produits/{id}', [RproductController::class,'show'])->name('show');
    Route::get('/produits/{id}/edit', [RproductController::class,'edit'])->name('edit');
    Route::post('/produits', [RproductController::class,'store'])->name('store');
    Route::get('/produits/create', [RproductController::class,'create'])->name('create');    //    Appel : <a href="{{ route('name') }}">
    Route::put('/produits/{id}', [RproductController::class,'update'])->name('update');
    Route::delete('/produits/{id}', [RproductController::class,'destroy'])->name('destroy');
    Route::get('/email', [RproductController::class,'email']);
    Route::post('/send/email', [RproductController::class, 'sendEmail'])->name('send.email');



});


Route::get('cart', [RproductController::class, 'cart']);
Route::get('cart/addc/{id}', [RproductController::class, 'addToCart']);
Route::patch('update-cart', [RproductController::class, 'updatec'])->name('update-cart');

Route::delete('remove-from-cart', [RproductController::class, 'removec']);


use App\Http\Controllers\StripeController;

Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout');
Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('payment.success');































/*************Routes Controller Resource************/
/**
** Route::get('/produits', 'RproductController@index')->name('index');    //    Appel : <a href="{{ route('name') }}">
** Route::get('/produits/create',[RproductController::class,'create'])->name('create');
** Route::post('/produits', [RproductController::class,'store'])->name('store');
** Route::get('/produits/{id}', [RproductController::class,'show'])->name('show');
** Route::get('/produits/{id}/edit', [RproductController::class,'edit'])->name('edit'); // Appel : route('edit', ['id' => $id]);
** Route::put('/produits/{id}', [RproductController::class,'update'])->name('update');
** Route::delete('/produits/{id}', [RproductController::class,'destroy'])->name('destroy');
**/














