<!-- Modal -->
<div class="modal fade" id="aprovarModal" tabindex="-1" role="dialog" aria-labelledby="aprovarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aprovar Proposta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="form_aprovar" action="{{ route("admin.aprovar_proposta") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="valor_aprovado">Valor Aprovado</label>
                        <input class="form-control" type="text" name="valor_aprovado" id="valor_aprovado" value="{{ old('valor_aprovado', '') }}">
                    </div>


                    <div class="form-group">
                        <label for="image">Anexo</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="image">Selecione o anexo</label>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{$proposta->id}}">

                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" form="form_aprovar" class="btn btn-primary">Aprovar</button>
            </div>
        </div>
    </div>
</div>
