<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residuos extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'nome',
        'tipo',
        'categoria',
        'tratamento',
        'classe',
        'unidade',
        'peso'
    ];
}
