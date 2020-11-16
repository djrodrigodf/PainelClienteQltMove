<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReferenciaBancariumRequest;
use App\Http\Requests\StoreReferenciaBancariumRequest;
use App\Http\Requests\UpdateReferenciaBancariumRequest;
use App\Models\ReferenciaBancarium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferenciaBancariaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('referencia_bancarium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaBancaria = ReferenciaBancarium::all();

        return view('admin.referenciaBancaria.index', compact('referenciaBancaria'));
    }

    public function create()
    {
        abort_if(Gate::denies('referencia_bancarium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.referenciaBancaria.create');
    }

    public function store(StoreReferenciaBancariumRequest $request)
    {
        $referenciaBancarium = ReferenciaBancarium::create($request->all());

        return redirect()->route('admin.referencia-bancaria.index');
    }

    public function edit(ReferenciaBancarium $referenciaBancarium)
    {
        abort_if(Gate::denies('referencia_bancarium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.referenciaBancaria.edit', compact('referenciaBancarium'));
    }

    public function update(UpdateReferenciaBancariumRequest $request, ReferenciaBancarium $referenciaBancarium)
    {
        $referenciaBancarium->update($request->all());

        return redirect()->route('admin.referencia-bancaria.index');
    }

    public function show(ReferenciaBancarium $referenciaBancarium)
    {
        abort_if(Gate::denies('referencia_bancarium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaBancarium->load('referenciaBancariaClientes');

        return view('admin.referenciaBancaria.show', compact('referenciaBancarium'));
    }

    public function destroy(ReferenciaBancarium $referenciaBancarium)
    {
        abort_if(Gate::denies('referencia_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaBancarium->delete();

        return back();
    }

    public function massDestroy(MassDestroyReferenciaBancariumRequest $request)
    {
        ReferenciaBancarium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
