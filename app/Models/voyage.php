<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voyage extends Model
{
    use HasFactory;

    protected $fillable = [
        'numVoy',
        'annee',
        'nomNavire',
    ];

}
