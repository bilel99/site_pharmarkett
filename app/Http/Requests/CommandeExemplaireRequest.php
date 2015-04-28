<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommandeExemplaireRequest extends Request {

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
            'exemplaire_id' => 'required|numeric',
            'quantite' => 'required|numeric',
            'montant' => 'required|numeric'
		];
	}

}
