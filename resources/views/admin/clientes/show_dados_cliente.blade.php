<div class="card my-3">
    <div class="card-header">
        <h3>Dados do Cliente:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nome_completo">{{ trans('cruds.cliente.fields.nome_completo') }}</label>
                    <input disabled class="form-control" type="text" name="nome_completo" id="nome_completo" value="{{ $cliente->nome_completo}}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="cpf">{{ trans('cruds.cliente.fields.cpf') }}</label>
                    <input disabled class="form-control" type="text" name="cpf" id="cpf" value="{{ $cliente->cpf}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="rg">{{ trans('cruds.cliente.fields.rg') }}</label>
                    <input disabled class="form-control" type="text" name="rg" id="rg" value="{{ $cliente->rg}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_emissao_rg">{{ trans('cruds.cliente.fields.dt_emissao_rg') }}</label>
                    <input disabled class="form-control" type="text" name="dt_emissao_rg" id="dt_emissao_rg" value="{{ $cliente->dt_emissao_rg }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_nasc">{{ trans('cruds.cliente.fields.dt_nasc') }}</label>
                    <input disabled class="form-control" type="text" name="dt_nasc" id="dt_nasc" value="{{ $cliente->dt_nasc }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cnh">{{ trans('cruds.cliente.fields.cnh') }}</label>
                    <input disabled class="form-control" type="text" name="cnh" id="cnh" value="{{ $cliente->cnh}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dt_validade_cnh">{{ trans('cruds.cliente.fields.dt_validade_cnh') }}</label>
                    <input disabled class="form-control" type="text" name="dt_validade_cnh" id="dt_validade_cnh" value="{{ $cliente->dt_validade_cnh }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nacionalidade">{{ trans('cruds.cliente.fields.nacionalidade') }}</label>
                    <input disabled class="form-control" type="text" name="nacionalidade" id="nacionalidade" value="{{ $cliente->nacionalidade}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_do_pai">{{ trans('cruds.cliente.fields.nome_do_pai') }}</label>
                    <input disabled class="form-control" type="text" name="nome_do_pai" id="nome_do_pai" value="{{ $cliente->nome_do_pai}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nome_da_mae">{{ trans('cruds.cliente.fields.nome_da_mae') }}</label>
                    <input disabled class="form-control" type="text" name="nome_da_mae" id="nome_da_mae" value="{{ $cliente->nome_da_mae}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="grau_de_inst">{{ trans('cruds.cliente.fields.grau_de_inst') }}</label>
                    <input disabled class="form-control" type="text" name="grau_de_inst" id="grau_de_inst" value="{{ $cliente->grau_de_inst}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="grau_de_inst">{{ trans('cruds.cliente.fields.grau_de_inst') }}</label>
                    <input disabled class="form-control" type="text" name="grau_de_inst" id="grau_de_inst" value="{{ App\Models\Cliente::DEF_FISICO_SELECT[$cliente->def_fisico] ?? '' }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado_civil">{{ trans('cruds.cliente.fields.estado_civil') }}</label>
                    <input disabled class="form-control" type="text" name="estado_civil" id="estado_civil" value="{{ $cliente->estado_civil}}">
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
                    <input disabled class="form-control" type="text" name="nome_do_conjuge" id="nome_do_conjuge" value="{{ $cliente->nome_do_conjuge}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpf_conjuge">{{ trans('cruds.cliente.fields.cpf_conjuge') }}</label>
                    <input disabled class="form-control" type="text" name="cpf_conjuge" id="cpf_conjuge" value="{{ $cliente->cpf_conjuge}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nasc_conjunge">{{ trans('cruds.cliente.fields.nasc_conjunge') }}</label>
                    <input disabled class="form-control" type="text" name="nasc_conjunge" id="nasc_conjunge" value="{{ $cliente->nasc_conjunge}}">
                </div>
            </div>
        </div>
    </div>
</div>


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
