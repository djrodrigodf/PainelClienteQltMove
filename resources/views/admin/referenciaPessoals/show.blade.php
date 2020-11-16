@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.referenciaPessoal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.referencia-pessoals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaPessoal.fields.id') }}
                        </th>
                        <td>
                            {{ $referenciaPessoal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaPessoal.fields.nome_completo') }}
                        </th>
                        <td>
                            {{ $referenciaPessoal->nome_completo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenciaPessoal.fields.telefone') }}
                        </th>
                        <td>
                            {{ $referenciaPessoal->telefone }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.referencia-pessoals.index') }}">
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
            <a class="nav-link" href="#referenia_pessoal_clientes" role="tab" data-toggle="tab">
                {{ trans('cruds.cliente.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="referenia_pessoal_clientes">
            @includeIf('admin.referenciaPessoals.relationships.refereniaPessoalClientes', ['clientes' => $referenciaPessoal->refereniaPessoalClientes])
        </div>
    </div>
</div>

@endsection