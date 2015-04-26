<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditCommandeRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        return [
            'user_id' => 'required|numeric',
            'devise_id' => 'required|numeric',
            'commande_at' => 'required|date',
            'livraison_at' => 'required|date',
            'statut' => 'required|max:45',
            'montant' => 'required|max:45'
        ];
	}

}
