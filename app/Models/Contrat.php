<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Agent() {
        return $this->belongsTo(Personnel::class, 'personnels_id');
    }

    function Occasionnelle() {
        return $this->hasMany(Occasionnelle::class,"contrats_id","id");
    }

    function Precompte() {
        return $this->hasMany(Precompte::class,"contrats_id","id");
    }
    function AutresRetenu() {
        return $this->hasMany(AutresRetenu::class,"contrats_id","id");
    }

    function Paiement() {
        return $this->hasMany(Paiement::class,"contrats_id","id");
    }
}
