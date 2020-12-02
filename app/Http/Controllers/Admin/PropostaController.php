<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Credito;
use App\Models\Proposta;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposta  $proposta
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
     * @param  \App\Models\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposta $proposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposta $proposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposta  $proposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposta $proposta)
    {
        //
    }

    public function aprovar(Request $request) {

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

    public function reprovar(Request $request) {
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
}
