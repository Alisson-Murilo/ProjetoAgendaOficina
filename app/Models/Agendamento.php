<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = "agendamentos";

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'moto_id',
        'servico_id',
        'data',
        'horario',
        'status'
    ];

    protected $casts = [
        'data' => 'date',
    ];

    public const STATUS = [
        'agendado'       => 'Agendado',
        'confirmado'     => 'Confirmado',
        'em_andamento'   => 'Em andamento',
        'concluido'      => 'Concluído',
        'cancelado'      => 'Cancelado',
        'nao_compareceu' => 'Não compareceu',
    ];

    public const CORES = [
        'agendado'       => 'primary',
        'confirmado'     => 'info',
        'em_andamento'   => 'warning',
        'concluido'      => 'success',
        'cancelado'      => 'danger',
        'nao_compareceu' => 'secondary',
    ];

    public function moto()
    {
        return $this->belongsTo(Moto::class, 'moto_id');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS[$this->status] ?? $this->status;
    }

    public function getStatusCorAttribute(): string
    {
        return self::CORES[$this->status] ?? 'secondary';
    }
}
