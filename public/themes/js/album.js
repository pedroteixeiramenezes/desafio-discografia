"use strict"

$(document).ready(function() {

    $(document).on('click', '.ajaxalbum-add', function(e) {
        e.preventDefault();

        var nome = $('#nome').val();
        var ano = $('#ano').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: 'album',
            data: { nome: nome, ano: ano },
            dataType: 'json',
            success: function(data) {
                if ($.isEmptyObject(data.errors)) {
                    swal({
                            title: "Album Adicionado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 5 segundos',
                            timer: 5000,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {
                            location.reload();
                            $('#cadastrarAlbum').modal('hide');
                        });
                } else {
                    printErrorMsg(data.errors);

                }
            }
        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    });

    $(document).on('click', '.edit_album', function(e) {
        e.preventDefault();
        var album_id = $(this).attr('id');
        $('#modalEditarAlbum').modal("show");
        $.ajax({
            type: "GET",
            url: "album/edit-album/" + album_id,
            success: function(response) {
                console.log(response);
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#modalEditarAlbum').modal('hide');
                } else {

                    $('#edit_nome').val(response.album.nome);
                    $('#edit_ano').val(response.album.ano);
                    $('#edit_album_id').val(album_id);
                }
            }
        });
    });

    $(document).on('click', '.ajaxalbum-update', function(e) {
        e.preventDefault();
        var album_id = $('#edit_album_id').val();
        console.log(album_id);

        var data = {
            'nome': $('#edit_nome').val(),
            'ano': $('#edit_ano').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                    .attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: "album/update-album/" + album_id,
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
                            title: "Album Atualizado com Sucesso!",
                            icon: "success",
                            text: 'Fechando em 5 segundos',
                            timer: 5000,
                            showConfirmButton: false, //hide OK button
                            showConfirmButton: false //optional, disable outside click for close the modal
                        })
                        .then((dismiss) => {

                            location.reload();

                            $('#modalEditarAlbum').modal('hide');
                        });
                }
            }
        });

    });

    $(document).on('click', '.del_album', function(e) {
        e.preventDefault();
        var album_id = $(this).attr('id');
        $('#deleteing_id').val(album_id);

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
                        "id": album_id,
                    }

                    $.ajax({
                        type: "DELETE",
                        url: "album/delete-album/" + album_id,
                        data: data,
                        success: function(response) {
                            location.reload();

                        }
                    });
                }
            });
    });
});