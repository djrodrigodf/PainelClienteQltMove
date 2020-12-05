<div class="card my-3">
    <div class="card-header">
        <h3>Cliente</h3>
{{--        <a href="{{route('admin.clientes.edit', $proposta->cliente->id)}}" class="btn btn-success">Editar</a>--}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nome_completo">{{ trans('cruds.cliente.fields.nome_completo') }}</label>
                    <input disabled class="form-control" type="text" name="nome_completo" id="nome_completo" value="{{ $proposta->cliente->nome_completo}}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="cpf">{{ trans('cruds.cliente.fields.cpf') }}</label>
                    <input disabled class="form-control" type="text" name="cpf" id="cpf" value="{{ $proposta->cliente->cpf}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="rg">{{ trans('cruds.cliente.fields.rg') }}</label>
                    <input disabled class="form-control" type="text" name="rg" id="rg" value="{{ $proposta->cliente->rg}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_emissao_rg">{{ trans('cruds.cliente.fields.dt_emissao_rg') }}</label>
                    <input disabled class="form-control" type="text" name="dt_emissao_rg" id="dt_emissao_rg" value="{{ $proposta->cliente->dt_emissao_rg }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_nasc">{{ trans('cruds.cliente.fields.dt_nasc') }}</label>
                    <input disabled class="form-control" type="text" name="dt_nasc" id="dt_nasc" value="{{ $proposta->cliente->dt_nasc }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cnh">{{ trans('cruds.cliente.fields.cnh') }}</label>
                    <input disabled class="form-control" type="text" name="cnh" id="cnh" value="{{ $proposta->cliente->cnh}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_validade_cnh">{{ trans('cruds.cliente.fields.dt_validade_cnh') }}</label>
                    <input disabled class="form-control" type="text" name="dt_validade_cnh" id="dt_validade_cnh" value="{{ $proposta->cliente->dt_validade_cnh }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nacionalidade">{{ trans('cruds.cliente.fields.nacionalidade') }}</label>
                    <input disabled class="form-control" type="text" name="nacionalidade" id="nacionalidade" value="{{ $proposta->cliente->nacionalidade}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_do_pai">{{ trans('cruds.cliente.fields.nome_do_pai') }}</label>
                    <input disabled class="form-control" type="text" name="nome_do_pai" id="nome_do_pai" value="{{ $proposta->cliente->nome_do_pai}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_da_mae">{{ trans('cruds.cliente.fields.nome_da_mae') }}</label>
                    <input disabled class="form-control" type="text" name="nome_da_mae" id="nome_da_mae" value="{{ $proposta->cliente->nome_da_mae}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="grau_de_inst">{{ trans('cruds.cliente.fields.grau_de_inst') }}</label>
                    <input disabled class="form-control" type="text" name="grau_de_inst" id="grau_de_inst" value="{{ $proposta->cliente->grau_de_inst}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="grau_de_inst">{{ trans('cruds.cliente.fields.grau_de_inst') }}</label>
                    <input disabled class="form-control" type="text" name="grau_de_inst" id="grau_de_inst" value="{{ App\Models\Cliente::DEF_FISICO_SELECT[$proposta->cliente->def_fisico] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado_civil">{{ trans('cruds.cliente.fields.estado_civil') }}</label>
                    <input disabled class="form-control" type="text" name="estado_civil" id="estado_civil" value="{{ $proposta->cliente->estado_civil}}">
                </div>
            </div>
        </div>
    </div>
</div>



<div class="card my-3">
    <div class="card-header">
        <h3>Endereço:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cep">{{ trans('cruds.cliente.fields.cep') }}</label>
                    <input  disabled class="form-control" type="text" name="cep" id="cep" value="{{ $proposta->cliente->cep }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estado">{{ trans('cruds.cliente.fields.estado') }}</label>
                    <input  disabled  class="form-control" type="text" name="estado" id="uf" value="{{ $proposta->cliente->estado }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bairro">{{ trans('cruds.cliente.fields.bairro') }}</label>
                    <input  disabled  class="form-control" type="text" name="bairro" id="bairro" value="{{ $proposta->cliente->bairro }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cidade">{{ trans('cruds.cliente.fields.cidade') }}</label>
                    <input  disabled  class="form-control" type="text" name="cidade" id="cidade" value="{{ $proposta->cliente->cidade }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="endereco">{{ trans('cruds.cliente.fields.endereco') }}</label>
                    <input  disabled class="form-control" type="text" name="endereco" id="rua" value="{{ $proposta->cliente->endereco }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="complemento">{{ trans('cruds.cliente.fields.complemento') }}</label>
                    <input  disabled class="form-control" type="text" name="complemento" id="complemento" value="{{ $proposta->cliente->complemento }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">{{ trans('cruds.cliente.fields.email') }}</label>
                    <input  disabled class="form-control" type="email" name="email" id="email" value="{{ $proposta->cliente->email }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tempo_de_residencia">{{ trans('cruds.cliente.fields.tempo_de_residencia') }}</label>
                    <input  disabled class="form-control" type="text" name="tempo_de_residencia" id="tempo_de_residencia" value="{{ $proposta->cliente->tempo_de_residencia }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tel_resid">{{ trans('cruds.cliente.fields.tel_resid') }}</label>
                    <input  disabled class="form-control" data-mask="(00) 0000-0000" type="text" name="tel_resid" id="tel_resid" value="{{ $proposta->cliente->tel_resid }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tel_celular">{{ trans('cruds.cliente.fields.tel_celular') }}</label>
                    <input  disabled class="form-control" data-mask="(00) 00000-0000" type="text" name="tel_celular" id="tel_celular" value="{{ $proposta->cliente->tel_celular }}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card my-3">
    <div class="card-header">
        <h3>Cônjuge:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_do_conjuge">{{ trans('cruds.cliente.fields.nome_do_conjuge') }}</label>
                    <input disabled class="form-control" type="text" name="nome_do_conjuge" id="nome_do_conjuge" value="{{ $proposta->cliente->nome_do_conjuge}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpf_conjuge">{{ trans('cruds.cliente.fields.cpf_conjuge') }}</label>
                    <input disabled class="form-control" type="text" name="cpf_conjuge" id="cpf_conjuge" value="{{ $proposta->cliente->cpf_conjuge}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nasc_conjunge">{{ trans('cruds.cliente.fields.nasc_conjunge') }}</label>
                    <input disabled class="form-control" type="text" name="nasc_conjunge" id="nasc_conjunge" value="{{ $proposta->cliente->nasc_conjunge}}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card my-3">
    <div class="card-header">
        <h3>Dados Profissionais:</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="prof_nome_da_empresa">{{ trans('cruds.cliente.fields.prof_nome_da_empresa') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_nome_da_empresa" id="prof_nome_da_empresa" value="{{ $proposta->cliente->prof_nome_da_empresa }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_cnpj">{{ trans('cruds.cliente.fields.prof_cnpj') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_cnpj" data-mask="00.000.000/0000-00" id="prof_cnpj" value="{{ $proposta->cliente->prof_cnpj }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cep">{{ trans('cruds.cliente.fields.prof_cep') }}</label>
                    <input  disabled class="form-control Maskcep" type="text" data-mask="00000-000" name="prof_cep" id="prof_cep" value="{{ $proposta->cliente->prof_cep }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_estado">{{ trans('cruds.cliente.fields.prof_estado') }}</label>
                    <input  disabled readonly class="form-control" type="text" name="prof_estado" id="prof_estado" value="{{ $proposta->cliente->prof_estado }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_bairro">{{ trans('cruds.cliente.fields.prof_bairro') }}</label>
                    <input  disabled readonly class="form-control" type="text" name="prof_bairro" id="prof_bairro" value="{{ $proposta->cliente->prof_bairro }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cidade">{{ trans('cruds.cliente.fields.prof_cidade') }}</label>
                    <input  disabled readonly class="form-control" type="text" name="prof_cidade" id="prof_cidade" value="{{ $proposta->cliente->prof_cidade }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="prof_endereco_comercial">{{ trans('cruds.cliente.fields.prof_endereco_comercial') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_endereco_comercial" id="prof_endereco_comercial" value="{{ $proposta->cliente->prof_endereco_comercial }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_tel_comercial">{{ trans('cruds.cliente.fields.prof_tel_comercial') }}</label>
                    <input  disabled class="form-control foneDD" type="text" name="prof_tel_comercial" id="prof_tel_comercial" value="{{ $proposta->cliente->prof_tel_comercial }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_tel_comercial">{{ trans('cruds.cliente.fields.prof_sede_propria') }}</label>
                    <input  disabled class="form-control" type="text" name="prof_sede_propria" id="prof_sede_propria" value="{{ $proposta->cliente->prof_sede_propria }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_data_de_admissao">{{ trans('cruds.cliente.fields.prof_data_de_admissao') }}</label>

                    <input  disabled class="form-control" type="text" name="prof_data_de_admissao" id="prof_data_de_admissao" value="{{ $proposta->cliente->prof_data_de_admissao }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_porte_da_empresa">Porte da empresa</label>
                    <input  disabled class="form-control" type="text" name="prof_porte_da_empresa" id="prof_porte_da_empresa" value="{{ $proposta->cliente->prof_porte_da_empresa }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cargo_funcao">Cargo/função</label>
                    <input  disabled class="form-control" type="text" name="prof_cargo_funcao" id="prof_cargo_funcao" value="{{ $proposta->cliente->prof_cargo_funcao }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_ocupacao">Ocupação</label>
                    <input  disabled class="form-control" type="text" name="prof_ocupacao" id="prof_ocupacao" value="{{ $proposta->cliente->prof_ocupacao }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_renda_bruta">Renda bruta</label>
                    <input  disabled class="form-control" type="text" name="prof_renda_bruta" id="prof_renda_bruta" value="{{ $proposta->cliente->prof_renda_bruta }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_outras_rendas">Outras rendas</label>
                    <input  disabled class="form-control" type="text" name="prof_outras_rendas" id="prof_outras_rendas" value="{{ $proposta->cliente->prof_outras_rendas }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_forma_de_comprovacao">Forma de comprovação</label>
                    <input  disabled class="form-control" type="text" name="prof_forma_de_comprovacao" id="prof_forma_de_comprovacao" value="{{ $proposta->cliente->prof_forma_de_comprovacao }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="prof_patrimonio">Patrimônio</label>
                    <input  disabled class="form-control " type="text" name="prof_patrimonio" id="prof_patrimonio" value="{{ $proposta->cliente->prof_patrimonio }}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card my-3">
    <div class="card-header">
        <h3>Referências Pessoal:</h3>
    </div>
    <div class="card-body">
        @foreach($proposta->cliente->referenia_pessoals as $key => $referenia_pessoal)
            <span class="label label-info"></span>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ref_nome">Nome Completo</label>
                        <input disabled class="form-control" type="text" id="ref_nome1" value="{{ $referenia_pessoal->nome_completo }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ref_telefone">Telefone</label>
                        <input disabled class="form-control tel" type="text" id="ref_telefone1" value="{{ $referenia_pessoal->telefone }}">
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<div class="card my-3">
    <div class="card-header">
        <h3>Referência Bancária:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ref_banco_codigo">Banco</label>
                    <input disabled class="form-control" type="text" name="ref_agencia" id="ref_agencia" value="{{$proposta->cliente->referencia_bancaria->banco_codigo ?? ''}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_agencia">Agência</label>
                    <input disabled class="form-control" type="text" name="ref_agencia" id="ref_agencia" value="{{$proposta->cliente->referencia_bancaria->agencia_codigo ?? ''}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_conta">Conta</label>
                    <input disabled class="form-control" type="text" name="ref_conta" id="ref_conta" value="{{$proposta->cliente->referencia_bancaria->conta ?? ''}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_tempo_conta">Tempo de Conta</label>
                    <input disabled class="form-control" type="text" name="ref_tempo_conta" id="ref_tempo_conta" value="{{$proposta->cliente->referencia_bancaria->tempo_de_conta ?? ''}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_cartao_credito">Cartão de Crédito</label>
                    <input disabled class="form-control" type="text" name="ref_cartao_credito" id="ref_cartao_credito" value="{{$proposta->cliente->referencia_bancaria->cartao_de_credito ?? ''}}">
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>

        $('.foneDD').mask('(00) 0000-0000');
        $('.CelDD').mask('(00) 00000-0000');


    </script>

@endsection



@section('scripts')
    @parent
    <script type="text/javascript">

        var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            spOptions = {
                onKeyPress: function(val, e, field, options) {
                    field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

        $('.tel').mask(SPMaskBehavior, spOptions);

        $('#cpf').mask('000.000.000-00');
        $('#cpf_conjuge').mask('000.000.000-00');


    </script>

@endsection
