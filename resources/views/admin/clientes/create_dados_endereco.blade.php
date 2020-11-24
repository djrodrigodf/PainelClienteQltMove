<div class="card my-3">
    <div class="card-header">
        <h3>Endereço:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cep">{{ trans('cruds.cliente.fields.cep') }}</label>
                    <input class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }} Maskcep" type="text" name="cep" id="cep" value="{{ old('cep', '') }}">
                    @if($errors->has('cep'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cep') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.cep_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estado">{{ trans('cruds.cliente.fields.estado') }}</label>
                    <input readonly class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" type="text" name="estado" id="uf" value="{{ old('estado', '') }}">
                    @if($errors->has('estado'))
                        <div class="invalid-feedback">
                            {{ $errors->first('estado') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.estado_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bairro">{{ trans('cruds.cliente.fields.bairro') }}</label>
                    <input readonly class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text" name="bairro" id="bairro" value="{{ old('bairro', '') }}">
                    @if($errors->has('bairro'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bairro') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.bairro_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cidade">{{ trans('cruds.cliente.fields.cidade') }}</label>
                    <input readonly class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text" name="cidade" id="cidade" value="{{ old('cidade', '') }}">
                    @if($errors->has('cidade'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cidade') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.cidade_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="endereco">{{ trans('cruds.cliente.fields.endereco') }}</label>
                    <input class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" type="text" name="endereco" id="rua" value="{{ old('endereco', '') }}">
                    @if($errors->has('endereco'))
                        <div class="invalid-feedback">
                            {{ $errors->first('endereco') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.endereco_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="complemento">{{ trans('cruds.cliente.fields.complemento') }}</label>
                    <input class="form-control {{ $errors->has('complemento') ? 'is-invalid' : '' }}" type="text" name="complemento" id="complemento" value="{{ old('complemento', '') }}">
                    @if($errors->has('complemento'))
                        <div class="invalid-feedback">
                            {{ $errors->first('complemento') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.complemento_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">{{ trans('cruds.cliente.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.email_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tempo_de_residencia">{{ trans('cruds.cliente.fields.tempo_de_residencia') }}</label>
                    <input class="form-control {{ $errors->has('tempo_de_residencia') ? 'is-invalid' : '' }}" type="text" name="tempo_de_residencia" id="tempo_de_residencia" value="{{ old('tempo_de_residencia', '') }}">
                    @if($errors->has('tempo_de_residencia'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tempo_de_residencia') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.tempo_de_residencia_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tel_resid">{{ trans('cruds.cliente.fields.tel_resid') }}</label>
                    <input class="form-control {{ $errors->has('tel_resid') ? 'is-invalid' : '' }} foneDD" type="text" name="tel_resid" id="tel_resid" value="{{ old('tel_resid', '') }}">
                    @if($errors->has('tel_resid'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tel_resid') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.tel_resid_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tel_celular">{{ trans('cruds.cliente.fields.tel_celular') }}</label>
                    <input class="form-control {{ $errors->has('tel_celular') ? 'is-invalid' : '' }} CelDD" type="text" name="tel_celular" id="tel_celular" value="{{ old('tel_celular', '') }}">
                    @if($errors->has('tel_celular'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tel_celular') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.tel_celular_helper') }}</span>
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

        $(document).ready(function() {
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
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
