<div class="card my-3">
    <div class="card-header">
        <h3>Dados do Cliente:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nome_completo">{{ trans('cruds.cliente.fields.nome_completo') }}</label>
                    <input class="form-control {{ $errors->has('nome_completo') ? 'is-invalid' : '' }}" type="text" name="nome_completo" id="nome_completo"
                           value="{{ old('nome_completo', '') }}">
                    @if($errors->has('nome_completo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome_completo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.nome_completo_helper') }}</span>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="cpf">{{ trans('cruds.cliente.fields.cpf') }}</label>
                    <input class="form-control validate {{ $errors->has('cpf') ? 'is-invalid' : '' }}" type="text" name="cpf" id="cpf" value="{{ old('cpf', '') }}">
                    @if($errors->has('cpf'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cpf') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.cpf_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="rg">{{ trans('cruds.cliente.fields.rg') }}</label>
                    <input class="form-control {{ $errors->has('rg') ? 'is-invalid' : '' }}" type="text" name="rg" id="rg" value="{{ old('rg', '') }}">
                    @if($errors->has('rg'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rg') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.rg_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_emissao_rg">{{ trans('cruds.cliente.fields.dt_emissao_rg') }}</label>
                    <input class="form-control date {{ $errors->has('dt_emissao_rg') ? 'is-invalid' : '' }}" type="text" name="dt_emissao_rg" id="dt_emissao_rg" value="{{ old('dt_emissao_rg') }}">
                    @if($errors->has('dt_emissao_rg'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dt_emissao_rg') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.dt_emissao_rg_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_nasc">{{ trans('cruds.cliente.fields.dt_nasc') }}</label>
                    <input class="form-control date {{ $errors->has('dt_nasc') ? 'is-invalid' : '' }}" type="text" name="dt_nasc" id="dt_nasc" value="{{ old('dt_nasc') }}">
                    @if($errors->has('dt_nasc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dt_nasc') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.dt_nasc_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cnh">{{ trans('cruds.cliente.fields.cnh') }}</label>
                    <input class="form-control {{ $errors->has('cnh') ? 'is-invalid' : '' }}" type="text" name="cnh" id="cnh" value="{{ old('cnh', '') }}">
                    @if($errors->has('cnh'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cnh') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.cnh_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_validade_cnh">{{ trans('cruds.cliente.fields.dt_validade_cnh') }}</label>
                    <input class="form-control date {{ $errors->has('dt_validade_cnh') ? 'is-invalid' : '' }}" type="text" name="dt_validade_cnh" id="dt_validade_cnh" value="{{ old('dt_validade_cnh') }}">
                    @if($errors->has('dt_validade_cnh'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dt_validade_cnh') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.dt_validade_cnh_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nacionalidade">{{ trans('cruds.cliente.fields.nacionalidade') }}</label>
                    <input class="form-control {{ $errors->has('nacionalidade') ? 'is-invalid' : '' }}" type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade', '') }}">
                    @if($errors->has('nacionalidade'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nacionalidade') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.nacionalidade_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_do_pai">{{ trans('cruds.cliente.fields.nome_do_pai') }}</label>
                    <input class="form-control {{ $errors->has('nome_do_pai') ? 'is-invalid' : '' }}" type="text" name="nome_do_pai" id="nome_do_pai" value="{{ old('nome_do_pai', '') }}">
                    @if($errors->has('nome_do_pai'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome_do_pai') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.nome_do_pai_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_da_mae">{{ trans('cruds.cliente.fields.nome_da_mae') }}</label>
                    <input class="form-control {{ $errors->has('nome_da_mae') ? 'is-invalid' : '' }}" type="text" name="nome_da_mae" id="nome_da_mae" value="{{ old('nome_da_mae', '') }}">
                    @if($errors->has('nome_da_mae'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome_da_mae') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.nome_da_mae_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="grau_de_inst">{{ trans('cruds.cliente.fields.grau_de_inst') }}</label>
                    <input class="form-control {{ $errors->has('grau_de_inst') ? 'is-invalid' : '' }}" type="text" name="grau_de_inst" id="grau_de_inst" value="{{ old('grau_de_inst', '') }}">
                    @if($errors->has('grau_de_inst'))
                        <div class="invalid-feedback">
                            {{ $errors->first('grau_de_inst') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.grau_de_inst_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ trans('cruds.cliente.fields.def_fisico') }}</label>
                    <select class="form-control {{ $errors->has('def_fisico') ? 'is-invalid' : '' }}" name="def_fisico" id="def_fisico">
                        <option value disabled {{ old('def_fisico', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Cliente::DEF_FISICO_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('def_fisico', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('def_fisico'))
                        <div class="invalid-feedback">
                            {{ $errors->first('def_fisico') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.def_fisico_helper') }}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado_civil">{{ trans('cruds.cliente.fields.estado_civil') }}</label>
                    <input class="form-control {{ $errors->has('estado_civil') ? 'is-invalid' : '' }}" type="text" name="estado_civil" id="estado_civil" value="{{ old('estado_civil', '') }}">
                    @if($errors->has('estado_civil'))
                        <div class="invalid-feedback">
                            {{ $errors->first('estado_civil') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.estado_civil_helper') }}</span>
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
                    <input class="form-control {{ $errors->has('nome_do_conjuge') ? 'is-invalid' : '' }}" type="text" name="nome_do_conjuge" id="nome_do_conjuge" value="{{ old('nome_do_conjuge', '') }}">
                    @if($errors->has('nome_do_conjuge'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nome_do_conjuge') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.nome_do_conjuge_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpf_conjuge">{{ trans('cruds.cliente.fields.cpf_conjuge') }}</label>
                    <input class="form-control {{ $errors->has('cpf_conjuge') ? 'is-invalid' : '' }}" type="text" name="cpf_conjuge" id="cpf_conjuge" value="{{ old('cpf_conjuge', '') }}">
                    @if($errors->has('cpf_conjuge'))
                        <div class="invalid-feedback">
                            {{ $errors->first('cpf_conjuge') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.cpf_conjuge_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nasc_conjunge">{{ trans('cruds.cliente.fields.nasc_conjunge') }}</label>
                    <input class="form-control {{ $errors->has('nasc_conjunge') ? 'is-invalid' : '' }}" type="text" name="nasc_conjunge" id="nasc_conjunge" value="{{ old('nasc_conjunge', '') }}">
                    @if($errors->has('nasc_conjunge'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nasc_conjunge') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.nasc_conjunge_helper') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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

    <script src="{{asset('js/validCpf.js')}}"></script>

    <script>
        $('#cpf').focusout(function() {
            var val = $('#cpf').val();
            if (!validarCPF(val)) {
                $('#cpf').val('');
            }
        })

        $('#cpf_conjuge').focusout(function() {
            var val = $('#cpf_conjuge').val();
            if (!validarCPF(val)) {
                $('#cpf_conjuge').val('');
            }
        })
    </script>

@endsection
