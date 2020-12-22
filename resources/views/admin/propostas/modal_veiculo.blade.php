<!-- Modal -->
<div class="modal fade" id="veiculoModal" role="dialog" aria-labelledby="veiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="veiculoModalLabel">Veiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">




@if (count($meusVeiculos) > 0)
                        <form method="POST" id="form_veiculo" action="{{ route("admin.add_veiculo") }}" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="ref_banco_codigo">Selecione o Veiculo</label>
                            <select  required class="form-control select2" name="idVeiculo" id="idVeiculo">
                                <option value="">-- Selecione --</option>
                                @foreach($meusVeiculos as $meuV)
                                    <option value="{{$meuV->IDVeiculo}}">{{$meuV->Placa}} - {{$meuV->Descricao}})</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                                <form method="POST" id="form_veiculo" action="{{ route("admin.add_implantacao") }}" enctype="multipart/form-data">
                                    @csrf
                        <input type="hidden" name="solicitarImplantacao" value="1">
    @endif


                    <input type="hidden" name="id" value="{{$proposta->id}}">

                </form>

            </div>
            <div class="modal-footer">
                @if (count($meusVeiculos) > 0)
                <button type="submit" form="form_veiculo" class="btn btn-primary">Adicionar</button>
                @else
                    <button type="submit" form="form_veiculo" class="btn btn-primary">Solicitar Implantação</button>
                @endif
            </div>
        </div>
    </div>
</div>
