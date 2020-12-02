<div class="card my-3">
    <div class="card-header">
        <h3>Plano:</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="ref_banco_codigo">Veiculo</label>
                    <select class="form-control select2" name="plano_nome" id="plano_nome">
                        <option value="">Selecione</option>
                        @foreach($planos as $plano)
                            <option value="{{$plano->veiculo}}">{{$plano->veiculo}}</option>
                        @endforeach
                    </select>
                </div>
                @include('admin.clientes.listPlanos')
            </div>
            <div class="col-md-5 detalhes-plano">
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <input class="form-control {{ $errors->has('plano') ? 'is-invalid' : '' }}" type="hidden" name="plano" id="plano" value="{{ old('plano', '') }}">
            <input class="form-control {{ $errors->has('valor_plano') ? 'is-invalid' : '' }} dinheiro" type="hidden" name="valor_plano" id="valor_plano" value="{{ old('valor_plano', '') }}">
        </div>
    </div>
</div>

