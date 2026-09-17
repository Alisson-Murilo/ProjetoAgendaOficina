<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servicos";

    public $incrementing = true;

    protected $fillable = [
        'nome',
        'preco'
    ];
}