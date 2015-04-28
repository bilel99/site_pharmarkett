<?php namespace App\Http\Controllers\Admin;

use App\Commande_paiement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CommandePaiementRequest;
use App\Http\Requests\EditCommandePaiementRequest;
use Illuminate\Http\Request;

class CommandePaiementController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function index()
    {
        $commande_paiement = \App\Commande_paiement::get();
        //dd($commande);
        return view('admin.commandePaiement.commandePaiement', compact('commande_paiement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.commandePaiement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CommandePaiementRequest $request)
    {
        //dd($request->all());
        $commandePaiement = new Commande_paiement;
        $commandePaiement->create($request->all());
        return redirect('/admin/commandePaiement')->withFlashMessage("Création du paiement de la commande effectué avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($commandePaiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($commandePaiement)
    {
        $commandePaiement = Commande_paiement::find($commandePaiement->id);
        return view('admin.commandePaiement.edit', compact('commandePaiement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($commandePaiement, EditCommandePaiementRequest $request)
    {
        $commandePaiement->update($request->all());
        return redirect('/admin/commandePaiement')->withFlashMessage("Mise à jour effectué avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($commandePaiement)
    {
        $commandePaiement->delete();
        return redirect()->back()->withFlashMessage("Suppression du paiement de la commande effectué avec succès");
    }

}
