<div class="card my-3">
    <div class="card-header">
        <h3>Plano:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="plano">{{ trans('cruds.cliente.fields.plano') }}</label>
                    <input disabled class="form-control" type="text" name="plano" id="plano" value="{{ $cliente->plano }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="valor_plano">{{ trans('cruds.cliente.fields.valor_plano') }}</label>
                    <input disabled class="form-control" type="text" name="valor_plano" id="valor_plano" value="{{ $cliente->valor_plano }}">
                </div>
            </div>
        </div>
    </div>
</div>

