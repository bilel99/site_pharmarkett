<?php namespace App\Http\Controllers\admin;

use App\Commande;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommandeRequest;
use App\Http\Requests\EditCommandeRequest;
use Illuminate\Http\Request;

class CommandeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$commande = \App\Commande::with('user', 'devise', 'tableExemplaire', 'livraison', 'paiement')->get();
		$commande_exemplaire = \App\Commande_exemplaire::with('exemplaire')->get();
        //dd($commande);
        return view('admin.commande.commande', compact('commande', 'commande_exemplaire'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // fonction laravel lists permet de lister les donnée dans un tableau
        $exemplaire = \App\Commande_exemplaire::lists('quantite', 'id');
        $livraison = \App\Commande_livraison::lists('adresse', 'id');
        $paiement = \App\Commande_paiement::lists('montant', 'id');

        $user = \App\User::lists('nom', 'id');
        $devise = \App\Devise::lists('nom', 'id');
        return view('admin.commande.create', compact('exemplaire', 'livraison', 'paiement', 'user', 'devise'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommandeRequest $request)
	{
        //dd($request->all());
        $commande = new Commande;
        $commande->create($request->all());
        return redirect('/admin/commande')->withFlashMessage("Création de la commande effectué avec succes");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($commande)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($commande)
	{
        $commande = Commande::find($commande->id);
        // fonction laravel lists permet de lister les donnée dans un tableau
        $exemplaire = \App\Commande_exemplaire::lists('quantite', 'id');
        $livraison = \App\Commande_livraison::lists('adresse', 'id');
        $paiement = \App\Commande_paiement::lists('montant', 'id');

        $user = \App\User::lists('nom', 'id');
        $devise = \App\Devise::lists('nom', 'id');

        return view('admin.commande.edit', compact('exemplaire', 'livraison', 'paiement', 'commande', 'user', 'devise'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($commande, EditCommandeRequest $request)
	{
        $commande->update($request->all());
        return redirect('/admin/commande')->withFlashMessage("Mise à jour effectué avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($commande)
	{
        $commande->delete();
        return redirect()->back()->withFlashMessage("Suppression de la commande effectué avec succès");
	}

}
