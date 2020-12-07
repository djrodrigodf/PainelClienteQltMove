<?php

namespace App\Console\Commands;

use App\Models\Pagamento;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class VerificaPagamento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Iugu:VerificaPagamento';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica Baixa de Pagamento';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $Pagamentos = Pagamento::all();

        foreach ($Pagamentos as $pag) {
            $dados = json_decode($pag->gateway);


            if ($pag->valorPago == 0.00 && isset($dados->id)) {

                $baixa = Http::get("https://api.iugu.com/v1/invoices/$dados->id?api_token=4403cd61ce8f5c55ea93497e4c6ca6a9")->json();
                $darBaixa = Pagamento::find($pag->id);
                $darBaixa->valorPago = (int)$baixa['total_paid_cents'] / 100;
                $darBaixa->taxas = (int)$baixa['taxes_paid_cents'] / 100;
                if ($baixa['paid_at']) $darBaixa->dataPagamento = Carbon::parse($baixa['paid_at'])->format('Y-m-d H:i:s');
                $darBaixa->multa = (int)$baixa['fines_on_occurrence_day_cents'] / 100;
                $darBaixa->dadosBoleto = $baixa['payment_method'];
                $darBaixa->save();
                echo $baixa['id'] . " Baixada \n";
            }

        }

    }
}
