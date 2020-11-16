<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferenciaPessoalRequest;
use App\Http\Requests\UpdateReferenciaPessoalRequest;
use App\Http\Resources\Admin\ReferenciaPessoalResource;
use App\Models\ReferenciaPessoal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferenciaPessoalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('referencia_pessoal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferenciaPessoalResource(ReferenciaPessoal::all());
    }

    public function store(StoreReferenciaPessoalRequest $request)
    {
        $referenciaPessoal = ReferenciaPessoal::create($request->all());

        return (new ReferenciaPessoalResource($referenciaPessoal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReferenciaPessoal $referenciaPessoal)
    {
        abort_if(Gate::denies('referencia_pessoal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReferenciaPessoalResource($referenciaPessoal);
    }

    public function update(UpdateReferenciaPessoalRequest $request, ReferenciaPessoal $referenciaPessoal)
    {
        $referenciaPessoal->update($request->all());

        return (new ReferenciaPessoalResource($referenciaPessoal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReferenciaPessoal $referenciaPessoal)
    {
        abort_if(Gate::denies('referencia_pessoal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenciaPessoal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
