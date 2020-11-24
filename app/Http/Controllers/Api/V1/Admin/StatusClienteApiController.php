<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatusClienteRequest;
use App\Http\Requests\UpdateStatusClienteRequest;
use App\Http\Resources\Admin\StatusClienteResource;
use App\Models\StatusCliente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusClienteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('status_cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusClienteResource(StatusCliente::all());
    }

    public function store(StoreStatusClienteRequest $request)
    {
        $statusCliente = StatusCliente::create($request->all());

        return (new StatusClienteResource($statusCliente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StatusCliente $statusCliente)
    {
        abort_if(Gate::denies('status_cliente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StatusClienteResource($statusCliente);
    }

    public function update(UpdateStatusClienteRequest $request, StatusCliente $statusCliente)
    {
        $statusCliente->update($request->all());

        return (new StatusClienteResource($statusCliente))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StatusCliente $statusCliente)
    {
        abort_if(Gate::denies('status_cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusCliente->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
