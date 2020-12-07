<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anexo;
use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Pagamento;
use App\Models\Plano;
use App\Models\PlanoRegra;
use App\Models\Proposta;
use App\Models\Venda;
use App\Models\VwVeiculosDisponiveis;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Proposta $proposta
     * @return \Illuminate\Http\Response
     */
    public function show(Proposta $proposta)
    {

        abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $proposta->load('criado_por', 'cliente', 'plano', 'status');
        $credito = Credito::where('cliente_id', $proposta->cliente_id)->first();
        $planoRegra = PlanoRegra::where('proposta_id', $proposta->id)->first();
        $vendas = Venda::where('proposta_id', $proposta->id)->get();
        $anexos = Anexo::where('proposta_id', $proposta->id)->get();

        $temProposta = false;

        foreach ($anexos as $a) {
            if ($a->tipo == "Proposta") {
                $temProposta = true;
            }
        }

        return view('admin.propostas.show', compact('proposta', 'credito', 'planoRegra', 'vendas', 'anexos', 'temProposta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Proposta $proposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposta $proposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Proposta $proposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposta $proposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Proposta $proposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposta $proposta)
    {
        //
    }

    public function aprovar(Request $request)
    {

        $proposta = Proposta::find($request->id);

        if ($request->valor_aprovado < $proposta->valor_plano  ) {

            return redirect()->back()->with('error', 'Valor de aprovado não pode ser menor que o valor solicitado');

        }

        $proposta->status_id = 3;
        $proposta->save();

        $credito = new Credito();

        $extension = $request->image->getClientOriginalExtension();
        $name = uniqid();
        $nameFile = "{$name}.{$extension}";
        $upload = $request->image->storeAs("public\\proposta\\$proposta->id", $nameFile);
        $credito->anexo = "proposta\\$proposta->id\\$nameFile";
        $credito->valor_aprovado = $request->valor_aprovado;
        $credito->cliente_id = $proposta->cliente_id;
        $credito->plano_id = $proposta->plano_id;
        $credito->save();

        return redirect()->route('admin.clientes.index');
    }

    public function reprovar(Request $request)
    {
        $proposta = Proposta::find($request->id);
        $proposta->status_id = 2;
        $proposta->save();

        $credito = new Credito();

        $extension = $request->image2->getClientOriginalExtension();
        $name = uniqid();
        $nameFile = "{$name}.{$extension}";
        $upload = $request->image2->storeAs("public\\proposta\\$proposta->id", $nameFile);
        $credito->anexo = "proposta\\$proposta->id\\$nameFile";
        $credito->valor_aprovado = $request->valor_aprovado2;
        $credito->cliente_id = $proposta->cliente_id;
        $credito->plano_id = $proposta->plano_id;
        $credito->save();

        return redirect()->route('admin.clientes.index');
    }

    public function ajustarplano($id)
    {
        $proposta = Proposta::find($id);
        $credito = Credito::where('cliente_id', $proposta->cliente_id)->first();
        $planos = Plano::where('ativo',1)->where('r_tres', '<=', $credito->valor_aprovado)->groupBy('veiculo')->get();

        return view('admin.propostas.ajustar_plano', compact('proposta', 'planos', 'id', 'credito'));
    }

    public function atualizarplano(Request $request)
    {

        $proposta = Proposta::find($request->id);

        $proposta->plano_id = (int) $request->plano;
        $proposta->valor_plano = $request->valor_plano;
        $proposta->versao = $request->versao;
        $proposta->save();

        $vendas = Venda::where('proposta_id', $proposta->id)->get();
        $anexos = Anexo::where('proposta_id', $proposta->id)->get();

        $temProposta = false;

        foreach ($anexos as $a) {
            if ($a->tipo == "Proposta") {
                $temProposta = true;
            }
        }

        $buscaPlanoRegra = PlanoRegra::where('proposta_id', $proposta->id)->first();

        $Plano = [
            'vigencia' => (int)$proposta->plano->periodo,
            'valor' => $proposta->valor_plano,
            'desconto' => 0,
            'diaria' => number_format((float)$proposta->valor_plano / 30, 2, '.', ''),
            'caucao' => 1000,
            'participacaoColisao' => 1700,
            'participacaoTerceiro' => 1700,
            'participacaoRoubo' => 3800,
            'kmExedente' => 0,
            'QtdKmFranquiaMensalPadrao' => (int)$proposta->plano->km,
            'proposta_id' => $proposta->id,
            'plano_id' => $proposta->plano->id,
        ];

        if (isset($buscaPlanoRegra)) {
            $buscaPlanoRegra->update($Plano);
        } else {
            PlanoRegra::create($Plano);
        }

        $id = $request->id;
        $credito = Credito::where('cliente_id', $proposta->cliente_id)->first();
        $planoRegra = PlanoRegra::where('proposta_id', $proposta->id)->first();

        return view('admin.propostas.show', compact('id', 'proposta', 'credito', 'planoRegra', 'temProposta', 'vendas', 'anexos'));
    }

    public function criarcontratosadeno(Request $request, $id)
    {
        $proposta = Proposta::find($id);
        $cliente = Cliente::find($proposta->cliente->id);

        $clienteSadeno = [
            "CEPCorrespondencia" => str_replace('-', '', $proposta->cliente->cep),
            "CodigoAcesso" => "a17aff74804c0077e53b51610b40521de2291cbb",
            "NomeCliente" => $proposta->cliente->nome_completo,
            "CpfCliente" => $proposta->cliente->cpf,
            "EmailCliente" => $proposta->cliente->email,
            "TelefoneCliente" => $proposta->cliente->tel_celular,
            "CelularCliente" => $proposta->cliente->tel_celular,
            "CodigoGestorComercial" => 2021,
            "CodigoGestorOperacional" => 2021,
            "LogradouroCorrespondencia" => $proposta->cliente->endereco,
            "NumeroCorrespondencia" => $proposta->cliente->complemento,
            "ComplementoCorrespondencia" => "",
            "CEPFaturamento" => $proposta->cliente->cep,
            "LogradouroFaturamento" => $proposta->cliente->endereco,
            "NumeroFaturamento" => $proposta->cliente->complemento,
            "ComplementoFaturamento" => $proposta->cliente->complemento,
            "NumeroCNH" => $proposta->cliente->cnh,
            "DataValidadeCNH" => $proposta->cliente->dt_validade_cnh,
            "NomeAnexoCNH" => "data:image/PNG;base64, FAKE",
            "ConteudoAnexoCNH" => "data:image/PNG;base64, FAKE",
            "Responsavel" => ""
        ];
        $sendClientSadeno = Http::withoutVerifying()->post('https://hmg.sadeno.qualityfrotas.com.br/index.php?r=integracao%2Fcadastrar-cliente', $clienteSadeno)->json();

        $cpf = str_replace(['.'], '', $proposta->cliente->cpf);
        $cpf = str_replace('-', '', $cpf);

        $Plano = [
            'vigencia' => (int)$proposta->plano->periodo,
            'valor' => $proposta->valor_plano,
            'desconto' => 0,
            'diaria' => number_format((float)$proposta->valor_plano / 30, 2, '.', ''),
            'caucao' => 1000,
            'participacaoColisao' => 1700,
            'participacaoTerceiro' => 1700,
            'participacaoRoubo' => 3800,
            'kmExedente' => 0,
            'QtdKmFranquiaMensalPadrao' => (int)$proposta->plano->km,
            'proposta_id' => $proposta->id,
            'plano_id' => $proposta->plano->id,
            'kmDiario' => 0,
        ];

        $SalvarPlanoRegra = PlanoRegra::create($Plano);

        $contratoSadeno = [
            "CodigoAcesso" => "a17aff74804c0077e53b51610b40521de2291cbb",
            "DataInicioVigencia" => Carbon::now()->format('d/m/Y'),
            "DataFimVigencia" => Carbon::now()->addMonths((int)$proposta->plano->periodo)->format('d/m/Y'),
            "CodigoCPFCliente" => $cpf,
            "CodigoModelo" => 1025,
            "CodigoFormaPagamento" => 1,
            "CodigoTipoMedicao" => 3,
            "CodigoTipoRetencao" => 1,
            "CodigoFilial" => 61,
            "CodigoContraBancaria" => 1,
            "DiaFaturamento" => 1,
            "DiaVencimento" => 1,
            "IDVeiculoSadeno" => null,
            "idAppdriver" => (string)$proposta->id,
            "DataPagamento" => Carbon::now()->format('d/m/Y'),
            "LocalDeRetirada" => "SAGA",
            "DataHoraRetirada" => Carbon::now(),
            "LocalDeDevolucao" => "SAGA",
            "DataHoraDevolucao" => Carbon::now()->addMonths((int)$proposta->plano->periodo),
            "ValoLocacao" => $proposta->valor_plano,
          "DataAssinatura"  => Carbon::now()->format('d/m/Y'),
          "Plano"  => $Plano
    ];
        $sendContratoSadeno = Http::withoutVerifying()->post('https://hmg.sadeno.qualityfrotas.com.br/index.php?r=integracao%2Fcadastrar-contrato-assinatura', $contratoSadeno)->json();


        if ($sendContratoSadeno['status'] == 5) {
            $proposta->status_id = 4;
            $proposta->contratoSadeno = $sendContratoSadeno['data']['CodigoContrato'];
            $proposta->save();

            $leadStation = [
                'customer' => [
                    'name' => $proposta->cliente->nome_completo,
                    'ssn' => $proposta->cliente->cpf,
                    'emails' => [
                        0 => $proposta->cliente->email,
                    ],
                    'phones' => [
                        0 => [
                            'country' => 'BR',
                            'type' => 'CELL_PHONE',
                            'number' => '55'.str_replace(['(', ')', '-', ' '], '', $proposta->cliente->tel_celular),
                        ],
                    ]
                ],
                'opportunity' => [
                    'title' => 'Proposta Assinada - ' . $proposta->plano->veiculo . ' - ' . $proposta->plano->marca . ' - ' . $proposta->plano->versao,
                    'price' => floatval($proposta->valor_plano * $proposta->plano->periodo),
                    'temperature' => 'HOT',
                    'fields' => [
                        10546 => 1,
                        10543 => $proposta->plano->periodo,
                        10541 => $proposta->plano->km,
                        10542 => 'Leve',
                        10544 => $proposta->plano->prazo,
                        9939 => floatval($proposta->valor_plano),
                        10582 => $sendContratoSadeno['mensagem'],
                        10583 => $proposta->plano->veiculo . ' - ' . $proposta->plano->marca . ' - ' . $proposta->plano->versao
                    ]
                ]
            ];

            $lead = Http::withoutVerifying()->withBasicAuth('sistemas@qualityfrotas.com.br', 'K)#n3guinha')->post('https://api.leadstation.com.br/api/v1/apikeys/oZjVlmgdJBOB772GYPnB/customers/opportunities', $leadStation);

            $idLead = $lead->json()['id'];

            $updateStatus = [
                'id' => $idLead,
                'phase' => [
                    "id" => 3303
                ]
            ];

            $leadProp = Http::withoutVerifying()->withBasicAuth('sistemas@qualityfrotas.com.br', 'K)#n3guinha')->patch('https://app.leadstation.com.br/api/v1/opportunities/' . $idLead, $updateStatus)->json();

            $criarVenda = new Venda();
            $criarVenda->proposta_id = $proposta->id;
            $criarVenda->valor = $proposta->valor_plano;
            $criarVenda->descricao = 'Pagamento Assinatura';
            $criarVenda->item = 'Assinatura';
            $criarVenda->dataVenda = Carbon::now();
            $criarVenda->dataFaturamento = Carbon::now();
            $criarVenda->ativo = 1;
            $criarVenda->save();

            $cobranca = [
                'ensure_workday_due_date' => true,
                'items' => [
                    0 => [
                        'description' => 'Pagamento Assinatura',
                        'quantity' => 1,
                        'price_cents' => str_replace('.', '', $proposta->valor_plano),
                    ],
                ],
                'payer' => [
                    'address' => [
                        'zip_code' => str_replace('-', '', $proposta->cliente->cep),
                        'street' => $proposta->cliente->endereco,
                        'city' => $proposta->cliente->cidade,
                        'state' => $proposta->cliente->estado,
                        'number' => $proposta->cliente->complemento,
                        'district' => $proposta->cliente->bairro,
                        'country' => 'brasil',
                    ],
                    'name' => $proposta->cliente->nome_completo,
                    'cpf_cnpj' => $cpf,
                    'email' => $proposta->cliente->email,
                ],
                'splits' => [
                    0 => [
                    ],
                ],
                'due_date' => Carbon::now()->format('Y-m-d'),
                'email' => $proposta->cliente->email,
                'payable_with' => 'all',
            ];

            $gerarCobranca = Http::post('https://api.iugu.com/v1/invoices?api_token=4403cd61ce8f5c55ea93497e4c6ca6a9', $cobranca)->json();

            $salvarCobranca = new Pagamento();
            $salvarCobranca->valor = $proposta->valor_plano;
            $salvarCobranca->valorPago = 0;
            $salvarCobranca->dataVencimento = Carbon::now();
            $salvarCobranca->dataEmissao = Carbon::now();
//            $salvarCobranca->dataPagamento = ;
            $salvarCobranca->ativo = 1;
            $salvarCobranca->tipo = "Pagamento Online";
            $salvarCobranca->taxas = 0;
            $salvarCobranca->multa = 0;
            $salvarCobranca->desconto = 0;
//            $salvarCobranca->dadosBoleto = ;
            $salvarCobranca->gateway = json_encode($gerarCobranca);
            $salvarCobranca->venda_id = $criarVenda->id;
            $salvarCobranca->save();

            return redirect()->route('admin.clientes.index');

        }

    }

    public function imprimirProposta(Request $request, $id) {

        $auth = base64_encode("jasperadmin:jasperadmin");
        $context = stream_context_create([
            "http" => [
                "header" => "Authorization: Basic $auth"
            ]
        ]);
        $filename = "Proposta-$id-" . Carbon::now()->format('dmyHi');
        $data = file_get_contents('http://10.2.5.86:8080/jasperserver/rest_v2/reports/reports/assinatura/Contrato.pdf?Contrato=' . $id, false, $context );

        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment;filename=$filename.pdf");

        return $data;

    }
}
