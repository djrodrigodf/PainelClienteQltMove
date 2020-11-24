<div class="card my-3">
    <div class="card-header">
        <h3>Endereço:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cep">{{ trans('cruds.cliente.fields.cep') }}</label>
                    <input  disabled class="form-control" type="text" name="cep" id="cep" value="{{ $cliente->cep }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estado">{{ trans('cruds.cliente.fields.estado') }}</label>
                    <input  disabled  class="form-control" type="text" name="estado" id="uf" value="{{ $cliente->estado }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bairro">{{ trans('cruds.cliente.fields.bairro') }}</label>
                    <input  disabled  class="form-control" type="text" name="bairro" id="bairro" value="{{ $cliente->bairro }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cidade">{{ trans('cruds.cliente.fields.cidade') }}</label>
                    <input  disabled  class="form-control" type="text" name="cidade" id="cidade" value="{{ $cliente->cidade }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="endereco">{{ trans('cruds.cliente.fields.endereco') }}</label>
                    <input  disabled class="form-control" type="text" name="endereco" id="rua" value="{{ $cliente->endereco }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="complemento">{{ trans('cruds.cliente.fields.complemento') }}</label>
                    <input  disabled class="form-control" type="text" name="complemento" id="complemento" value="{{ $cliente->complemento }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">{{ trans('cruds.cliente.fields.email') }}</label>
                    <input  disabled class="form-control" type="email" name="email" id="email" value="{{ $cliente->email }}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tempo_de_residencia">{{ trans('cruds.cliente.fields.tempo_de_residencia') }}</label>
                    <input  disabled class="form-control" type="text" name="tempo_de_residencia" id="tempo_de_residencia" value="{{ $cliente->tempo_de_residencia }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tel_resid">{{ trans('cruds.cliente.fields.tel_resid') }}</label>
                    <input  disabled class="form-control" data-mask="(00) 0000-0000" type="text" name="tel_resid" id="tel_resid" value="{{ $cliente->tel_resid }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tel_celular">{{ trans('cruds.cliente.fields.tel_celular') }}</label>
                    <input  disabled class="form-control" data-mask="(00) 00000-0000" type="text" name="tel_celular" id="tel_celular" value="{{ $cliente->tel_celular }}">
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
