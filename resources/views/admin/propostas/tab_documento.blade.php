<div class="card my-3">
    <div class="card-header d-flex justify-content-between">
        <h3>Documentos</h3>
        <a class="btn btn-success btn-lg" data-toggle="modal" data-target="#documentosModal"  href="#"><i class="fas fa-plus"></i></a>
    </div>

    @include('admin.propostas.modal_anexos')

    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Arquivo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($anexos as $a)
                        <tr>
                            <td>{{$a->tipo}}</td>
                            <td>{{$a->descricao}}</td>
                            <td>
                                <a class="btn btn-primary mr-3" target="_blank" href="{{url("storage\\documentos\\$proposta->id\\$a->anexo")}}"><i class="fas fa-download"></i></a>
                                <a class="btn btn-danger" href="{{route('admin.deletarAnexo', $a->id)}}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
