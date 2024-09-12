<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IstitutBank extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Paiement() {
        return $this->hasOne(Paiement::class);
    }
}
