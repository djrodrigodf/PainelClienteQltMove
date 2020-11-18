@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cliente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clientes.update", [$cliente->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nome_completo">{{ trans('cruds.cliente.fields.nome_completo') }}</label>
                <input class="form-control {{ $errors->has('nome_completo') ? 'is-invalid' : '' }}" type="text" name="nome_completo" id="nome_completo" value="{{ old('nome_completo', $cliente->nome_completo) }}">
                @if($errors->has('nome_completo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_completo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nome_completo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cpf">{{ trans('cruds.cliente.fields.cpf') }}</label>
                <input class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" type="text" name="cpf" id="cpf" value="{{ old('cpf', $cliente->cpf) }}">
                @if($errors->has('cpf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cpf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.cpf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rg">{{ trans('cruds.cliente.fields.rg') }}</label>
                <input class="form-control {{ $errors->has('rg') ? 'is-invalid' : '' }}" type="text" name="rg" id="rg" value="{{ old('rg', $cliente->rg) }}">
                @if($errors->has('rg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.rg_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dt_emissao_rg">{{ trans('cruds.cliente.fields.dt_emissao_rg') }}</label>
                <input class="form-control date {{ $errors->has('dt_emissao_rg') ? 'is-invalid' : '' }}" type="text" name="dt_emissao_rg" id="dt_emissao_rg" value="{{ old('dt_emissao_rg', $cliente->dt_emissao_rg) }}">
                @if($errors->has('dt_emissao_rg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dt_emissao_rg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.dt_emissao_rg_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dt_nasc">{{ trans('cruds.cliente.fields.dt_nasc') }}</label>
                <input class="form-control date {{ $errors->has('dt_nasc') ? 'is-invalid' : '' }}" type="text" name="dt_nasc" id="dt_nasc" value="{{ old('dt_nasc', $cliente->dt_nasc) }}">
                @if($errors->has('dt_nasc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dt_nasc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.dt_nasc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cnh">{{ trans('cruds.cliente.fields.cnh') }}</label>
                <input class="form-control {{ $errors->has('cnh') ? 'is-invalid' : '' }}" type="text" name="cnh" id="cnh" value="{{ old('cnh', $cliente->cnh) }}">
                @if($errors->has('cnh'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cnh') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.cnh_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dt_validade_cnh">{{ trans('cruds.cliente.fields.dt_validade_cnh') }}</label>
                <input class="form-control date {{ $errors->has('dt_validade_cnh') ? 'is-invalid' : '' }}" type="text" name="dt_validade_cnh" id="dt_validade_cnh" value="{{ old('dt_validade_cnh', $cliente->dt_validade_cnh) }}">
                @if($errors->has('dt_validade_cnh'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dt_validade_cnh') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.dt_validade_cnh_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nacionalidade">{{ trans('cruds.cliente.fields.nacionalidade') }}</label>
                <input class="form-control {{ $errors->has('nacionalidade') ? 'is-invalid' : '' }}" type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade', $cliente->nacionalidade) }}">
                @if($errors->has('nacionalidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nacionalidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nacionalidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_do_pai">{{ trans('cruds.cliente.fields.nome_do_pai') }}</label>
                <input class="form-control {{ $errors->has('nome_do_pai') ? 'is-invalid' : '' }}" type="text" name="nome_do_pai" id="nome_do_pai" value="{{ old('nome_do_pai', $cliente->nome_do_pai) }}">
                @if($errors->has('nome_do_pai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_do_pai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nome_do_pai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_da_mae">{{ trans('cruds.cliente.fields.nome_da_mae') }}</label>
                <input class="form-control {{ $errors->has('nome_da_mae') ? 'is-invalid' : '' }}" type="text" name="nome_da_mae" id="nome_da_mae" value="{{ old('nome_da_mae', $cliente->nome_da_mae) }}">
                @if($errors->has('nome_da_mae'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_da_mae') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nome_da_mae_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="grau_de_inst">{{ trans('cruds.cliente.fields.grau_de_inst') }}</label>
                <input class="form-control {{ $errors->has('grau_de_inst') ? 'is-invalid' : '' }}" type="text" name="grau_de_inst" id="grau_de_inst" value="{{ old('grau_de_inst', $cliente->grau_de_inst) }}">
                @if($errors->has('grau_de_inst'))
                    <div class="invalid-feedback">
                        {{ $errors->first('grau_de_inst') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.grau_de_inst_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.cliente.fields.def_fisico') }}</label>
                <select class="form-control {{ $errors->has('def_fisico') ? 'is-invalid' : '' }}" name="def_fisico" id="def_fisico">
                    <option value disabled {{ old('def_fisico', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Cliente::DEF_FISICO_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('def_fisico', $cliente->def_fisico) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('def_fisico'))
                    <div class="invalid-feedback">
                        {{ $errors->first('def_fisico') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.def_fisico_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado_civil">{{ trans('cruds.cliente.fields.estado_civil') }}</label>
                <input class="form-control {{ $errors->has('estado_civil') ? 'is-invalid' : '' }}" type="text" name="estado_civil" id="estado_civil" value="{{ old('estado_civil', $cliente->estado_civil) }}">
                @if($errors->has('estado_civil'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado_civil') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.estado_civil_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nome_do_conjuge">{{ trans('cruds.cliente.fields.nome_do_conjuge') }}</label>
                <input class="form-control {{ $errors->has('nome_do_conjuge') ? 'is-invalid' : '' }}" type="text" name="nome_do_conjuge" id="nome_do_conjuge" value="{{ old('nome_do_conjuge', $cliente->nome_do_conjuge) }}">
                @if($errors->has('nome_do_conjuge'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_do_conjuge') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.nome_do_conjuge_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="endereco">{{ trans('cruds.cliente.fields.endereco') }}</label>
                <input class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" type="text" name="endereco" id="endereco" value="{{ old('endereco', $cliente->endereco) }}">
                @if($errors->has('endereco'))
                    <div class="invalid-feedback">
                        {{ $errors->first('endereco') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.endereco_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="complemento">{{ trans('cruds.cliente.fields.complemento') }}</label>
                <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', $cliente->complemento) }}">
                @if($errors->has('complemento'))
                    <div class="invalid-feedback">
                        {{ $errors->first('complemento') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.complemento_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bairro">{{ trans('cruds.cliente.fields.bairro') }}</label>
                <input class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', $cliente->bairro) }}">
                @if($errors->has('bairro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bairro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cidade">{{ trans('cruds.cliente.fields.cidade') }}</label>
                <input class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', $cliente->cidade) }}">
                @if($errors->has('cidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado">{{ trans('cruds.cliente.fields.estado') }}</label>
                <input class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="estado" value="{{ old('estado', $cliente->estado) }}">
                @if($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cep">{{ trans('cruds.cliente.fields.cep') }}</label>
                <input class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" type="text" name="cep" id="cep" value="{{ old('cep', $cliente->cep) }}">
                @if($errors->has('cep'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cep') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.cep_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tempo_de_residencia">{{ trans('cruds.cliente.fields.tempo_de_residencia') }}</label>
                <input class="form-control {{ $errors->has('tempo_de_residencia') ? 'is-invalid' : '' }}" type="text" name="tempo_de_residencia" id="tempo_de_residencia" value="{{ old('tempo_de_residencia', $cliente->tempo_de_residencia) }}">
                @if($errors->has('tempo_de_residencia'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tempo_de_residencia') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.tempo_de_residencia_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tel_resid">{{ trans('cruds.cliente.fields.tel_resid') }}</label>
                <input class="form-control {{ $errors->has('tel_resid') ? 'is-invalid' : '' }}" type="text" name="tel_resid" id="tel_resid" value="{{ old('tel_resid', $cliente->tel_resid) }}">
                @if($errors->has('tel_resid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_resid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.tel_resid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tel_celular">{{ trans('cruds.cliente.fields.tel_celular') }}</label>
                <input class="form-control {{ $errors->has('tel_celular') ? 'is-invalid' : '' }}" type="text" name="tel_celular" id="tel_celular" value="{{ old('tel_celular', $cliente->tel_celular) }}">
                @if($errors->has('tel_celular'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_celular') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.tel_celular_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.cliente.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $cliente->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="plano">{{ trans('cruds.cliente.fields.plano') }}</label>
                <input class="form-control {{ $errors->has('plano') ? 'is-invalid' : '' }}" type="text" name="plano" id="plano" value="{{ old('plano', $cliente->plano) }}">
                @if($errors->has('plano'))
                    <div class="invalid-feedback">
                        {{ $errors->first('plano') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.plano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valor_plano">{{ trans('cruds.cliente.fields.valor_plano') }}</label>
                <input class="form-control {{ $errors->has('valor_plano') ? 'is-invalid' : '' }}" type="text" name="valor_plano" id="valor_plano" value="{{ old('valor_plano', $cliente->valor_plano) }}">
                @if($errors->has('valor_plano'))
                    <div class="invalid-feedback">
                        {{ $errors->first('valor_plano') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.valor_plano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_nome_da_empresa">{{ trans('cruds.cliente.fields.prof_nome_da_empresa') }}</label>
                <input class="form-control {{ $errors->has('prof_nome_da_empresa') ? 'is-invalid' : '' }}" type="text" name="prof_nome_da_empresa" id="prof_nome_da_empresa" value="{{ old('prof_nome_da_empresa', $cliente->prof_nome_da_empresa) }}">
                @if($errors->has('prof_nome_da_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_nome_da_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_nome_da_empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_endereco_comercial">{{ trans('cruds.cliente.fields.prof_endereco_comercial') }}</label>
                <input class="form-control {{ $errors->has('prof_endereco_comercial') ? 'is-invalid' : '' }}" type="text" name="prof_endereco_comercial" id="prof_endereco_comercial" value="{{ old('prof_endereco_comercial', $cliente->prof_endereco_comercial) }}">
                @if($errors->has('prof_endereco_comercial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_endereco_comercial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_endereco_comercial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_cnpj">{{ trans('cruds.cliente.fields.prof_cnpj') }}</label>
                <input class="form-control {{ $errors->has('prof_cnpj') ? 'is-invalid' : '' }}" type="text" name="prof_cnpj" id="prof_cnpj" value="{{ old('prof_cnpj', $cliente->prof_cnpj) }}">
                @if($errors->has('prof_cnpj'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_cnpj') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_cnpj_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_bairro">{{ trans('cruds.cliente.fields.prof_bairro') }}</label>
                <input class="form-control {{ $errors->has('prof_bairro') ? 'is-invalid' : '' }}" type="text" name="prof_bairro" id="prof_bairro" value="{{ old('prof_bairro', $cliente->prof_bairro) }}">
                @if($errors->has('prof_bairro'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_bairro') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_bairro_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_cidade">{{ trans('cruds.cliente.fields.prof_cidade') }}</label>
                <input class="form-control {{ $errors->has('prof_cidade') ? 'is-invalid' : '' }}" type="text" name="prof_cidade" id="prof_cidade" value="{{ old('prof_cidade', $cliente->prof_cidade) }}">
                @if($errors->has('prof_cidade'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_cidade') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_cidade_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_estado">{{ trans('cruds.cliente.fields.prof_estado') }}</label>
                <input class="form-control {{ $errors->has('prof_estado') ? 'is-invalid' : '' }}" type="text" name="prof_estado" id="prof_estado" value="{{ old('prof_estado', $cliente->prof_estado) }}">
                @if($errors->has('prof_estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_estado') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_cep">{{ trans('cruds.cliente.fields.prof_cep') }}</label>
                <input class="form-control {{ $errors->has('prof_cep') ? 'is-invalid' : '' }}" type="text" name="prof_cep" id="prof_cep" value="{{ old('prof_cep', $cliente->prof_cep) }}">
                @if($errors->has('prof_cep'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_cep') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_cep_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_tel_comercial">{{ trans('cruds.cliente.fields.prof_tel_comercial') }}</label>
                <input class="form-control {{ $errors->has('prof_tel_comercial') ? 'is-invalid' : '' }}" type="text" name="prof_tel_comercial" id="prof_tel_comercial" value="{{ old('prof_tel_comercial', $cliente->prof_tel_comercial) }}">
                @if($errors->has('prof_tel_comercial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_tel_comercial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_tel_comercial_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.cliente.fields.prof_sede_propria') }}</label>
                <select class="form-control {{ $errors->has('prof_sede_propria') ? 'is-invalid' : '' }}" name="prof_sede_propria" id="prof_sede_propria">
                    <option value disabled {{ old('prof_sede_propria', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Cliente::PROF_SEDE_PROPRIA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('prof_sede_propria', $cliente->prof_sede_propria) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('prof_sede_propria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_sede_propria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_sede_propria_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_data_de_admissao">{{ trans('cruds.cliente.fields.prof_data_de_admissao') }}</label>
                <input class="form-control date {{ $errors->has('prof_data_de_admissao') ? 'is-invalid' : '' }}" type="text" name="prof_data_de_admissao" id="prof_data_de_admissao" value="{{ old('prof_data_de_admissao', $cliente->prof_data_de_admissao) }}">
                @if($errors->has('prof_data_de_admissao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_data_de_admissao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_data_de_admissao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_porte_da_empresa">{{ trans('cruds.cliente.fields.prof_porte_da_empresa') }}</label>
                <input class="form-control {{ $errors->has('prof_porte_da_empresa') ? 'is-invalid' : '' }}" type="text" name="prof_porte_da_empresa" id="prof_porte_da_empresa" value="{{ old('prof_porte_da_empresa', $cliente->prof_porte_da_empresa) }}">
                @if($errors->has('prof_porte_da_empresa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_porte_da_empresa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_porte_da_empresa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_cargo_funcao">{{ trans('cruds.cliente.fields.prof_cargo_funcao') }}</label>
                <input class="form-control {{ $errors->has('prof_cargo_funcao') ? 'is-invalid' : '' }}" type="text" name="prof_cargo_funcao" id="prof_cargo_funcao" value="{{ old('prof_cargo_funcao', $cliente->prof_cargo_funcao) }}">
                @if($errors->has('prof_cargo_funcao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_cargo_funcao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_cargo_funcao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_ocupacao">{{ trans('cruds.cliente.fields.prof_ocupacao') }}</label>
                <input class="form-control {{ $errors->has('prof_ocupacao') ? 'is-invalid' : '' }}" type="text" name="prof_ocupacao" id="prof_ocupacao" value="{{ old('prof_ocupacao', $cliente->prof_ocupacao) }}">
                @if($errors->has('prof_ocupacao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_ocupacao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_ocupacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_renda_bruta">{{ trans('cruds.cliente.fields.prof_renda_bruta') }}</label>
                <input class="form-control {{ $errors->has('prof_renda_bruta') ? 'is-invalid' : '' }}" type="text" name="prof_renda_bruta" id="prof_renda_bruta" value="{{ old('prof_renda_bruta', $cliente->prof_renda_bruta) }}">
                @if($errors->has('prof_renda_bruta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_renda_bruta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_renda_bruta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_outras_rendas">{{ trans('cruds.cliente.fields.prof_outras_rendas') }}</label>
                <input class="form-control {{ $errors->has('prof_outras_rendas') ? 'is-invalid' : '' }}" type="text" name="prof_outras_rendas" id="prof_outras_rendas" value="{{ old('prof_outras_rendas', $cliente->prof_outras_rendas) }}">
                @if($errors->has('prof_outras_rendas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_outras_rendas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_outras_rendas_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_forma_de_comprovacao">{{ trans('cruds.cliente.fields.prof_forma_de_comprovacao') }}</label>
                <input class="form-control {{ $errors->has('prof_forma_de_comprovacao') ? 'is-invalid' : '' }}" type="text" name="prof_forma_de_comprovacao" id="prof_forma_de_comprovacao" value="{{ old('prof_forma_de_comprovacao', $cliente->prof_forma_de_comprovacao) }}">
                @if($errors->has('prof_forma_de_comprovacao'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_forma_de_comprovacao') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_forma_de_comprovacao_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prof_patrimonio">{{ trans('cruds.cliente.fields.prof_patrimonio') }}</label>
                <input class="form-control {{ $errors->has('prof_patrimonio') ? 'is-invalid' : '' }}" type="text" name="prof_patrimonio" id="prof_patrimonio" value="{{ old('prof_patrimonio', $cliente->prof_patrimonio) }}">
                @if($errors->has('prof_patrimonio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prof_patrimonio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.prof_patrimonio_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="referenia_pessoals">{{ trans('cruds.cliente.fields.referenia_pessoal') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('referenia_pessoals') ? 'is-invalid' : '' }}" name="referenia_pessoals[]" id="referenia_pessoals" multiple>
                    @foreach($referenia_pessoals as $id => $referenia_pessoal)
                        <option value="{{ $id }}" {{ (in_array($id, old('referenia_pessoals', [])) || $cliente->referenia_pessoals->contains($id)) ? 'selected' : '' }}>{{ $referenia_pessoal }}</option>
                    @endforeach
                </select>
                @if($errors->has('referenia_pessoals'))
                    <div class="invalid-feedback">
                        {{ $errors->first('referenia_pessoals') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.referenia_pessoal_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="referencia_bancaria_id">{{ trans('cruds.cliente.fields.referencia_bancaria') }}</label>
                <select class="form-control select2 {{ $errors->has('referencia_bancaria') ? 'is-invalid' : '' }}" name="referencia_bancaria_id" id="referencia_bancaria_id">
                    @foreach($referencia_bancarias as $id => $referencia_bancaria)
                        <option value="{{ $id }}" {{ (old('referencia_bancaria_id') ? old('referencia_bancaria_id') : $cliente->referencia_bancaria->id ?? '') == $id ? 'selected' : '' }}>{{ $referencia_bancaria }}</option>
                    @endforeach
                </select>
                @if($errors->has('referencia_bancaria'))
                    <div class="invalid-feedback">
                        {{ $errors->first('referencia_bancaria') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cliente.fields.referencia_bancaria_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection