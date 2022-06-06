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
            <form action="{{ route('pesquisa-faixa.index')}}">
                <label class="my-2 mr-2" for="inlineFormCustomSelectPref">Digite uma palavra chave:</label>

                <div class="form-row align-items-center">
                    <div class="col-sm-10 my-1">
                        <label class="sr-only" for="inlineFormInputName">Name</label>
                        <input type="text" class="form-control" id="faixa" name="faixa" placeholder="Min">
                    </div>
                    <div class="col-sm-2 my-1">
                        <button type="submit" data-toggle="modal" data-target="#cadastrarFaixa"
                            class="btn btn-primary">Procurar</button>

                    </div>
                </div>
            </form>
            <br>
            @foreach($faixas as $faixa)
            @if($faixa->count() > 0)
            <span class="album modal-body py-0">{{$faixa->first()->album->nome}},
                {{$faixa->first()->album->ano}}</span>
            <div class="faixa modal-body">
                <table id="tabela_faixa">
                    <thead>
                        <tr style="font-family: Arial, Helvetica, sans-serif">
                            <td width="4%">Nº</td>
                            <td width="5%">Faixa</td>
                            <td style='text-align:right;vertical-align:left' width="70%">Duração</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faixa as $playlist)
                        <tr>
                            <td>{{ $playlist->numero_faixa }}</td>
                            <td> {{ $playlist->nome_faixa }}</td>
                            <td style='text-align:right;vertical-align:left'>{{ gmdate("i:s", ($playlist->duracao_faixa)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
            @endforeach
        </div>
    </div>

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

</body>

</html>