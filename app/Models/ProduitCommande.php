<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'commande_id',
        'qte',
    ];

    public function produit()
{
    return $this->belongsTo(Produit::class);
}

public function commande()
{
    return $this->belongsTo(Commande::class);
}

}
