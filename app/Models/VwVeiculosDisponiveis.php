<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwVeiculosDisponiveis extends Model
{
    use HasFactory;

    protected $connection = "mysqlSadeno";
    protected $table = "Ass_Veiculos_Disponiveis";
    public $timestamps = false;


    public static function VeiculosDisponiveis($versao) {
       return VwVeiculosDisponiveis::where('CodigoVersao', $versao)->count();
}

}
