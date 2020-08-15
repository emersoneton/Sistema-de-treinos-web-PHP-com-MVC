<?php
require_once '../Controller/Session.php';
require_once '../Controller/Seguranca.php';
require_once '../Controller/ControllerPerfil.php';
require_once '../Controller/ControllerAlimento.php';
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alimento</title>

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
    <h2> Cadastro de alimentos da dieta </h2>
</div>
<br>
<br>
<br>
<div class="container">
    <?php $id=$_GET['id'];
    $_SESSION['id_refeicao']=$id;
    ?>
    <form name="form1" action="../Controller/ControllerAlimento.php?id=<?=$id?>&acao=cadastro"" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Nome Alimento: </label>
                        <input name="nomeAlimento" type="text"  required class="form-control" id="nomeExercicio" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Quantidade </label>
                        <input name="quantidade" type="text"  required class="form-control"  >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Horario </label>
                        <input name="horario" type="time"  required class="form-control" id="horario" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <button type="submit"  style="background-color: #FF7F50;" class="btn btn-dark btn-lg btn-block">Cadastrar</button>
                    </div>
                    <div class="form-group col-md-4">
                        <a href="../view/FichaAluno.php"  style="background-color: #FF7F50;" class="btn btn-dark btn-lg btn-block">Voltar</a>
                    </div>
                    <div class="form-group col-md-8">

                    </div>
                </div>
    </form>
</div>
<div class="form-group col-md-6">
    <div align="center">
        <h5> Alimentos Cadastrados </h5>
    </div>
    <table class="table table-responsive-xl">

        <thead>
        <tr>
            <th scope="col" style='width: 30%;background-color: #FF7F50;'>Nome  </th>
            <th scope="col" style='width: 30%;background-color: #FF7F50;'>Qtd </th>
            <th scope="col" style='width: 300%;background-color: #FF7F50;'>Horario  </th>
            <th scope="col" style='width: 5%;background-color: #FF7F50;'>Excluir  </th>
            <th scope="col" style='width: 5%;background-color: #FF7F50;'>Editar  </th>

        </tr>
        </thead>
        <?php
        $resultado=buscarAlimentos($id);
        if(isset($resultado)){
            foreach ($resultado as $linhas){
                ?>
                <tbody>
                <tr>
                    <td><?=$linhas['alimento']?></td>
                    <td><?=$linhas['quantidade']?></td>
                    <td><?=$linhas['horario_refeicao']?></td>
                    <td class="text-center">  <a href="../Controller/ControllerAlimento.php?id=<?=$linhas['id_alimento']?>&acao=excluir"><img title="editar Avaliacao"src="../../images/delete.png"></a></td>
                    <td class="text-center">  <a href="../Controller/ControllerAlimento.php?id=<?=$linhas['id_alimento']?>&acao=editar"><img title="editar Avaliacao"src="../../images/editar.png"></a></td>
                </tr>
                </tbody>

            <?php }}?>
    </table>

</div>
</div>
</div>

<?php include('../view/footer.php') ?>

<script type="text/javascript">
    $("#horario").mask("00:00");

</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



