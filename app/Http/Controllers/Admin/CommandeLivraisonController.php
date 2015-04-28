<?php namespace App\Http\Controllers\Admin;

use App\Commande_livraison;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommandeLivraisonRequest;
use App\Http\Requests\EditCommandeLivraisonRequest;
use Illuminate\Http\Request;

class CommandeLivraisonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $commande_livraison = \App\Commande_livraison::get();
        //dd($commande);
        return view('admin.commandeLivraison.commandeLivraison', compact('commande_livraison'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.commandeLivraison.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CommandeLivraisonRequest $request)
    {
        //dd($request->all());
        $commandeLivraison = new Commande_livraison;
        $commandeLivraison->create($request->all());
        return redirect('/admin/commandeLivraison')->withFlashMessage("Création de la livraison de la commande effectué avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($commandeLivraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($commandeLivraison)
    {
        $commandeLivraison = Commande_livraison::find($commandeLivraison->id);
        return view('admin.commandeLivraison.edit', compact('commandeLivraison'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($commandeLivraison, EditCommandeLivraisonRequest $request)
    {
        $commandeLivraison->update($request->all());
        return redirect('/admin/commandeLivraison')->withFlashMessage("Mise à jour effectué avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($commandeLivraison)
    {
        $commandeLivraison->delete();
        return redirect()->back()->withFlashMessage("Suppression de la livraison de la commande effectué avec succès");
    }

}
