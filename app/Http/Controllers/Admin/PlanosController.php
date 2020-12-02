<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPlanoRequest;
use App\Http\Requests\StorePlanoRequest;
use App\Http\Requests\UpdatePlanoRequest;
use App\Models\Plano;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanosController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('plano_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $planos = Plano::all();

        return view('admin.planos.index', compact('planos'));
    }

    public function create()
    {
        abort_if(Gate::denies('plano_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planos.create');
    }

    public function store(StorePlanoRequest $request)
    {
        $plano = Plano::create($request->all());

        $extension = $request->image->getClientOriginalExtension();
        $name = uniqid();
        $nameFile = "{$name}.{$extension}";
        $upload = $request->image->storeAs("public\\veiculos\\$plano->id", $nameFile);
        $plano->foto = "veiculos\\$plano->id\\$nameFile";
        $plano->save();


        return redirect()->route('admin.planos.index');
    }

    public function edit(Plano $plano)
    {
        abort_if(Gate::denies('plano_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planos.edit', compact('plano'));
    }

    public function update(UpdatePlanoRequest $request, Plano $plano)
    {
        $extension = $request->image->getClientOriginalExtension();
        $name = uniqid();
        $nameFile = "{$name}.{$extension}";
        $upload = $request->image->storeAs("public\\veiculos\\$plano->id", $nameFile);
        $request['foto'] = "veiculos\\$plano->id\\$nameFile";
        $plano->update($request->all());
        return redirect()->route('admin.planos.index');
    }

    public function show(Plano $plano)
    {
        abort_if(Gate::denies('plano_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.planos.show', compact('plano'));
    }

    public function destroy(Plano $plano)
    {
        abort_if(Gate::denies('plano_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plano->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlanoRequest $request)
    {
        Plano::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
