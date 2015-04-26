<?php namespace App\Http\Controllers\Admin;

use App\Fournisseur;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\FournisseurRequest;
use Illuminate\Http\Request;

class FournisseurController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$fournisseur = Fournisseur::get();
        return view('admin.fournisseur.fournisseur', compact('fournisseur'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.fournisseur.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(FournisseurRequest $request)
	{
        //dd($request->all());
        $fournisseur = new Fournisseur;
        $fournisseur->create($request->all());
        return redirect('/admin/fournisseur')->withFlashMessage("Création du fournisseur effectué avec succès");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($fournisseur)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($fournisseur)
	{
        $fournisseur = Fournisseur::find($fournisseur->id);

        return view('admin.fournisseur.edit', compact('fournisseur'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($fournisseur, FournisseurRequest $request)
	{
	    //dd($request->all());
        //$fournisseur = Fournisseur::find($fournisseur);
        $fournisseur->update($request->all());
        return redirect('/admin/fournisseur')->withFlashMessage("Mise à jour effectué avec succès");

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($fournisseur)
	{
		$fournisseur->delete();
        return redirect()->back()->withFlashMessage("Suppression du fournisseur effectué avec succès");
	}

}
