@extends('layouts.admin')
@section('content')

    @include('admin.propostas.modal_aprovar')
    @include('admin.propostas.modal_reprovar')

    <div class="card-header">
        <div class="row d-flex">
            <div class="col-md-6">
                <h1>Proposta</h1>
            </div>
            <div class="col-md-6 d-flex align-content-center justify-content-end">
                @if($proposta->status_id == 1)
                    <a id="aprovar" href="#" data-toggle="modal" data-target="#aprovarModal" class="btn btn-primary mr-3 my-auto">Aprovar</a>
                    <a id="reprovar" href="#" data-toggle="modal" data-target="#reprovarModal" class="btn btn-danger my-auto mr-3">Recusar</a>
                @endif
                @if($proposta->status_id == 3)
                        @if (!$temProposta)
                    <a id="ajustar_plano" href="{{route('admin.ajustarplano_proposta', $proposta->id)}}" class="btn btn-success my-auto mr-3">Ajustar Plano</a>
                        @endif
                        <a id="ajustar_plano" href="{{route('admin.imprimir_proposta', $proposta->id)}}" class="btn btn-success my-auto mr-3">Imprimir Proposta</a>

                    @if ($temProposta)
                            <a id="contrato" href="{{route('admin.contrato_proposta', $proposta->id)}}" class="btn btn-success my-auto">Assinar Proposta</a>
                    @endif

                @endif
            </div>
        </div>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-boxed">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#cliente" role="tab" aria-controls="cliente" aria-selected="true">Cliente</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#plano" role="tab" aria-controls="plano" aria-selected="false">Plano</a></li>
                        @if($credito)
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#credito" role="tab" aria-controls="credito" aria-selected="false">Credito</a></li>
                        @endif
                        @if($proposta->status_id == 3)
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#cobranca" role="tab" aria-controls="cobranca" aria-selected="false">Cobrança</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#documento" role="tab" aria-controls="documento" aria-selected="false">Documentos</a></li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="cliente" role="tabpanel">
                            @include('admin.propostas.tab_cliente')
                        </div>
                        <div class="tab-pane" id="plano" role="tabpanel">
                            @include('admin.propostas.tab_plano')
                        </div>
                        @if($credito)
                            <div class="tab-pane" id="credito" role="tabpanel">
                                <div class="card my-3">
                                    <div class="card-header">
                                        <h3>Credito</h3>
                                    </div>
                                    <div class="card-body">
                                        @if($proposta->status_id == 2 || $proposta->status_id == 3)
                                            <p><b>Situação: </b> {{$proposta->status->status}}</p>
                                        @endif
                                        <p><b>Valo Aprovado: </b>R$ {{number_format($credito->valor_aprovado,2,",",".")}}</p>
                                        <p><a class="btn btn-default" href="{{url('storage\\' . $credito->anexo)}}" download><i class="fas fa-download"></i> Anexo</a></p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($proposta->status_id == 3)
                            @if(count($vendas) >= 1)
                        <div class="tab-pane" id="cobranca" role="tabpanel">
                            @include('admin.propostas.tab_cobranca')
                        </div>
                            @endif
                        <div class="tab-pane" id="documento" role="tabpanel">
                            @include('admin.propostas.tab_documento')
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $('.accordion-toggle').click(function(){
            $('.hiddenRow').hide();
            $(this).next('tr').find('.hiddenRow').show();
        });
    </script>
@endsection
