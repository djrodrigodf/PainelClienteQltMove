<div class="card my-3">
    <div class="card-header">
        <h3>Plano</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h3>{{$proposta->plano->marca}} - {{$proposta->plano->veiculo}} - {{$proposta->plano->ano}}</h3>
                <h4>{{$proposta->plano->periodo}} Meses</h4>

            </div>
            <div class="col-md-4">
                @if($proposta->plano->foto)
                    <img src="{{url('storage\\' . $proposta->plano->foto)}}" width="100px" alt="">
                @else
                    <img src="{{asset('img/naotemfoto.jpg')}}" width="100px" alt="">
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-condensed">
                    <tbody>
                    <tr>
                        <td class="font-weight-bold">Franquia de KM Mensal</td>
                        <td>{{$planoRegra->QtdKmFranquiaMensalPadrao}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Valor Mensal</td>
                        <td>R$ {{number_format($planoRegra->valor,2,",",".")}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Caução</td>
                        <td>R$ {{number_format($planoRegra->caucao,2,",",".")}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Participação Colisão</td>
                        <td>R$ {{number_format($planoRegra->participacaoColisao,2,",",".")}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Participação Terceiro</td>
                        <td>R$ {{number_format($planoRegra->participacaoTerceiro,2,",",".")}}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Participação Roubo</td>
                        <td>R$ {{number_format($planoRegra->participacaoRoubo,2,",",".")}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
