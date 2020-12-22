<div class="card my-3">
    <div class="card-header">
        <h3>Dados Profissionais:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="prof_nome_da_empresa">{{ trans('cruds.cliente.fields.prof_nome_da_empresa') }}</label>
                    <input class="form-control {{ $errors->has('prof_nome_da_empresa') ? 'is-invalid' : '' }}" type="text" name="prof_nome_da_empresa" id="prof_nome_da_empresa" value="{{ old('prof_nome_da_empresa', '') }}">
                    @if($errors->has('prof_nome_da_empresa'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_nome_da_empresa') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_nome_da_empresa_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_cnpj">{{ trans('cruds.cliente.fields.prof_cnpj') }}</label>
                    <input class="form-control {{ $errors->has('prof_cnpj') ? 'is-invalid' : '' }}" type="text" name="prof_cnpj" id="prof_cnpj" value="{{ old('prof_cnpj', '') }}">
                    @if($errors->has('prof_cnpj'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_cnpj') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_cnpj_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cep">{{ trans('cruds.cliente.fields.prof_cep') }}</label>
                    <input class="form-control {{ $errors->has('prof_cep') ? 'is-invalid' : '' }} Maskcep" type="text" name="prof_cep" id="prof_cep" value="{{ old('prof_cep', '') }}">
                    @if($errors->has('prof_cep'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_cep') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_cep_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_estado">{{ trans('cruds.cliente.fields.prof_estado') }}</label>
                    <input readonly class="form-control {{ $errors->has('prof_estado') ? 'is-invalid' : '' }}" type="text" name="prof_estado" id="prof_estado" value="{{ old('prof_estado', '') }}">
                    @if($errors->has('prof_estado'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_estado') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_estado_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_bairro">{{ trans('cruds.cliente.fields.prof_bairro') }}</label>
                    <input readonly class="form-control {{ $errors->has('prof_bairro') ? 'is-invalid' : '' }}" type="text" name="prof_bairro" id="prof_bairro" value="{{ old('prof_bairro', '') }}">
                    @if($errors->has('prof_bairro'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_bairro') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_bairro_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cidade">{{ trans('cruds.cliente.fields.prof_cidade') }}</label>
                    <input readonly class="form-control {{ $errors->has('prof_cidade') ? 'is-invalid' : '' }}" type="text" name="prof_cidade" id="prof_cidade" value="{{ old('prof_cidade', '') }}">
                    @if($errors->has('prof_cidade'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_cidade') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_cidade_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="prof_endereco_comercial">{{ trans('cruds.cliente.fields.prof_endereco_comercial') }}</label>
                    <input class="form-control {{ $errors->has('prof_endereco_comercial') ? 'is-invalid' : '' }}" type="text" name="prof_endereco_comercial" id="prof_endereco_comercial" value="{{ old('prof_endereco_comercial', '') }}">
                    @if($errors->has('prof_endereco_comercial'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_endereco_comercial') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_endereco_comercial_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_tel_comercial">{{ trans('cruds.cliente.fields.prof_tel_comercial') }}</label>
                    <input class="form-control {{ $errors->has('prof_tel_comercial') ? 'is-invalid' : '' }} foneDD" type="text" name="prof_tel_comercial" id="prof_tel_comercial" value="{{ old('prof_tel_comercial', '') }}">
                    @if($errors->has('prof_tel_comercial'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_tel_comercial') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_tel_comercial_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('cruds.cliente.fields.prof_sede_propria') }}</label>
                    <select class="form-control {{ $errors->has('prof_sede_propria') ? 'is-invalid' : '' }}" name="prof_sede_propria" id="prof_sede_propria">
                        <option value disabled {{ old('prof_sede_propria', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Cliente::PROF_SEDE_PROPRIA_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('prof_sede_propria', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('prof_sede_propria'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_sede_propria') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_sede_propria_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="prof_data_de_admissao">{{ trans('cruds.cliente.fields.prof_data_de_admissao') }}</label>
                    <input class="form-control" id="date-input prof_data_de_admissao" type="date" name="prof_data_de_admissao" placeholder="date">
                    @if($errors->has('prof_data_de_admissao'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_data_de_admissao') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_data_de_admissao_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_porte_da_empresa">{{ trans('cruds.cliente.fields.prof_porte_da_empresa') }}</label>
                    <input class="form-control {{ $errors->has('prof_porte_da_empresa') ? 'is-invalid' : '' }}" type="text" name="prof_porte_da_empresa" id="prof_porte_da_empresa" value="{{ old('prof_porte_da_empresa', '') }}">
                    @if($errors->has('prof_porte_da_empresa'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_porte_da_empresa') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_porte_da_empresa_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_cargo_funcao">{{ trans('cruds.cliente.fields.prof_cargo_funcao') }}</label>
                    <input class="form-control {{ $errors->has('prof_cargo_funcao') ? 'is-invalid' : '' }}" type="text" name="prof_cargo_funcao" id="prof_cargo_funcao" value="{{ old('prof_cargo_funcao', '') }}">
                    @if($errors->has('prof_cargo_funcao'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_cargo_funcao') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_cargo_funcao_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_ocupacao">{{ trans('cruds.cliente.fields.prof_ocupacao') }}</label>
                    <input class="form-control {{ $errors->has('prof_ocupacao') ? 'is-invalid' : '' }}" type="text" name="prof_ocupacao" id="prof_ocupacao" value="{{ old('prof_ocupacao', '') }}">
                    @if($errors->has('prof_ocupacao'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_ocupacao') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_ocupacao_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_renda_bruta">{{ trans('cruds.cliente.fields.prof_renda_bruta') }}</label>
                    <input class="form-control {{ $errors->has('prof_renda_bruta') ? 'is-invalid' : '' }}" type="text" name="prof_renda_bruta" id="prof_renda_bruta" value="{{ old('prof_renda_bruta', '') }}">
                    @if($errors->has('prof_renda_bruta'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_renda_bruta') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_renda_bruta_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_outras_rendas">{{ trans('cruds.cliente.fields.prof_outras_rendas') }}</label>
                    <input class="form-control {{ $errors->has('prof_outras_rendas') ? 'is-invalid' : '' }}" type="text" name="prof_outras_rendas" id="prof_outras_rendas" value="{{ old('prof_outras_rendas', '') }}">
                    @if($errors->has('prof_outras_rendas'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_outras_rendas') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_outras_rendas_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prof_forma_de_comprovacao">{{ trans('cruds.cliente.fields.prof_forma_de_comprovacao') }}</label>
                    <input class="form-control {{ $errors->has('prof_forma_de_comprovacao') ? 'is-invalid' : '' }}" type="text" name="prof_forma_de_comprovacao" id="prof_forma_de_comprovacao" value="{{ old('prof_forma_de_comprovacao', '') }}">
                    @if($errors->has('prof_forma_de_comprovacao'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_forma_de_comprovacao') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_forma_de_comprovacao_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="prof_patrimonio">{{ trans('cruds.cliente.fields.prof_patrimonio') }}</label>
                    <input class="form-control {{ $errors->has('prof_patrimonio') ? 'is-invalid' : '' }}" type="text" name="prof_patrimonio" id="prof_patrimonio" value="{{ old('prof_patrimonio', '') }}">
                    @if($errors->has('prof_patrimonio'))
                        <div class="invalid-feedback">
                            {{ $errors->first('prof_patrimonio') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.prof_patrimonio_helper') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent

    <script src="{{asset('js/validCnpj.js')}}"></script>

    <script>
        $('.Maskcep').mask('00000-000');
        $('#prof_cnpj').mask('00.000.000/0000-00');
        $('#prof_cnpj').focusout(function() {
            var val = $('#prof_cnpj').val();
            if (!validarCNPJ(val)) {
                $('#prof_cnpj').val('');
            }
        })
    </script>

    <script>

        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#prof_endereco_comercial").val("");
                $("#prof_bairro").val("");
                $("#prof_cidade").val("");
                $("#prof_estado").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#prof_cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#prof_endereco_comercial").val("...");
                        $("#prof_bairro").val("...");
                        $("#prof_cidade").val("...");
                        $("#prof_estado").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#prof_endereco_comercial").val(dados.logradouro);
                                $("#prof_bairro").val(dados.bairro);
                                $("#prof_cidade").val(dados.localidade);
                                $("#prof_estado").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>

@endsection
