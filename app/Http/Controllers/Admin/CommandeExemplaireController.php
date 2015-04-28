<?php namespace App\Http\Controllers\Admin;

use App\Commande_exemplaire;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommandeExemplaireRequest;
use App\Http\Requests\EditCommandeExemplaireRequest;
use Illuminate\Http\Request;

class CommandeExemplaireController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $commande_exemplaire = \App\Commande_exemplaire::with('exemplaire')->get();
        //dd($commande);
        return view('admin.commandeExemplaire.commandeExemplaire', compact('commande_exemplaire'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // fonction laravel lists permet de lister les donnée dans un tableau
        $exemplaire = \App\Produit_exemplaire::lists('reference', 'id');

        return view('admin.commandeExemplaire.create', compact('exemplaire'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CommandeExemplaireRequest $request)
	{
        //dd($request->all());
        $commandeExemplaire = new Commande_exemplaire;
        $commandeExemplaire->create($request->all());
        return redirect('/admin/commandeExemplaire')->withFlashMessage("Création de l'exemplaire de la commande effectué avec succes");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($commandeExemplaire)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($commandeExemplaire)
	{
		$commandeExemplaire = Commande_exemplaire::find($commandeExemplaire->id);

        // fonction laravel lists permet de lister les donnée dans un tableau
        $exemplaire = \App\Produit_exemplaire::lists('reference', 'id');
        return view('admin.commandeExemplaire.edit', compact('exemplaire', 'commandeExemplaire'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($commandeExemplaire, EditCommandeExemplaireRequest $request)
	{
        $commandeExemplaire->update($request->all());
        return redirect('/admin/commandeExemplaire')->withFlashMessage("Mise à jour effectué avec succès");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($commandeExemplaire)
	{
        $commandeExemplaire->delete();
        return redirect()->back()->withFlashMessage("Suppression de l'exemplaire de la commande effectué avec succès");
	}

}
