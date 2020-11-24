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
}
