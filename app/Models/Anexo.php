<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;

    const TIPO = [
        'Proposta',
        'Contrato',
        'Vistoria de Entrega',
        'Locação',
        'Vistoria de Devolução',
        'Outro',
        'Multa',
    ];

    protected $fillable = [
      'proposta_id',
      'tipo',
      'descricao',
      'anexo',
    ];
}
