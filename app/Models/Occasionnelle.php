<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occasionnelle extends Model
{
    use HasFactory;

    protected $guarded = [

    ];

    function Contrat() {
        return $this->belongsTo(Contrat::class, 'contrats_id');
    }
}
