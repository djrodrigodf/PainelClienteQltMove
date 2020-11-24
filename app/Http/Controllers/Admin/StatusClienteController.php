<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStatusClienteRequest;
use App\Http\Requests\StoreStatusClienteRequest;
use App\Http\Requests\UpdateStatusClienteRequest;
use App\Models\StatusCliente;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusClienteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('status_cliente_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusClientes = StatusCliente::all();

        return view('admin.statusClientes.index', compact('statusClientes'));
    }

    public function create()
    {
        abort_if(Gate::denies('status_cliente_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusClientes.create');
    }

    public function store(StoreStatusClienteRequest $request)
    {
        $statusCliente = StatusCliente::create($request->all());

        return redirect()->route('admin.status-clientes.index');
    }

    public function edit(StatusCliente $statusCliente)
    {
        abort_if(Gate::denies('status_cliente_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusClientes.edit', compact('statusCliente'));
    }

    public function update(UpdateStatusClienteRequest $request, StatusCliente $statusCliente)
    {
        $statusCliente->update($request->all());

        return redirect()->route('admin.status-clientes.index');
    }

    public function show(StatusCliente $statusCliente)
    {
        abort_if(Gate::denies('status_cliente_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.statusClientes.show', compact('statusCliente'));
    }

    public function destroy(StatusCliente $statusCliente)
    {
        abort_if(Gate::denies('status_cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statusCliente->delete();

        return back();
    }

    public function massDestroy(MassDestroyStatusClienteRequest $request)
    {
        StatusCliente::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
