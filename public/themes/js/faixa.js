"use strict"

$(document).ready(function() {

    $(document).on('click', '.ajaxfaixa-add', function(e) {
        e.preventDefault();

        var data = {
            'albuns_id': $('#albuns_id').val(),
            'nome_faixa': $('#nome_faixa').val(),
            'numero_faixa': $('#numero_faixa').val(),
            'duracao_faixa': $('#duracao_faixa').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: 'faixa',
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.status == 400) {
                    $('#saveform_errList_faixa').html("");
                    $('#saveform_errList_faixa').addClass(
                        'alert alert-danger');
                    $.each(response.errors, function(
                        key,
                        err_values) {
                        $('#saveform_errList_faixa')
                            .append('<li>' +
                                err_values +
                                '</li>'
                            );
                    });
                } else {
                    swal({
                            title: "Faixa Adicionado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 5 segundos',
                            timer: 5000,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {
                            location.reload();
                            $('#cadastrarFaixa').modal('hide');
                        });
                }


            }
        });

    });

    $(document).on('click', '.edit_faixa', function(e) {
        e.preventDefault();
        var faixa_id = $(this).attr('id');
        $('#modalEditarFaixa').modal("show");
        $.ajax({
            type: "GET",
            url: "faixa/edit-faixa/" + faixa_id,
            success: function(response) {
                console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass(
                        'alert alert-success');
                    $('#success_message').text(response
                        .message);
                    $('#modalEditarFaixa').modal('hide');
                } else {
                    $('#edit_albuns_id').val(response.faixa.albuns_id),
                        $('#edit_nome_faixa').val(response.faixa.nome_faixa),
                        $('#edit_numero_faixa').val(response.faixa.numero_faixa),
                        $('#edit_duracao_faixa').val(response.faixa.duracao_faixa),
                        $('#edit_faixa_id').val(faixa_id);
                }
            }
        });
    });

    $(document).on('click', '.ajaxfaixa-update', function(e) {
        e.preventDefault();
        var faixa_id = $('#edit_faixa_id').val();

        var data = {
            'albuns_id': $('#edit_albuns_id').val(),
            'nome_faixa': $('#edit_nome_faixa').val(),
            'duracao_faixa': $('#edit_duracao_faixa').val(),
            'numero_faixa': $('#edit_numero_faixa').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: "faixa/update-faixa/" + faixa_id,
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.status == 400) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass(
                        'alert alert-danger');
                    $.each(response.errors, function(
                        key,
                        err_value) {
                        $('#update_msgList')
                            .append('<li>' +
                                err_value +
                                '</li>');
                    });


                } else if (response.status == 404) {

                    $('#update_msgList').html("");
                    $('#success_message').addClass(
                        'alert alert-success');
                    $('#success_message').text(response
                        .message);

                } else {
                    swal({
                            title: "Faixa Atualizado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 5 segundos',
                            text: 'Fechando em 5 segundos',
                            timer: 5000,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {

                            location.reload();
                            $('#modalEditarFaixa').modal('hide');

                        });
                }
            }
        });

    });

    $(document).on('click', '.del_faixa', function(e) {
        e.preventDefault();
        var faixa_id = $(this).attr('id');
        $('#deleteing_id').val(faixa_id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr(
                        'content')
            }
        });

        swal({
                title: "Tem certeza?",
                text: "Uma vez excluído, você não poderá recuperar este arquivo!",
                icon: "info",
                buttons: true,
                timer: 5000,
                showConfirmButton: false, //hide OK button
                showConfirmButton: false //optional, disable outside click for close the modal
            })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name=token]').val(),
                        "id": faixa_id,
                    }

                    $.ajax({
                        type: "DELETE",
                        url: "faixa/delete-faixa/" + faixa_id,
                        data: data,
                        success: function(response) {
                            location.reload();
                        }
                    });
                }
            });
    });
});