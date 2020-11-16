<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class ReferenciaBancarium extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'referencia_bancaria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'banco_codigo',
        'agencia_codigo',
        'conta',
        'tempo_de_conta',
        'cartao_de_credito',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function referenciaBancariaClientes()
    {
        return $this->hasMany(Cliente::class, 'referencia_bancaria_id', 'id');
    }
}
