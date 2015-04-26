<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model {

	protected $table = 'fournisseur';
	protected $fillable = ['siret', 'nom', 'adresse','cp', 'ville', 'phone', 'contact', 'commentaire'];



    public function getCreatedAtAttribute($value){
        // Changement de la date en français
        return date('d/m/y h\hi', date_timestamp_get(date_create($value)));
    }

}
