<div class="card my-3">
    <div class="card-header">
        <h3>Referências Pessoal:</h3>
    </div>
    <div class="card-body">
        @foreach($cliente->referenia_pessoals as $key => $referenia_pessoal)
            <span class="label label-info"></span>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ref_nome">Nome Completo</label>
                        <input disabled class="form-control" type="text" id="ref_nome1" value="{{ $referenia_pessoal->nome_completo }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ref_telefone">Telefone</label>
                        <input disabled class="form-control tel" type="text" id="ref_telefone1" value="{{ $referenia_pessoal->telefone }}">
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

