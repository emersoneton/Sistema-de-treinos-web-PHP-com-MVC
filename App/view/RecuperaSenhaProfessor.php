<?php
session_start();

?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="text-center">
    <form action="../Controller/ControllerRecuperaSenhaProfessor.php" class="form-signin container" method="post">
        <img class="mb-3" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="50" height="50">
        <h1 class="h3 mb-3 font-weight-normal">Alteração de senha do Professor</h1>
        <label for="inputEmail" class="sr-only">Nome</label>
        <input name="nome" type="text" id="nome" class="form-control" placeholder="Nome" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">E-Mail</label>
        <input name="email" type="email" id="email" class="form-control" placeholder="E-Mail" required>
        <br>
        <button  style="background-color: #FF7F50;" class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
        <a   href="../view/LoginProfessor.php" style="background-color: #FF7F50;" class="btn btn-lg btn-primary btn-block" >Voltar</a>

            <h3><?php
                if(isset($_SESSION['mensagem']))
                {
                    echo $_SESSION['mensagem'];
                    unset($_SESSION['mensagem']);
                }
            ?></h3>

        <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
    </form>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>