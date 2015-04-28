<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model {

    protected $table = 'commande';
    protected $fillable = ['user_id', 'exemplaire_id', 'livraison_id', 'paiement_id', 'devise_id', 'reference','commande_at', 'livraison_at', 'statut', 'montant'];



    public function getCreatedAtAttribute($value){
        // Changement de la date en français
        return date('d/m/y h\hi', date_timestamp_get(date_create($value)));
    }



    public function user(){
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function devise(){
        return $this->belongsTo('\App\Devise', 'devise_id');

    }



    public function tableExemplaire(){
        return $this->belongsTo('\App\Commande_exemplaire', 'exemplaire_id');
    }


    public function livraison(){
        return $this->belongsTo('\App\Commande_livraison', 'livraison_id');
    }


    public function paiement(){
        return $this->belongsTo('\App\Commande_paiement', 'paiement_id');
    }



}
