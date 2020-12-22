<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrtImplantacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $connection = "mysqlSadeno";

    protected $table = "sdn_frt_implantacao";

    protected $fillable = [
        'IDPrecificacao',
        'IDContrato',
        'IDTipo',
        'IDStatus',
        'IDFilial',
        'IDCliente',
        'IDContato',
        'CriadoEm',
        'CriadoPor',
        'AlteradoEm',
        'AlteradoPor',
        'IDCategoria',
    ];

}
