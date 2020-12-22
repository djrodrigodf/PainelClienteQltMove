@php

    $meusVeiculos = \App\Models\VwVeiculosDisponiveis::where('CodigoVersao', $proposta->plano->versao)->where('IDStatusOperacional', 6)->get();

@endphp
<div class="card my-3">
    <div class="card-header d-flex justify-content-between">
        <h3>Veiculo</h3>
        @if ($Veiculo == null && $implantacao == null)
            <a class="btn btn-success btn-lg" data-toggle="modal" data-target="#veiculoModal" href="#"><i class="fas fa-plus"></i></a>
        @endif



    </div>

    @include('admin.propostas.modal_veiculo')

    <div class="card-body">
        <div class="row">
            @if ($Veiculo)
                <div class="col-lg-12">
                    <table class="table table-responsive-sm table-striped">
                        <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Descrição</th>
                            <th>Chassi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$Veiculo->Placa}}</td>
                            <td>{{$Veiculo->Versao}} {{$Veiculo->AnoFabricacao}} - {{$Veiculo->Cor}}</td>
                            <td>{{$Veiculo->Chassi}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            @endif

            @if ($implantacao)
                <h2>Implantação {{$implantacao->ID}} - {{$implantacao->Status}}</h2>
            @endif


        </div>
    </div>

</div>
