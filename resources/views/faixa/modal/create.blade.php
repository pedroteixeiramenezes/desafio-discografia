<!-- Modal Cadastrar -->
<div class="modal fade" id="cadastrarFaixa" tabindex="-1" role="dialog" aria-labelledby="modalCadastrarFaixaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastrarFaixaLabel"> Cadastro da Faixa </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="saveform_errList_faixa"></ul>
                <form method="post" href="#">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="form-label">Nome do Album*</label>
                                <select id="albuns_id" name="albuns_id" class="form-control select2 select2-danger"
                                    data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <option selected="selected" disabled selected>Selecione um Album...</option>
                                    @foreach ($albuns as $album)
                                    <option value="{{$album->id}}"
                                        {{ old('albuns_id') == $album->id ? 'selected' : ''}}>
                                        {{$album->nome}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Nome*</label>
                                <input type="text" class="form-control" id="nome_faixa" name="nome_faixa">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Número*</label>
                                <input type="text" class="form-control" id="numero_faixa" name="numero_faixa">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label">Duração (em segundos)</label>
                                <input type="integer" class="form-control" id="duracao_faixa" name="duracao_faixa">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary btn-submit ajaxfaixa-add">Salvar Faixa
                </button>
            </div>
        </div>
    </div>
</div>
<!-- / Modal Cadastrar -->