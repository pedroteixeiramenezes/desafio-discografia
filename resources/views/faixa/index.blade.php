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
        <br>
        <div class="modal-body">
            <br>
            <form>
                <label class="my-2 mr-2" for="inlineFormCustomSelectPref">Digite uma palavra chave:</label>
                <div class="form-row align-items-center">
                    <div class="col-sm-10 my-1">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" id="faixa" name="faixa"
                                placeholder="Min">
                            <div class="input-group-append">
                                <button type="submit" class="album_create btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 my-1">
                        <button type="button" data-toggle="modal" data-target="#cadastrarFaixa"
                            class="btn btn-primary">Adicionar uma Faixa </button>
                    </div>
                </div>
            </form>
            <br>
            @if(isset($faixas))
            @foreach($faixas as $key => $faixa)
            @if(count($faixa) > 0)
            <span class="album modal-body py-0">{{$faixa[0]['album']['nome']}},
                {{$faixa[0]['album']['ano']}}</span>
            <div class="faixa modal-body">
                <table id="tabela_faixa">
                    <thead>
                        <tr style="font-family: Arial, Helvetica, sans-serif">
                            <td width="7%"></td>
                            <td width="5%">Nº</td>
                            <td width="30%">Faixa</td>
                            <td style='text-align:right;vertical-align:right' width="35%">Duração</td>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faixa as $playlist)
                        <tr>
                            <td>

                                <a type="button" id="{{$playlist['id']}}" class="edit_faixa btn btn-emergency btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a type="button" id="{{$playlist['id']}}" class="del_faixa btn btn-emergency btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                            <td>{{ $playlist['numero_faixa'] }}</td>
                            <td> {{ $playlist['nome_faixa'] }}</td>
                            <td style='text-align:right;vertical-align:left'>
                                {{ gmdate("i:s", ($playlist['duracao_faixa'])) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @endforeach
            @endif
            <div class="pagination-block">
                {{ $faixas->links('layouts.paginationlinks') }}
            </div>
        </div>
    </div>

    @include('faixa.modal.create')
    @include('faixa.modal.edit')

    <div class="cabecalho">
        <a href="inicio">
            <img class="logo" src="themes/img/logo.png">
        </a>
        <span class="discografia">Discograﬁa</span>
    </div>
    <br>

    <style>
    .pagination-block {
        position: absolute;
        top: 700px;
        left: 40px;
    }
    </style>



    <!-- Include Js -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js">
    </script>
    <script src="{{ asset('themes/js/faixa.js') }}" type="text/javascript" async="true" defer></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js">
    </script>
    <script>
    $('#tabela_faixa').DataTable({

            searching: false,
            pageLength: 5,
            lengthMenu: [
                [2, 5, 7],
                [2, 5, 7],
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
            }
        }

    );
    </script>
</body>

</html>