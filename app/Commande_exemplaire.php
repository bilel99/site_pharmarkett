<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_exemplaire extends Model {

    protected $table = 'commande_exemplaire';
    protected $fillable = ['exemplaire_id', 'commande_id', 'devise_id','quantite', 'montant'];


    public function exemplaire(){
        return $this->belongsTo('\App\Produit_exemplaire', 'exemplaire_id');
    }


    public function devise(){
        return $this->belongsTo('\App\Devise', 'devise_id');
    }

}
