<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferenciaBancariumRequest;
use App\Http\Requests\UpdateReferenciaBancariumRequest;
use App\Http\Resources\Admin\ReferenciaBancariumResource;
use App\Models\ReferenciaBancarium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferenciaBancariaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('referencia_bancarium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferenciaBancariumResource(ReferenciaBancarium::all());
    }

    public function store(StoreReferenciaBancariumRequest $request)
    {
        $referenciaBancarium = ReferenciaBancarium::create($request->all());

        return (new ReferenciaBancariumResource($referenciaBancarium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReferenciaBancarium $referenciaBancarium)
    {
        abort_if(Gate::denies('referencia_bancarium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferenciaBancariumResource($referenciaBancarium);
    }

    public function update(UpdateReferenciaBancariumRequest $request, ReferenciaBancarium $referenciaBancarium)
    {
        $referenciaBancarium->update($request->all());

        return (new ReferenciaBancariumResource($referenciaBancarium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReferenciaBancarium $referenciaBancarium)
    {
        abort_if(Gate::denies('referencia_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaBancarium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
