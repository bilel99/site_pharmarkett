<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_paiement extends Model {

    protected $table = 'commande_paiement';
    protected $fillable = ['commande_id', 'montant', 'paiment_at'];

    public function paiement(){
        return $this->belongsTo('\App\Commande', 'commande_id');
    }

}
