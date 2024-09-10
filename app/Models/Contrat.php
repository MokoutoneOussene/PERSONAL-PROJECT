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
        return $this->hasOne(Occasionnelle::class);
    }

    function Precompte() {
        return $this->hasOne(Precompte::class);
    }

    function Paiement() {
        return $this->hasOne(Paiement::class);
    }
}
