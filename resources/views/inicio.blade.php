<html>

<!-- Required meta tags -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<body>
    <img class="background" src="themes/img/background.png">
    <div class="inferior">
        <div class="modal-body py-1">
            <br><br><br><br><br><br>
            <div class="row">

                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/26/26358.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Albúm</h5>
                            <p class="card-text">Para adicionar alguma álbum clique no botão abaixo</p>
                            <a href="album" data-toggle="modal" data-target="#cadastrarAlbum" class="btn btn-primary">Registrar</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/26/26805.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Faixa</h5>
                            <p class="card-text">Para adicionar alguma faixa clique no botão abaixo</p>
                            <a href="faixa" data-toggle="modal" data-target="#cadastrarFaixa" class="btn btn-primary">Registrar</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://icon-library.com/images/music-album-icon/music-album-icon-6.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Coletânea</h5>
                            <p class="card-text">Clique abaixo para acessar toda discografia adicionada</p>
                            <a href="pesquisa-faixa" class="btn btn-primary">Acessar</a>
                        </div>
                    </div>
                </div>
                @include('album.modal.create')

            </div>
            @include('faixa.modal.create')
        </div>
    </div>
    </div>
    <div class="cabecalho">
        <a href="inicio">
            <img class="logo" src="themes/img/logo.png">
        </a>
        <span class="discografia">Discograﬁa</span>
    </div>
    <br>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    </head>

    <style>
        body {
            margin: 0;
        }

        th {
            font-size: 16pt;
        }

        td {
            font-size: 16pt;
        }


        .album {
            font-style: normal;
            font-weight: bold;
            font-size: 17pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #231f20
        }

        .inferior {
            z-index: -1;
            margin-left: 0px;
            margin-right: 290px;
            position: absolute;
            top: 170px;
            left: 120px;
            width: 1330px;
            height: 800px;
            background-color: white;
            opacity: 80%;
            z-index: 1
        }

        .rodape-pesquisa {
            font-style: normal;
            font-weight: normal;
            font-size: 16pt;
            font-family: Century;
            color: #231f20;
            position: absolute;
            top: 30px;
            left: 25px;
        }

        .discografia {
            font-style: normal;
            font-weight: normal;
            font-size: 44pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #231f20;
            position: absolute;
            top: 40px;
            left: 1000px;

        }

        .logo {
            background-size: cover;
            background-repeat: no-repeat;
            position: absolute;
            top: 25px;
            left: 40px;
            width: 2.84in;
            height: 1.20in;
        }

        .background {
            max-width: 100%;
            height: auto;
            background-image: url('themes/img/background.png');
            background-position-x: -50px -50px;
            width: 100%;
            position: relative;
            background-size: contain;
            background-repeat: no-repeat;
            height: 100vh;
            position: absolute;
        }

        .cabecalho {
            margin-left: 120px;
            margin-right: 320px;
            position: absolute;
            top: 30px;
            width: 1330px;
            height: 150px;
            background-color: white;
            box-shadow: 0.1em 0.1em 0.3em black;
        }
    </style>

</body>

</html>