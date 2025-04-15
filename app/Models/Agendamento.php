<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data',
        'hora',
        'especie',
        'id_services',
        'pet_id',
    ];


    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }


    public function service()
    {
        return $this->belongsTo(Servico::class, 'id_services');
    }
}
