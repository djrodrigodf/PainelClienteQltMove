@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cliente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.id') }}
                        </th>
                        <td>
                            {{ $cliente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_completo') }}
                        </th>
                        <td>
                            {{ $cliente->nome_completo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.cpf') }}
                        </th>
                        <td>
                            {{ $cliente->cpf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.rg') }}
                        </th>
                        <td>
                            {{ $cliente->rg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.dt_emissao_rg') }}
                        </th>
                        <td>
                            {{ $cliente->dt_emissao_rg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.dt_nasc') }}
                        </th>
                        <td>
                            {{ $cliente->dt_nasc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.cnh') }}
                        </th>
                        <td>
                            {{ $cliente->cnh }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.dt_validade_cnh') }}
                        </th>
                        <td>
                            {{ $cliente->dt_validade_cnh }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nacionalidade') }}
                        </th>
                        <td>
                            {{ $cliente->nacionalidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_do_pai') }}
                        </th>
                        <td>
                            {{ $cliente->nome_do_pai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_da_mae') }}
                        </th>
                        <td>
                            {{ $cliente->nome_da_mae }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.grau_de_inst') }}
                        </th>
                        <td>
                            {{ $cliente->grau_de_inst }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.def_fisico') }}
                        </th>
                        <td>
                            {{ App\Models\Cliente::DEF_FISICO_SELECT[$cliente->def_fisico] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.estado_civil') }}
                        </th>
                        <td>
                            {{ $cliente->estado_civil }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_do_conjuge') }}
                        </th>
                        <td>
                            {{ $cliente->nome_do_conjuge }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.endereco') }}
                        </th>
                        <td>
                            {{ $cliente->endereco }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.complemento') }}
                        </th>
                        <td>
                            {{ $cliente->complemento }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.bairro') }}
                        </th>
                        <td>
                            {{ $cliente->bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.cidade') }}
                        </th>
                        <td>
                            {{ $cliente->cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.estado') }}
                        </th>
                        <td>
                            {{ $cliente->estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.cep') }}
                        </th>
                        <td>
                            {{ $cliente->cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.tempo_de_residencia') }}
                        </th>
                        <td>
                            {{ $cliente->tempo_de_residencia }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.tel_resid') }}
                        </th>
                        <td>
                            {{ $cliente->tel_resid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.tel_celular') }}
                        </th>
                        <td>
                            {{ $cliente->tel_celular }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.email') }}
                        </th>
                        <td>
                            {{ $cliente->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_nome_da_empresa') }}
                        </th>
                        <td>
                            {{ $cliente->prof_nome_da_empresa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_endereco_comercial') }}
                        </th>
                        <td>
                            {{ $cliente->prof_endereco_comercial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cnpj') }}
                        </th>
                        <td>
                            {{ $cliente->prof_cnpj }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_bairro') }}
                        </th>
                        <td>
                            {{ $cliente->prof_bairro }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cidade') }}
                        </th>
                        <td>
                            {{ $cliente->prof_cidade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_estado') }}
                        </th>
                        <td>
                            {{ $cliente->prof_estado }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cep') }}
                        </th>
                        <td>
                            {{ $cliente->prof_cep }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_tel_comercial') }}
                        </th>
                        <td>
                            {{ $cliente->prof_tel_comercial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_sede_propria') }}
                        </th>
                        <td>
                            {{ App\Models\Cliente::PROF_SEDE_PROPRIA_SELECT[$cliente->prof_sede_propria] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_data_de_admissao') }}
                        </th>
                        <td>
                            {{ $cliente->prof_data_de_admissao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_porte_da_empresa') }}
                        </th>
                        <td>
                            {{ $cliente->prof_porte_da_empresa }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cargo_funcao') }}
                        </th>
                        <td>
                            {{ $cliente->prof_cargo_funcao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_ocupacao') }}
                        </th>
                        <td>
                            {{ $cliente->prof_ocupacao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_renda_bruta') }}
                        </th>
                        <td>
                            {{ $cliente->prof_renda_bruta }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_outras_rendas') }}
                        </th>
                        <td>
                            {{ $cliente->prof_outras_rendas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_forma_de_comprovacao') }}
                        </th>
                        <td>
                            {{ $cliente->prof_forma_de_comprovacao }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_patrimonio') }}
                        </th>
                        <td>
                            {{ $cliente->prof_patrimonio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.referenia_pessoal') }}
                        </th>
                        <td>
                            @foreach($cliente->referenia_pessoals as $key => $referenia_pessoal)
                                <span class="label label-info">{{ $referenia_pessoal->nome_completo }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cliente.fields.referencia_bancaria') }}
                        </th>
                        <td>
                            {{ $cliente->referencia_bancaria->banco_codigo ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection