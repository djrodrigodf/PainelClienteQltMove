<div class="card my-3">
    <div class="card-header">
        <h3>Dados Profissionais:</h3>
    </div>

    @php


@endphp
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="prof_nome_da_empresa">{{ trans('cruds.cliente.fields.prof_nome_da_empresa') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_nome_da_empresa" id="prof_nome_da_empresa" value="{{ $cliente->prof_nome_da_empresa }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_cnpj">{{ trans('cruds.cliente.fields.prof_cnpj') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_cnpj" data-mask="00.000.000/0000-00" id="prof_cnpj" value="{{ $cliente->prof_cnpj }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cep">{{ trans('cruds.cliente.fields.prof_cep') }}</label>
                    <input  disabled class="form-control Maskcep" type="text" data-mask="00000-000" name="prof_cep" id="prof_cep" value="{{ $cliente->prof_cep }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_estado">{{ trans('cruds.cliente.fields.prof_estado') }}</label>
                    <input  disabled readonly class="form-control" type="text" name="prof_estado" id="prof_estado" value="{{ $cliente->prof_estado }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_bairro">{{ trans('cruds.cliente.fields.prof_bairro') }}</label>
                    <input  disabled readonly class="form-control" type="text" name="prof_bairro" id="prof_bairro" value="{{ $cliente->prof_bairro }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cidade">{{ trans('cruds.cliente.fields.prof_cidade') }}</label>
                    <input  disabled readonly class="form-control" type="text" name="prof_cidade" id="prof_cidade" value="{{ $cliente->prof_cidade }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="prof_endereco_comercial">{{ trans('cruds.cliente.fields.prof_endereco_comercial') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_endereco_comercial" id="prof_endereco_comercial" value="{{ $cliente->prof_endereco_comercial }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_tel_comercial">{{ trans('cruds.cliente.fields.prof_tel_comercial') }}</label>
                    <input  disabled class="form-control foneDD" type="text" name="prof_tel_comercial" id="prof_tel_comercial" value="{{ $cliente->prof_tel_comercial }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_tel_comercial">{{ trans('cruds.cliente.fields.prof_sede_propria') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_sede_propria" id="prof_sede_propria" value="{{ $cliente->prof_sede_propria }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_data_de_admissao">{{ trans('cruds.cliente.fields.prof_data_de_admissao') }}</label>

                    <input  disabled class="form-control" type="text" name="prof_data_de_admissao" id="prof_data_de_admissao" value="{{ $cliente->prof_data_de_admissao }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_porte_da_empresa">Porte da empresa</label>
                    <input  disabled class="form-control" type="text" name="prof_porte_da_empresa" id="prof_porte_da_empresa" value="{{ $cliente->prof_porte_da_empresa }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cargo_funcao">Cargo/função</label>
                    <input  disabled class="form-control" type="text" name="prof_cargo_funcao" id="prof_cargo_funcao" value="{{ $cliente->prof_cargo_funcao }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_ocupacao">Ocupação</label>
                    <input  disabled class="form-control" type="text" name="prof_ocupacao" id="prof_ocupacao" value="{{ $cliente->prof_ocupacao }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_renda_bruta">Renda bruta</label>
                    <input  disabled class="form-control" type="text" name="prof_renda_bruta" id="prof_renda_bruta" value="{{ $cliente->prof_renda_bruta }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_outras_rendas">Outras rendas</label>
                    <input  disabled class="form-control" type="text" name="prof_outras_rendas" id="prof_outras_rendas" value="{{ $cliente->prof_outras_rendas }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_forma_de_comprovacao">Forma de comprovação</label>
                    <input  disabled class="form-control" type="text" name="prof_forma_de_comprovacao" id="prof_forma_de_comprovacao" value="{{ $cliente->prof_forma_de_comprovacao }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="prof_patrimonio">Patrimônio</label>
                    <input  disabled class="form-control " type="text" name="prof_patrimonio" id="prof_patrimonio" value="{{ $cliente->prof_patrimonio }}">
                </div>
            </div>
        </div>
    </div>
</div>

