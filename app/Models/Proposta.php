<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposta extends Model
{
    use HasFactory, Auditable, SoftDeletes;

    public $table = 'propostas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'valor_plano',
        'cliente_id',
        'plano_id',
        'status_id',
        'criado_por',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function criado_por()
    {
        return $this->belongsTo(User::class, 'criado_por');
    }
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

    public function plano()
    {
        return $this->hasOne(Plano::class, 'id', 'plano_id');
    }

    public function status()
    {
        return $this->hasOne(StatusCliente::class, 'id', 'status_id');
    }
}
