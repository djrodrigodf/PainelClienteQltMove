<!-- Modal -->
<div class="modal fade" id="documentosModal" tabindex="-1" role="dialog" aria-labelledby="documentosModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentosModalLabel">Documentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="form_documentos" action="{{ route("admin.anexos.store") }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" name="tipo" id="tipo">
                            <option selected disabled value="">--Selecione um tipo--</option>
                            @foreach(\App\Models\Anexo::TIPO as $tipo)
                                <option value="{{$tipo}}">{{$tipo}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="descricaodoc">Descrição</label>
                        <input class="form-control" type="text" name="descricao" id="descricaodoc" value="{{ old('descricao', '') }}">
                    </div>


                    <div class="form-group">
                        <label for="image">Anexo</label>
                        <div class="custom-file">
                            <input type="file" name="documento" class="custom-file-input" id="documento">
                            <label class="custom-file-label" for="documento">Selecione o anexo</label>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{$proposta->id}}">

                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" form="form_documentos" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>
</div>
