<div class="card my-3">
    <div class="card-header">
        <h3>Plano:</h3>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('admin.clientes.create', ['carro' => 1])}}" class="btn btn-lg
@if ($disponivel)
                    btn-success
                    @else
                    btn-light
                @endif
">Veiculos Disponiveis</a>
                <a href="{{route('admin.clientes.create')}}" class="btn btn-lg
                 @if (!$disponivel)
                    btn-success
                    @else
                    btn-light
                @endif
">Veiculos para Compra</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="ref_banco_codigo">Veiculos</label>
                    
                    <select class="form-control select2 veiculosDisponiveis" name="plano_nome" id="plano_nome">
                        <option value="">Selecione</option>
                        @foreach($planos as $plano)
                            @if (\App\Models\VwVeiculosDisponiveis::VeiculosDisponiveis($plano->versao) > 0 && $disponivel)
                                <option value="{{$plano->veiculo}}">{{$plano->veiculo}}</option>
                            @endif

                                @if (\App\Models\VwVeiculosDisponiveis::VeiculosDisponiveis($plano->versao) == 0 && $disponivel == false)
                                    <option value="{{$plano->veiculo}}">{{$plano->veiculo}}</option>
                                @endif

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
            <input class="form-control" type="hidden" name="plano" id="plano" value="{{ old('plano', '') }}">
            <input class="form-control dinheiro" type="hidden" required name="valor_plano" id="valor_plano" value="">
            <input class="form-control" type="hidden" name="versao" id="versao" value="">
        </div>
    </div>
</div>

