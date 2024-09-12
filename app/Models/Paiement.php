<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Contrat() {
        return $this->belongsTo(Contrat::class, 'contrats_id');
    }

    function Banque() {
        return $this->belongsTo(IstitutBank::class, 'istitut_banks_id');
    }
}
