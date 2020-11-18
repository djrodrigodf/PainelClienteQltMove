<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClienteRequest;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\ReferenciaBancarium;
use App\Models\ReferenciaPessoal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientes = Cliente::all();

        return view('admin.clientes.index', compact('clientes'));
    }

    public function create()
    {
        abort_if(Gate::denies('cliente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenia_pessoals = ReferenciaPessoal::all()->pluck('nome_completo', 'id');

        $referencia_bancarias = ReferenciaBancarium::all()->pluck('banco_codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientes.create', compact('referenia_pessoals', 'referencia_bancarias'));
    }

    public function store(StoreClienteRequest $request)
    {

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

        $cliente = Cliente::create($request->all());
        $cliente->referenia_pessoals()->sync($referenciaPessoal);

        return redirect()->route('admin.clientes.index');
    }

    public function edit(Cliente $cliente)
    {
        abort_if(Gate::denies('cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenia_pessoals = ReferenciaPessoal::all()->pluck('nome_completo', 'id');

        $referencia_bancarias = ReferenciaBancarium::all()->pluck('banco_codigo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cliente->load('referenia_pessoals', 'referencia_bancaria', 'created_by');

        return view('admin.clientes.edit', compact('referenia_pessoals', 'referencia_bancarias', 'cliente'));
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

        $cliente->load('referenia_pessoals', 'referencia_bancaria', 'created_by');

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
}
