<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone'
    ];
}