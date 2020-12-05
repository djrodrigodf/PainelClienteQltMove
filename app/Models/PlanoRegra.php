<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoRegra extends Model
{
    use HasFactory;

    protected $fillable = [
        'vigencia',
        'valor',
        'desconto',
        'diaria',
        'caucao',
        'participacaoColisao',
        'participacaoTerceiro',
        'participacaoRoubo',
        'kmExedente',
        'QtdKmFranquiaMensalPadrao',
        'proposta_id',
        'plano_id',
    ];
}
