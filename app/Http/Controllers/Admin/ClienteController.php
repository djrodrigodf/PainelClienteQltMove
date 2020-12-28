<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Anexo;
use App\Models\Cliente;
use App\Models\Plano;
use App\Models\PlanoRegra;
use App\Models\Proposta;
use App\Models\ReferenciaBancarium;
use App\Models\ReferenciaPessoal;
use App\Models\StatusCliente;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role = false;

        foreach (Auth::user()->roles as $r) {
            if ($r->id == 1 || $r->id == 2 || $r->id == 3) {
                $role = true;
            }
        }

        if ($role) {
            $propostas = Proposta::with(['criado_por', 'cliente', 'plano'])->get();

            $status = StatusCliente::get();
            $clientes = Cliente::all();
            $select = null;
            if ($request->filtro_status) {
                $status = StatusCliente::get();
                $propostas = Proposta::with(['criado_por', 'cliente', 'plano'])->where('status_id', $request->filtro_status)->get();
                $clientes = Cliente::where('status_id', $request->filtro_status)->get();
                $select = $request->filtro_status;

                return view('admin.clientes.index', compact('clientes', 'status', 'select', 'propostas'));
            }

            return view('admin.clientes.index', compact('clientes', 'status', 'select', 'propostas'));
        } else {
            $propostas = Proposta::with(['criado_por', 'cliente', 'plano'])->where('criado_por', Auth::user()->id)->get();

            $status = StatusCliente::get();
            $clientes = Cliente::all();
            $select = null;
            if ($request->filtro_status) {
                $status = StatusCliente::get();
                $propostas = Proposta::with(['criado_por', 'cliente', 'plano'])->where('status_id', $request->filtro_status)->get();
                $clientes = Cliente::where('status_id', $request->filtro_status)->get();
                $select = $request->filtro_status;

                return view('admin.clientes.index', compact('clientes', 'status', 'select', 'propostas'));
            }

            return view('admin.clientes.index', compact('clientes', 'status', 'select', 'propostas'));
        }
    }

    public function create()
    {
        abort_if(Gate::denies('cliente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenia_pessoals = ReferenciaPessoal::all()->pluck('nome_completo', 'id');

        $referencia_bancarias = ReferenciaBancarium::all()->pluck('banco_codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $planos = Plano::where('ativo', 1)->groupBy('veiculo')->get();

        $statuses = StatusCliente::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientes.create', compact('referenia_pessoals', 'referencia_bancarias', 'statuses', 'planos'));
    }

    public function store(StoreClienteRequest $request)
    {
        $request['dt_emissao_rg'] = Carbon::parse($request['dt_emissao_rg'])->format('d/m/Y');
        $request['dt_nasc'] = Carbon::parse($request['dt_nasc'])->format('d/m/Y');
        $request['dt_validade_cnh'] = Carbon::parse($request['dt_validade_cnh'])->format('d/m/Y');
        $request['prof_data_de_admissao'] = Carbon::parse($request['prof_data_de_admissao'])->format('d/m/Y');
        $dBancarios = [
            'banco_codigo' => $request->ref_banco_codigo,
            'agencia_codigo' => $request->ref_agencia,
            'conta' => $request->ref_conta,
            'tempo_de_conta' => $request->ref_tempo_conta,
            'cartao_de_credito' => $request->ref_cartao_credito,
        ];

        $banco = ReferenciaBancarium::create($dBancarios);

        $request['referencia_bancaria_id'] = $banco->id;

        $itens = count($request->ref_nome) - 1;

        $referenciaPessoal = [];
        for ($i = 0; $i <= $itens; $i++) {
            $RefPessoal = [
                'nome_completo' => $request->ref_nome[$i],
                'telefone' => $request->ref_telefone[$i],
            ];
            $referenciaP = ReferenciaPessoal::create($RefPessoal);
            array_push($referenciaPessoal, $referenciaP->id);
        }

        $request['status_id'] = 1;
        $cliente = Cliente::create($request->all());
        $cliente->referenia_pessoals()->sync($referenciaPessoal);

        if ($cliente->id) {
            $proposta = new Proposta();
            $proposta->valor_plano = $request->valor_plano;
            $proposta->cliente_id = $cliente->id;
            $proposta->plano_id = (int)$cliente->plano;
            $proposta->status_id = 1;
            $proposta->criado_por = auth()->id();
            $proposta->save();

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
            PlanoRegra::create($Plano);

            $extension = $request->CNHAnexo->getClientOriginalExtension();
            $name = uniqid();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->CNHAnexo->storeAs("public\\documentos\\$proposta->id", $nameFile);
            $request['proposta_id'] = $proposta->id;
            $request['anexo'] = $nameFile;

            $anexos = [
                'proposta_id' => $proposta->id,
                'tipo' => 'CNH',
                'descricao' => '--',
                'anexo' => $nameFile,
            ];
            Anexo::create($anexos);

            $extension = $request->AnaliseF->getClientOriginalExtension();
            $name = uniqid();
            $nameFile = "{$name}.{$extension}";
            $upload = $request->AnaliseF->storeAs("public\\documentos\\$proposta->id", $nameFile);
            $request['proposta_id'] = $proposta->id;
            $request['anexo'] = $nameFile;

            $anexos = [
                'proposta_id' => $proposta->id,
                'tipo' => 'Analise Financeira',
                'descricao' => '--',
                'anexo' => $nameFile,
            ];
            Anexo::create($anexos);

            return redirect()->route('admin.clientes.index');
        }


    }

    public function edit(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenia_pessoals = ReferenciaPessoal::all()->pluck('nome_completo', 'id');

        $referencia_bancarias = ReferenciaBancarium::all()->pluck('banco_codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StatusCliente::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cliente->load('referenia_pessoals', 'referencia_bancaria', 'status', 'created_by');

        return view('admin.clientes.edit', compact('referenia_pessoals', 'referencia_bancarias', 'statuses', 'cliente'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        $cliente->referenia_pessoals()->sync($request->input('referenia_pessoals', []));

        return redirect()->route('admin.clientes.index');
    }

    public function show(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->load('referenia_pessoals', 'referencia_bancaria', 'status', 'created_by');

        return view('admin.clientes.show', compact('cliente'));
    }

    public function destroy(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cliente->delete();

        return back();
    }

    public function massDestroy(MassDestroyClienteRequest $request)
    {
        Cliente::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function aprovar($id) {
       $cliente = Cliente::find($id);
       $cliente->status_id = 3;
       $cliente->save();

       return redirect()->route('admin.clientes.index');
    }
    public function reprovar($id) {
        $cliente = Cliente::find($id);
        $cliente->status_id = 2;
        $cliente->save();

        return redirect()->route('admin.clientes.index');
    }
}
