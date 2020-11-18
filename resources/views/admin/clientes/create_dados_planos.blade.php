<div class="card my-3">
    <div class="card-header">
        <h3>Plano:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="plano">{{ trans('cruds.cliente.fields.plano') }}</label>
                    <input class="form-control {{ $errors->has('plano') ? 'is-invalid' : '' }}" type="text" name="plano" id="plano" value="{{ old('plano', '') }}">
                    @if($errors->has('plano'))
                        <div class="invalid-feedback">
                            {{ $errors->first('plano') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.plano_helper') }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="valor_plano">{{ trans('cruds.cliente.fields.valor_plano') }}</label>
                    <input class="form-control {{ $errors->has('valor_plano') ? 'is-invalid' : '' }}" type="text" name="valor_plano" id="valor_plano" value="{{ old('valor_plano', '') }}">
                    @if($errors->has('valor_plano'))
                        <div class="invalid-feedback">
                            {{ $errors->first('valor_plano') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.cliente.fields.valor_plano_helper') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

