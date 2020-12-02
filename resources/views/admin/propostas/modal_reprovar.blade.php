<!-- Modal -->
<div class="modal fade" id="reprovarModal" tabindex="-1" role="dialog" aria-labelledby="reprovarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reprovar Proposta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" id="form_reprovar" action="{{ route("admin.reprovar_proposta") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="valor_aprovado2">Valor Aprovado</label>
                        <input class="form-control" type="text" name="valor_aprovado2" id="valor_aprovado2" value="{{ old('valor_aprovado2', '') }}">
                    </div>


                    <div class="form-group">
                        <label for="image">Anexo</label>
                        <div class="custom-file">
                            <input type="file" name="image2" class="custom-file-input" id="image2">
                            <label class="custom-file-label" for="image2">Selecione o anexo</label>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{$proposta->id}}">

                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" form="form_reprovar" class="btn btn-primary">Reprovar</button>
            </div>
        </div>
    </div>
</div>
