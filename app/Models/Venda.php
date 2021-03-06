<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposta_id',
        'valor',
        'descricao',
        'item',
        'dataVenda',
        'dataFaturamento',
        'ativo',
    ];

    public static function statusVenda($id, $valorVenda)
    {
        $pagts = Pagamento::where('venda_id', $id)->get();

        if (count($pagts) >= 1) {
            $valor = 0;
            foreach ($pagts as $p) {
                $valor += $p->valorPago;
            }
            if ($valor == 0) {
                return "<span class='badge badge-primary'>Aguardando Pagamento</span>";
            } elseif ($valor >= floatval($valorVenda)) {
                return "<span class='badge badge-success'>Pago</span>";
            } elseif ($valor < floatval($valorVenda) && $valor != 0) {
                return "<span class='badge badge-secondary'>Pagamento Parcial</span>";
            }
        } else {
            return "<span class='badge badge-warning'>Sem Cobrança</span>";
        }
    }

    public static function ValidarVenda($id, $valorVenda)
    {
        $pagts = Pagamento::where('venda_id', $id)->get();

        if (count($pagts) >= 1) {
            $valor = 0;
            foreach ($pagts as $p) {
                $valor += $p->valorPago;
            }
            if ($valor == 0) {
                return 1;
            } elseif ($valor >= floatval($valorVenda)) {
                return 0;
            } elseif ($valor < floatval($valorVenda) && $valor != 0) {
                return 1;
            }
        }
    }
}
