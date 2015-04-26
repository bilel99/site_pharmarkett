<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*** Partie admin mettre un commentaire sur chaque route pour connaitre l'avancement ***/
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [ 'as' => 'accueil', 'uses' => 'Admin@index']);
    Route::resource('contact', 'Admin\ContactController', ['only' => ['destroy', 'index']]);
    Route::get('contact/done/{contact}', ['as' => 'admin.contact.done', 'uses' => 'Admin\ContactController@done']);
    Route::post('contact/mail/{contact}', ['as' => 'admin.contact.mail', 'uses' => 'Admin\ContactController@mail']);

    Route::resource('fournisseur', 'Admin\FournisseurController');
    Route::resource('commande', 'Admin\CommandeController');
});


Route::group(['prefix' => 'forum'], function()
{
	Route::get('/', function()
    {
        return 'le forum';
    });

    Route::get('sujet', function()
    {
        return 'les sujets';
    });

    Route::get('message', function()
    {
         return 'les messages';
    });
    Route::get('profil', function()
    {
         return 'le profil';
    });



});





/**
 * Route par default d'authentification, déjà faite et fonctionnel ne pas y toucher
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);








Route::group(['prefix' => 'ws', 'middleware' => 'authentification'], function()
{

//Ressource : User
//Front : Get / Update / Store
//Admin : Get / Destroy / Update / Store
//Forum : Get / Update
    Route::resource('user', 'UserController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);

    //Ressource : Contact
    //Front : Store
    //Admin : Get / Destroy / Update
    //Forum : Nan
    Route::resource('contact', 'ContactController', ['only' => ['store', 'destroy', 'update', 'show', 'index']]);
});










//////////////
//*** en creation ne pas faire gaffe je test les template voir si sa peu être interessant**/
//Route::get('/', 'WelcomeController@index');

//Route::get('/', 'HomeController@index');
Route::get('categorie', function()
{
    return 'la categorie';
});
Route::get('produit', function()
{
     return View::make('front.produit.produit');
});
Route::get('mon-compte', function()
{
    return View::make('front.compte.compte');
});
Route::get('commande', function()
{
    return View::make('front.commande.adresse');
});

Route::get('contact', function()
{
    return View::make('front.contact.contact');
});

Route::get('contact2', function()
{
    return View::make('front.contact.contact2');
});

Route::get('/', function()
{
     return View::make('front.home.home');
});
/////////////////////////////