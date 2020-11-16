<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReferenciaPessoalRequest;
use App\Http\Requests\StoreReferenciaPessoalRequest;
use App\Http\Requests\UpdateReferenciaPessoalRequest;
use App\Models\ReferenciaPessoal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferenciaPessoalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('referencia_pessoal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaPessoals = ReferenciaPessoal::all();

        return view('admin.referenciaPessoals.index', compact('referenciaPessoals'));
    }

    public function create()
    {
        abort_if(Gate::denies('referencia_pessoal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.referenciaPessoals.create');
    }

    public function store(StoreReferenciaPessoalRequest $request)
    {
        $referenciaPessoal = ReferenciaPessoal::create($request->all());

        return redirect()->route('admin.referencia-pessoals.index');
    }

    public function edit(ReferenciaPessoal $referenciaPessoal)
    {
        abort_if(Gate::denies('referencia_pessoal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.referenciaPessoals.edit', compact('referenciaPessoal'));
    }

    public function update(UpdateReferenciaPessoalRequest $request, ReferenciaPessoal $referenciaPessoal)
    {
        $referenciaPessoal->update($request->all());

        return redirect()->route('admin.referencia-pessoals.index');
    }

    public function show(ReferenciaPessoal $referenciaPessoal)
    {
        abort_if(Gate::denies('referencia_pessoal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaPessoal->load('refereniaPessoalClientes');

        return view('admin.referenciaPessoals.show', compact('referenciaPessoal'));
    }

    public function destroy(ReferenciaPessoal $referenciaPessoal)
    {
        abort_if(Gate::denies('referencia_pessoal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaPessoal->delete();

        return back();
    }

    public function massDestroy(MassDestroyReferenciaPessoalRequest $request)
    {
        ReferenciaPessoal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
