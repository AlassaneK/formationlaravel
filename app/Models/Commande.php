<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    public function produit (){
        return $this->belongsTo(Produit::class,'produit_id','id');
    }
}
