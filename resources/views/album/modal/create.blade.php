<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarAlbum" tabindex="-1" role="dialog" aria-labelledby="modalCadastrarAlbumLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastrarAlbumLabel"> Cadastro do Album </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form method="post" href="#">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="nome" class="form-label">Nome do Album*</label>
                                <input type="text" class="form-control" name="nome" id="nome">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Ano do Album*</label>
                                <input type="text" class="form-control" name="ano" id="ano">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-submit ajaxalbum-add">Salvar Album
                </button>
            </div>
        </div>
    </div>
</div>
<!-- / Modal Cadastrar -->