<!-- Modal Editar -->
<div class="modal fade" id="modalEditarFaixa" tabindex="-1" role="dialog" aria-labelledby="modalEditarFaixaLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastrarAlbumLabel"> Editar Faixa
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="edit_faixa_id">

                <div class="col-md-12">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Nome do Album*</label>
                            <select id="edit_albuns_id" name="edit_albuns_id"
                                class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger"
                                style="width: 100%;">
                                <option selected="selected" disabled selected>Selecione um Album...</option>
                                @foreach ($albuns as $album)
                                <option value="{{$album->id}}" {{ old('albuns_id') == $album->id ? 'selected' : ''}}>
                                    {{$album->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Nome*</label>
                            <span id="error_nome" class="text-danger ms-3"></span>
                            <input type="text" id="edit_nome_faixa" name="edit_nome_faixa" class="form-control nome">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Número*</label>
                            <span id="error_ano" class="text-danger ms-3"></span>
                            <input type="text" id="edit_numero_faixa" name="edit_numero_faixa" class="form-control ano">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Duração *</label>
                            <span id="error_ano" class="text-danger ms-3"></span>
                            <input type="text" id="edit_duracao_faixa" name="edit_duracao_faixa" class="form-control ano">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" aria-hidden="true" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary ajaxfaixa-update">Atualizar Faixa</button>
            </div>
        </div>
    </div>
</div>
<!-- / Modal Editar -->