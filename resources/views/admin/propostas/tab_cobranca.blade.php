<div class="card my-3">
    <div class="card-header">
        <h3>Cobranças</h3>
    </div>


    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-responsive-sm table-striped" style="border-collapse:collapse;">
                    <thead>
                    <tr>
                        <th>DATA DE EMISSÃO</th>
                        <th>NUMERO</th>
                        <th>ITEM</th>
                        <th>DESCRIÇÃO</th>
                        <th>VALOR</th>
                        <th>STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vendas as $v)
                        @php
                            $pagamentos = \App\Models\Pagamento::where('venda_id', $v->id)->get();
                        @endphp

                        <tr colspan="6" data-toggle="collapse" data-target="#venda{{$v->id}}" class="accordion-toggle">
                            <td>{{\Carbon\Carbon::parse($v->dataVenda)->format('d/m/Y')}}</td>
                            <td>{{$v->id}}</td>
                            <td>{{$v->item}}</td>
                            <td>{{$v->descricao}}</td>
                            <td> R$ {{number_format((float)$v->valor, 2, '.', '')}}</td>
                            <td class="statuspagamento{{$v->id}}">{!! \App\Models\Venda::statusVenda($v->id, $v->valor)!!}</td>
                        </tr>
                        <tr class="p">
                            <td colspan="6" class="hiddenRow">
                                <div class="accordian-body collapse p-3" id="venda{{$v->id}}">
                                    <table class="table table-responsive-sm table-borderless">
                                        <thead>
                                        <th>PAGAMENTO</th>
                                        <th>VALOR</th>
                                        <th>DESCONTO</th>
                                        <th>PAGO</th>
                                        <th>VENCIMENTO</th>
                                        <th>EMISSÃO</th>
                                        <th>STATUS</th>
                                        <th>BOLETO</th>
                                        </thead>
                                        <tbody>
                                        @foreach($pagamentos as $p)
                                            <?php
                                            $dados = json_decode($p->gateway);
                                            $iugu = \App\Models\Pagamento::DadosIugu($dados->id);
                                            ?>
                                            <tr>
                                                <td>{{$p->tipo}}</td>
                                                <td>R$ {{$p->valor}}</td>
                                                <td>{{$p->desconto}}</td>
                                                <td>R$ {{$p->valorPago}}</td>
                                                <td>{{\Carbon\Carbon::parse($iugu['due_date'])->format('d/m/Y')}}</td>
                                                <td>{{\Carbon\Carbon::parse($p->DataEmissao)->format('d/m/Y')}}</td>
                                                <td>
                                                    @switch($iugu['status'])
                                                        @case ("pending")
                                                            <span class='badge badge-primary'>Aguardando Pagamento</span>
                                                        @break
                                                        @case ("canceled")
                                                            <span class='badge badge-danger'>Cancelado</span>
                                                        @break;
                                                        @case ("paid")
                                                            <span class='badge badge-success'>Pago</span>
                                                        @break
                                                    @endswitch
                                                </td>
                                                <td><a href="{{$iugu['secure_url']}}" target="_blank"><i class="fas fa-barcode c-icon-2xl"></i></a></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
