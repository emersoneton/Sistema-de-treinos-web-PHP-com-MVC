<?php
require_once '../Controller/Session.php';
require_once '../Controller/Seguranca.php';
require_once '../Controller/ControllerPerfil.php';
require_once '../Controller/ControllerExercicio.php';
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercicios</title>

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
    <h2> Editar Exercicio </h2>
</div>
<br>
<br>
<br>
<div class="container">
    <?php $id=$_GET['id'];
    $resultado=buscarIdExercicio($id);
    ?>
    <form name="form1" action="../Controller/ControllerExercicio.php?id=<?=$id?>&acao=atualizar" method="post">
        <div class="row">
            <div class="form-group col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome Exercicio: </label>
                        <input name="nomeExercicio" type="text"  required class="form-control" value="<?=$resultado[0]?>"  >
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Serie: </label>
                        <input name="serie" type="text"  required class="form-control"  id="serie" value="<?=$resultado[1]?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputEmail4">Repetições: </label>
                        <input name="repeticao" type="text"  required class="form-control" id="repeticoes" value="<?=$resultado[2]?>" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Descrição </label>
                        <textarea name="descricaoExercicio" required   class="form-control"  ><?=$resultado[3]?></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">

                    </div>

                    <div class="form-group col-md-4">
                        <button type="submit"  style="background-color: #FF7F50;" class="btn btn-dark btn-lg btn-block">Atualizar</button>
                    </div>
                </div>
    </form>
</div>
</div>
</div>

<?php include('../view/footer.php') ?>

<script type="text/javascript">
    $("#serie").mask("000");
    $("#repeticoes").mask("000");
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



