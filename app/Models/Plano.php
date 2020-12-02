<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Plano extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'planos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'marca',
        'ano',
        'veiculo',
        'km',
        'periodo',
        'r_zero',
        'r_um',
        'r_dois',
        'r_tres',
        'foto',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function meuPlano($id) {
        $plano = Plano::find($id);
        $retorno = '<b>' . $plano->marca . '</b> <br>' . ' ' . $plano->veiculo . '<br>' . $plano->km . 'Km<br>' . 'Período: ' . $plano->periodo . ' meses';
        return $retorno;
    }
}
