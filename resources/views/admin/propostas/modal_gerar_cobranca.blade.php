<!-- Modal -->
<div class="modal fade" id="gerarCobrancaModal{{$v->id}}" role="dialog" aria-labelledby="gerarCobrancaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gerarCobrancaModalLabel">Gerar Cobrança</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="form_gerarCobranca{{$v->id}}" action="{{ route("admin.gerar_cobranca") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="descricao_cobranca">Descrição</label>
                        <input class="form-control" required type="text" name="descricao_cobranca" id="descricao_cobranca" value="{{ old('descricao_cobranca', '') }}">
                    </div>


                    <div class="form-group">
                        <label for="date-input">Data Vencimento</label>
                        <input class="form-control" required id="date-input" type="date" name="dataVencimento" placeholder="date">
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input class="form-control dinheiro" required type="text" name="valor" id="valor" value="{{$v->valor}}">
                    </div>

                    <input type="hidden" name="id" value="{{$proposta->id}}">
                    <input type="hidden" name="IDVenda" value="{{$v->id}}">

                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" form="form_gerarCobranca{{$v->id}}" class="btn btn-primary">Gerar</button>
            </div>
        </div>
    </div>
</div>
