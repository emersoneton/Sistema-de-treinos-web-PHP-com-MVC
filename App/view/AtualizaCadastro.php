<?php
require_once '../Controller/Session.php';
require_once '../Controller/Seguranca.php';
require_once '../Controller/ControllerPerfil.php';
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Aluno</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>
<body>
<?php include('../view/Menu.php') ?>
<br>
<br>
<br>
<form name="form1" action="../Controller/ControllerPerfil.php" method="post">
    <div align="center">
        <br><br>
        <h2> Atualiza Cadastro </h2>
    </div>
    <br>
    <br>
    <div class="container">
        <?php
        $resultado=carregaPerfil($_SESSION['id_usuario'],$_SESSION['acesso']);

        ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nome</label>
                <input name="nome" type="text"  value='<?=$resultado[0]?>' required class="form-control" id="inputEmail4">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Sobrenome</label>
                <input name="sobrenome"  required type="text" value='<?=$resultado[1]?>'class="form-control" id="inputPassword4">
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">E-mail</label>
                <input name="email" type="email" value='<?=$resultado[3]?>'  required class="form-control" id="inputEmail4">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Telefone Celular</label>
                <input name="telefone"  required type="text" value='<?=$resultado[2]?>' class="form-control" id="telefone">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Endereço</label>
                <input name="endereco" type="text" value='<?=$resultado[4]?>' class="form-control" id="inputEmail4">
            </div>
            <div class="form-group col-md-1">
                <label for="inputPassword4">Numero</label>
                <input name="numero" type="number"  value='<?=$resultado[5]?>'class="form-control" id="inputPassword4">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">CEP</label>
                <input name="cep" type="text" value='<?=$resultado[6]?>'class="form-control" id="cep">
            </div>
            <div class="form-group col-md-2">
                <label for="inputPassword4">Complemento</label>
                <input name="complemento" type="text"  value='<?=$resultado[7]?>'class="form-control" id="inputPassword4">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="inputZip">Pais</label>
                <input name="pais" type="text"  value='<?=$resultado[8]?>'class="form-control" id="inputZip">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCity">Cidade</label>
                <input name="cidade" type="text" value='<?=$resultado[9]?>' class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-1">
                <label for="inputZip">Estado</label>
                <input name="estado" type="text" value='<?=$resultado[10]?>'class="form-control" id="inputZip">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">

            </div>
            <div class="form-group col-md-4">
                <button type="submit"  style="background-color: #FF7F50;" class="btn btn-dark btn-lg btn-block"  >Atualizar</button>
            </div>
        </div>
        <script type="text/javascript">
            $("#cep").mask("000.000.000-00");
            $("#telefone").mask("(00) 0.0000-0000");
        </script>
    </div>
</form>



<?php include('../view/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



