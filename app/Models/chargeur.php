<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chargeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomChargeur',
        'adresseChargeur',
        'telephoneChargeur',
        'mail'

    ];
}
