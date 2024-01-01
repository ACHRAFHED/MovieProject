<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Payexpress;
use App\Http\Controllers\FormulaireController;

Route::group(['middleware' => ['web']], function(){

    //Affichage des Movies
    Route::get('/', 'MoviesController@index')->name('movies.index');
    Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');
    Route::get('Payzone/{total}', 'PayzoneController@payment')->name('Payzone.payment');
    Route::get('/PayExpress/{total}', 'Payexpress@payment')->name('Payexpress.payment');
    Route::post('/callback', 'Payexpress@callback')->name('callback');
    //Affichage des Tv Shows
    Route::get('/tv', 'TvController@index')->name('tv.index');
    Route::get('/tv/{id}', 'TvController@show')->name('tv.show');
       
    //Affichage des Acteurs
    Route::get('/actors', 'ActorsController@index')->name('actors.index');
    Route::get('/actors/page/{page?}', 'ActorsController@index');
    Route::get('/actors/{id}', 'ActorsController@show')->name('actors.show');
    
    //Panier
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    
    //Ajout au Panier
    Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
    
    //Modifié le Panier
    Route::patch('/update-cart', [ProductController::class, 'update'])->name('update.cart');
    
    //Supprimer le produit 
    Route::delete('/remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
   
    //Mise en page
    Route::get('main1', [MoviesController::class, 'main1']);
    Route::get('/login', function () {
        return view('login');
    });

    //Déconnexion 
    Route::get('/logout', function () {
        Session::forget('user');
        Session::forget('cart');
        return redirect('login');
    });
   
    //Inscription
    Route::view('/register', 'register');
    Route::post('/register', [UserController::class, 'register']);

    //Connexion
    Route::post('login', [UserController::class, 'login']);
   
    //Page de reponse après le paiement 
    Route::post('/return_page', 'PayzoneController@return_page')->name('return_page');
    Route::post('/thanks_page', 'PayzoneController@thanks_page')->name('thanks_page');
    Route::post('/error_page', 'PayzoneController@error_page')->name('error_page');

    Route::get('/paiement/{total}', [ProductController::class, 'paiement'])->name('paiement');



});