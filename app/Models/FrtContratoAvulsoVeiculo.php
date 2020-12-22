<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrtContratoAvulsoVeiculo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $connection = "mysqlSadeno";

    protected $table = "sdn_frt_contrato_avulso_veiculo";

    protected $fillable = [
        'IDContratoAvulso',
        'IDVeiculo',
        'ValorLocacao',
        'ValorLocacao',
        'CriadoEm',
        'CriadoPor',
        'AlteradoEm',
        'AlteradoPor',
    ];
}
