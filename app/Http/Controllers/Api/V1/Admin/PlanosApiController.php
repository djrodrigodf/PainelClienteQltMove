<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanoRequest;
use App\Http\Requests\UpdatePlanoRequest;
use App\Http\Resources\Admin\PlanoResource;
use App\Models\Plano;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanosApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plano_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlanoResource(Plano::all());
    }

    public function store(StorePlanoRequest $request)
    {
        $plano = Plano::create($request->all());

        return (new PlanoResource($plano))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Plano $plano)
    {
        abort_if(Gate::denies('plano_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlanoResource($plano);
    }

    public function update(UpdatePlanoRequest $request, Plano $plano)
    {
        $plano->update($request->all());

        return (new PlanoResource($plano))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Plano $plano)
    {
        abort_if(Gate::denies('plano_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plano->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function findPlano(Request $request) {

        if ($request->groupKm && $request->kmSelected && $request->valor_apv) {
            $planos = Plano::where('veiculo', $request->filterPlano)->where('km', $request->kmSelected)->where('r_tres', '<=', $request->valor_apv)->get();
            return $planos;
        }

        if ($request->groupKm && $request->valor_apv) {
            $planos = Plano::where('veiculo', $request->filterPlano)->where('r_tres', '<=', $request->valor_apv)->groupBy('km')->get();
            return $planos;
        }

        if ($request->groupKm && $request->kmSelected) {
            $planos = Plano::where('veiculo', $request->filterPlano)->where('km', $request->kmSelected)->get();
            return $planos;
        }

        if ($request->groupKm) {
            $planos = Plano::where('veiculo', $request->filterPlano)->groupBy('km')->get();
            return $planos;
        }

        $planos = Plano::where('veiculo', $request->filterPlano)->get();
        return $planos;

    }

    public function findIdPlano(Request $request) {
        $planos = Plano::find($request->idPlano);
        return $planos;
    }
}
