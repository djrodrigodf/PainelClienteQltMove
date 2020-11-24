<div class="card my-3">
    <div class="card-header">
        <h3>Plano:</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <br>
                    {!! \App\Models\Plano::meuPlano($cliente->plano) !!}
                    <br>R$ {{ $cliente->valor_plano }}
                </div>
            </div>

        </div>
    </div>
</div>

