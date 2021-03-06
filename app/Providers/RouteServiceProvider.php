<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

        $router->model('user', 'App\User', function() {
            \App::abort(404);
        });

        $router->model('contact', 'App\Contact', function() {
            \App::abort(404);
        });

        $router->model('fournisseur', 'App\Fournisseur', function() {
            \App::abort(404);
        });

        $router->model('commande', 'App\Commande', function() {
            \App::abort(404);
        });

        $router->model('commandeExemplaire', 'App\Commande_exemplaire', function() {
            \App::abort(404);
        });

        $router->model('commandeLivraison', 'App\Commande_livraison', function() {
            \App::abort(404);
        });

        $router->model('commandePaiement', 'App\Commande_paiement', function() {
            \App::abort(404);
        });
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
