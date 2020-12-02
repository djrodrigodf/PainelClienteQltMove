@extends('layouts.admin')
@section('content')

    @include('admin.propostas.modal_aprovar')
    @include('admin.propostas.modal_reprovar')

    <div class="card-header">
        <div class="row d-flex">
            <div class="col-md-6">
                <h1>Titulo</h1>
            </div>
            <div class="col-md-6 d-flex align-content-center justify-content-end">
                <a id="aprovar" href="#" data-toggle="modal" data-target="#aprovarModal" class="btn btn-primary mr-3 my-auto">Aprovar</a>
                <a id="reprovar" href="#" data-toggle="modal" data-target="#reprovarModal"  class="btn btn-danger my-auto">Recusar</a>
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
                            @if($proposta->status_id == 2 || $proposta->status_id == 3)
                            <p><b>Situação: </b> {{$proposta->status->status}}</p>
                            @endif
                            <p><b>Valo Aprovado: </b>R$ {{number_format($credito->valor_aprovado,2,",",".")}}</p>
                            <p><a class="btn btn-default" href="{{url('storage\\' . $credito->anexo)}}" download><i class="fas fa-download"></i> Anexo</a></p>
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
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    @endsection
