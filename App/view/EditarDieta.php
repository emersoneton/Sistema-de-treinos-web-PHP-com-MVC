<?php
require_once '../Controller/Session.php';
require_once '../Controller/Seguranca.php';
require_once '../Controller/ControllerPerfil.php';
require_once '../Controller/ControllerRefeicao.php';
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>
<body>
<?php include('../view/Menu.php') ?>
<br>
<br>
<br>
<br>
<div align="center">
    <h2> Editar Dieta </h2>
</div>
<div class="container">
    <?php
    $id_refeicao=$_GET['id'];
    $resultado=buscarTodoIdRefeicao($id_refeicao)?>
    <form name="form1" action="../Controller/ControllerRefeicao.php?id=<?=$id_refeicao?>&acao=atualizar" method="post">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Nome Dieta: </label>
                <input name="nomeReceicao" type="text"  required class="form-control" id="nomeTreino"  value="<?=$resultado[0]?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Descrição da Dieta </label>
                <textarea name="descricaoRefeicao"   class="form-control"  ><?=$resultado[1]?></textarea>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group col-md-8">

            </div>
            <div class="form-group col-md-4">
                <button type="submit"  style="background-color: #FF7F50;" class="btn btn-dark btn-lg btn-block">Atualizar</button>
            </div>
        </div>
    </form>
</div>
<br>
<br>
<br>
<?php include('../view/footer.php') ?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>





