@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.referenciaBancarium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.referencia-bancaria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.id') }}
                        </th>
                        <td>
                            {{ $referenciaBancarium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.banco_codigo') }}
                        </th>
                        <td>
                            {{ $referenciaBancarium->banco_codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.agencia_codigo') }}
                        </th>
                        <td>
                            {{ $referenciaBancarium->agencia_codigo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.conta') }}
                        </th>
                        <td>
                            {{ $referenciaBancarium->conta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.tempo_de_conta') }}
                        </th>
                        <td>
                            {{ $referenciaBancarium->tempo_de_conta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.cartao_de_credito') }}
                        </th>
                        <td>
                            {{ $referenciaBancarium->cartao_de_credito }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.referencia-bancaria.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#referencia_bancaria_clientes" role="tab" data-toggle="tab">
                {{ trans('cruds.cliente.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="referencia_bancaria_clientes">
            @includeIf('admin.referenciaBancaria.relationships.referenciaBancariaClientes', ['clientes' => $referenciaBancarium->referenciaBancariaClientes])
        </div>
    </div>
</div>

@endsection