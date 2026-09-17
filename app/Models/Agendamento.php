<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = "agendamentos";

    public $incrementing = true;

    protected $fillable = [
        'moto_id',
        'servico_id',
        'data',
        'horario',
        'status'
    ];
}