<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
//use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 
        'designation', 
        'description', 
        'prix', 
        'like', 
        'pays_source', 
        'poids',
        'image'
    ];
    public function commande() {
        return $this->hasMany(Commande::class);
    }
    public function users()/*: BelongsToMany*/{//pas oblig les : bel
        return $this->belongsToMany(User::class);
    }
}
