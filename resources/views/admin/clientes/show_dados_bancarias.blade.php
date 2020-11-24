<div class="card my-3">
    <div class="card-header">
        <h3>Referência Bancária:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ref_banco_codigo">Banco</label>
                    <input disabled class="form-control" type="text" name="ref_agencia" id="ref_agencia" value="{{$cliente->referencia_bancaria->banco_codigo ?? ''}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_agencia">Agência</label>
                    <input disabled class="form-control" type="text" name="ref_agencia" id="ref_agencia" value="{{$cliente->referencia_bancaria->agencia_codigo ?? ''}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_conta">Conta</label>
                    <input disabled class="form-control" type="text" name="ref_conta" id="ref_conta" value="{{$cliente->referencia_bancaria->conta ?? ''}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_tempo_conta">Tempo de Conta</label>
                    <input disabled class="form-control" type="text" name="ref_tempo_conta" id="ref_tempo_conta" value="{{$cliente->referencia_bancaria->tempo_de_conta ?? ''}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ref_cartao_credito">Cartão de Crédito</label>
                    <input disabled class="form-control" type="text" name="ref_cartao_credito" id="ref_cartao_credito" value="{{$cliente->referencia_bancaria->cartao_de_credito ?? ''}}">
                </div>
            </div>
        </div>
    </div>
</div>

