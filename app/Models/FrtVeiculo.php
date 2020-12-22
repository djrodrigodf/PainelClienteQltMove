<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrtVeiculo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $connection = "mysqlSadeno";

    protected $table = "sdn_frt_veiculo";

    protected $fillable = [
        'IDStatusOperacional'
    ];
}
