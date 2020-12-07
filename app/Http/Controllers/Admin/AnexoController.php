<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anexo;
use App\Models\Proposta;
use Illuminate\Http\Request;

class AnexoController extends Controller
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

        $proposta = Proposta::find($request->id);

        $extension = $request->documento->getClientOriginalExtension();
        $name = uniqid();
        $nameFile = "{$name}.{$extension}";
        $upload = $request->documento->storeAs("public\\documentos\\$proposta->id", $nameFile);
        $request['proposta_id'] = $request->id;
        $request['anexo'] = $nameFile;
        Anexo::create($request->all());

        return redirect()->route('admin.propostas.show', $request->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function show(Anexo $anexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function edit(Anexo $anexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anexo $anexo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anexo  $anexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $deletar  = Anexo::find($id);
        $deletar->delete();
        return redirect()->back();
    }
}
