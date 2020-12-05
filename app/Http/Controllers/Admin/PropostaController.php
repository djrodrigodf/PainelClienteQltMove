<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Credito;
use App\Models\Plano;
use App\Models\Proposta;
use App\Models\VwVeiculosDisponiveis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $proposta->load('criado_por', 'cliente', 'plano', 'status');
        $credito = Credito::where('cliente_id', $proposta->cliente_id)->first();

        return view('admin.propostas.show', compact('proposta', 'credito'));
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
        $planos = Plano::where('ativo',1)->groupBy('veiculo')->get();

        return view('admin.propostas.ajustar_plano', compact('proposta', 'planos', 'id'));
    }

    public function atualizarplano(Request $request)
    {

        $proposta = Proposta::find($request->id);
        $proposta->plano_id = (int) $request->plano;
        $proposta->valor_plano = $request->valor_plano;
        $proposta->versao = $request->versao;
        $proposta->save();
        $id = $request->id;
        $credito = Credito::where('cliente_id', $proposta->cliente_id)->first();

        return view('admin.propostas.show', compact('id', 'proposta', 'credito'));
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
        $sendClientSadeno = Http::post('https://hmg.sadeno.qualityfrotas.com.br/index.php?r=integracao%2Fcadastrar-cliente', $clienteSadeno)->json();

        $cpf = str_replace(['.'], '', $proposta->cliente->cpf);
        $cpf = str_replace('-', '', $cpf);

        $contratoSadeno = [
            "CodigoAcesso" => "a17aff74804c0077e53b51610b40521de2291cbb",
            "DataInicioVigencia" => Carbon::now()->format('d/m/Y'),
            "DataFimVigencia" => Carbon::now()->addMonths((int)$proposta->plano->periodo)->format('d/m/Y'),
            "CodigoCPFCliente" => $cpf,
            "CodigoModelo" => 1024,
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
          "Plano"  => $proposta->plano_id
    ];

        $sendContratoSadeno = Http::post('https://hmg.sadeno.qualityfrotas.com.br/index.php?r=integracao%2Fcadastrar-contrato-assinatura', $contratoSadeno)->json();

        if ($sendContratoSadeno['status'] == 5) {
            $proposta->status_id = 4;
            $proposta->contratoSadeno = $sendContratoSadeno['data']['CodigoContrato'];
            $proposta->save();
            return redirect()->route('admin.clientes.index');

        }

    }
}
