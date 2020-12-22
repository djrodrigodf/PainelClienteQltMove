<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FrtPrecificacao extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $connection = "mysqlSadeno";

    protected $table = "sdn_frt_precificacao";

    protected $fillable = [
        'Codigo',
        'IDStatus',
        'IDTipo',
        'IDFilial',
        'IDModelo',
        'ValidadeProposta',
        'IDStatusProposta',
        'IDCliente',
        'LocalEntrega',
        'IDContato',
        'ValorEntrada',
        'IDFornecedor',
        'Descricao',
        'IDPrazoFinanciamento',
        'IDPrazoConsorcio',
        'IDPrazoLocacao',
        'IDVencimentoFinanciamento',
        'IDVencimentoLocacao',
        'QuilometragemMediaMensal',
        'PercentualRemuneracaoCapital',
        'IDSinistroNivel',
        'PercentualComissao',
        'PercentualDespesaMensal',
        'PercentualImposto',
        'PercentualEntradaCdc',
        'PercentualEntradaConsorcio',
        'PercentualTaxaJuros',
        'PercentualTaxaAdministrativa',
        'Observacao',
        'IDMotivoCancelamento',
        'ObservacaoCancelamento',
        'CriadoEm',
        'CriadoPor',
        'AlteradoEm',
        'AlteradoPor',
    ];

    public static function GenerateCodigo() {
        $db = DB::connection('mysqlSadeno')->table('sdn_frt_precificacao')->selectRaw('
        IFNULL((
					CONCAT(LPAD((MAX(ID)-IFNULL((
						SELECT MAX(ID)
						FROM sdn_frt_precificacao
						WHERE YEAR(CriadoEm) = (YEAR(NOW())-1)
					),0) + 1),6,0),\'/\',YEAR(NOW()))
				),CONCAT(LPAD(1,6,0),\'/\',YEAR(NOW()))) as ID
			')->first();
        return $db->ID;
    }

    public static function CriarPrecificacao($IDCliente, $Contrato=null) {
        $nova = new FrtPrecificacao();
        $nova->Codigo = self::GenerateCodigo();
        $nova->IDStatus = 1;
        $nova->IDTipo = 2;
        $nova->IDFilial = 1;
        $nova->IDModelo = 1024;
        $nova->ValidadeProposta = Carbon::now()->addMonth();
        $nova->IDStatusProposta = 1;
        $nova->IDCliente = $IDCliente;
        //$nova->LocalEntrega = ;
        //$nova->IDContato = ;
        $nova->ValorEntrada = 0;
        //$nova->IDFornecedor = ;
        $nova->Descricao = "Implantação assinatura de veiculo para o Contrato $Contrato";
        $nova->IDPrazoFinanciamento = 1;
        $nova->IDPrazoConsorcio = 1;
        $nova->IDPrazoLocacao = 1;
        $nova->IDVencimentoFinanciamento = 1;
        $nova->IDVencimentoLocacao = 1;
        $nova->QuilometragemMediaMensal = 1;
        $nova->PercentualRemuneracaoCapital = 1;
        $nova->IDSinistroNivel = 1;
        $nova->PercentualComissao = 0;
        $nova->PercentualDespesaMensal = 0;
        $nova->PercentualImposto = 0;
        $nova->PercentualEntradaCdc = 0;
        $nova->PercentualEntradaConsorcio = 0;
        $nova->PercentualTaxaJuros = 0;
        $nova->PercentualTaxaAdministrativa = 0;
        $nova->Observacao = "Criando teste";
        //$nova->IDMotivoCancelamento = ;
        //$nova->ObservacaoCancelamento = ;
        $nova->CriadoEm = Carbon::now();
        $nova->CriadoPor = 1;
        $nova->AlteradoEm = Carbon::now();
        $nova->AlteradoPor = 1;
        $nova->save();

        return $nova;
    }
}
