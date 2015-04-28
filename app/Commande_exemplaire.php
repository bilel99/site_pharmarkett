<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_exemplaire extends Model {

    protected $table = 'commande_exemplaire';
    protected $fillable = ['exemplaire_id', 'quantite', 'montant'];


    public function exemplaire(){
        return $this->belongsTo('\App\Produit_exemplaire', 'exemplaire_id');
    }

}
