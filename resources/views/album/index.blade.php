<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('themes/css/layout.css') }}">
</head>

<body>
    <img class="background" src="themes/img/background.png">
    <div class="inferior">
        <div class="modal-body">
            <form>
                <label class="my-2 mr-2" for="inlineFormCustomSelectPref">Digite uma palavra chave:</label>
                <div class="form-row align-items-center">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" id="album" name="album"
                                placeholder="Min">
                            <div class="input-group-append">
                                <button type="submit" class="album_create btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 my-1">
                        <button type="button" data-toggle="modal" data-target="#cadastrarAlbum"
                            class="btn btn-primary">Adicionar um Álbum </button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="faixa modal-body">
            <table id="tabela_album" class="display">
                <thead>
                    <tr style="font-family: Arial, Helvetica, sans-serif">
                        <td style='text-align:right;vertical-align:left' width="5%"></td>
                        <td width="15%">Nome</td>
                        <td style='text-align:left;vertical-align:left' width="35%">Ano</td>

                    </tr>
                </thead>
                <tbody>
                    @foreach($albuns as $album)
                    @if($album->count() > 0)
                    <tr>
                        <td style='text-align:right;vertical-align:left'>

                            <a type="button" id="{{$album->id}}" class="edit_album btn btn-emergency btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            
                            <a type="button" id="{{$album->id}}" class="del_album btn btn-emergency btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        <td>{{ $album->nome }}</td>
                        <td> {{ $album->ano }}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('album.modal.create')
    @include('album.modal.edit')

    <div class="cabecalho">
        <a href="inicio">
            <img class="logo" src="themes/img/logo.png">
        </a>
        <span class="discografia">Discograﬁa</span>
    </div>
    <br>


    <!-- Include Js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js">
    </script>
    <script src="{{ asset('themes/js/album.js') }}" type="text/javascript" async="true" defer></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js">
    </script>
    <script>
    $('#tabela_album').DataTable({
        searching: false,
        pageLength: 5,
        lengthMenu: [
            [2, 5, 7],
            [2, 5, 7],
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
        }
    });
    </script>
</body>

</html>