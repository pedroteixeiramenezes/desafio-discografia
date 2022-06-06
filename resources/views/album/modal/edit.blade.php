<!-- Modal Editar -->
<div class="modal fade" id="modalEditarAlbum" tabindex="-1" role="dialog" aria-labelledby="modalCadastrarAlbumLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastrarAlbumLabel"> Editar Album
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="edit_album_id">

                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="form-label">Nome do Album*</label>
                            <span id="error_nome" class="text-danger ms-3"></span>
                            <input type="text" id="edit_nome" class="form-control nome">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Ano do Album*</label>
                            <span id="error_ano" class="text-danger ms-3"></span>
                            <input type="text" id="edit_ano" class="form-control ano">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" aria-hidden="true" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary ajaxalbum-update">Atualizar Album</button>
            </div>
        </div>
    </div>
</div>
<!-- / Modal Editar -->