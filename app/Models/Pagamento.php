<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Pagamento extends Model
{
    use HasFactory;

    public static function DadosIugu($id)
    {
        $dados = Http::get("https://api.iugu.com/v1/invoices/$id?api_token=4403cd61ce8f5c55ea93497e4c6ca6a9")->json();
        return $dados;
    }
}
