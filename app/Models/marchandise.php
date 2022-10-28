<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marchandise extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_id',
        'chargeur_id',
        'voyage_id',
        'cond1',
        'qty1',
        'poids1',
        'valeur1',
        'cubage1',
        'monnaie1',
        'reduction1',
        'avisClient',
        'plainteClient',
        'reponseLmc'
    ];

}
