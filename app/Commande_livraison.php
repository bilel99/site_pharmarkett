<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_livraison extends Model {

    protected $table = 'commande_livraison';
    protected $fillable = ['commande_id', 'adresse', 'cp','ville', 'deliver_at'];

}
