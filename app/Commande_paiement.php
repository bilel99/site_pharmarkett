<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_paiement extends Model {

    protected $table = 'commande_paiement';
    protected $fillable = ['commande_id', 'montant', 'paiment_at'];

}
