<?php
require_once '../Controller/Session.php';
require_once '../Controller/ControllerAvaliacao.php';
require_once '../Controller/ControllerFichaUsuario.php';
require_once '../Controller/ControllerTreino.php';
require_once '../Controller/ControllerRefeicao.php';
?>
<!doctype html>
<html lang="br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ficha</title>
</head>
<body>
<?php include('../view/Menu.php') ?>
<br>
<br>
<br>
<?php
if(isset($_SESSION['mensagem_avaliacao'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php
        echo $_SESSION['mensagem_avaliacao'];
        unset($_SESSION['mensagem_avaliacao']);

        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>
<br>
<br>
<br>
<br>
<?php  $usuario=dadosusuario()?>
<div class="text-center">
<div class="badge badge-secondary text-wrap" style="width: 98%;">
    <h4>Ficha <?=$usuario[0]?></h4>
</div>
</div>
<br>
<br>
<br>
<div class="container-fluid ">
    <div class="row">
        <div class="col-xs-12 col-md-12 text-center d-none d-md-block">
            <a href="#" class="thumbnail">
                <img class="img-fluid img-thumbnail"src="../../images/avaliacao.png" width="100%"  alt="">
            </a>
        </div>
        <div class="col-xs-12 col-md-12 text-center d-block d-sm-none">
            <a href="#" class="thumbnail">
                <img class="img-fluid img-thumbnail"src="../../images/avaliacao-mini.png" width="100%" alt="">
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <a href="CadastraAvaliacao.php"  style="background-color: #FF7F50;" class="btn btn-dark">Cadastrar Avaliacao</a>
        </div>
        <div class="col-6">

        </div>
    </div>
    <br>
    <div class="table ">
        <table class="table table-responsive-xl" id="minhaTabela">

            <thead>
            <tr>
                <th  class="table-dark" style='width: 20%;background-color: #FF7F50;'>Avaliacao</th>
                <th class="table-dark" style='width: 40%;background-color: #FF7F50;'>Data</th>
                <th class="table-dark text-center" style='width: 5%;background-color: #FF7F50;'>Excluir</th>
                <th class="table-dark text-center" style='width: 5%;background-color: #FF7F50;'>visualizar</th>
                <th class="table-dark text-center" style='width: 5%;background-color: #FF7F50;'>Editar</th>
            </tr>
            </thead>
            <!-- tras consulta de avaliacao vinculado a ficha do aluno -->
            <?php $resultado=buscarAvaliacao();
            if(isset($resultado)){
                foreach ($resultado as $linhas){
                    ?>
                    <tbody>
                    <tr>
                        <td><?=$usuario[0]," ",$usuario[1]?></td>
                        <td><?=$linhas['data_avaliacao']?></td>
                        <td class="text-center"><a href="../Controller/ControllerAvaliacao.php?id=<?=$linhas['id_avaliacao']?>&acao=excluir"><img  title="Excluir Avaliacao" src="../../images/delete.png"></a>&nbsp;
                        <td class="text-center"> <a href="../Controller/ControllerAvaliacao.php?id=<?=$linhas['id_avaliacao']?>&acao=visualizar"><img title="Visualizar Avaliacao"src="../../images/visualizar.png"></a>&nbsp;</td>
                        <td class="text-center">  <a href="../Controller/ControllerAvaliacao.php?id=<?=$linhas['id_avaliacao']?>&acao=editar"><img title="editar Avaliacao"src="../../images/editar.png"></a></td>
                        </td>
                    </tr>
                    </tbody>

                <?php }}?>
        </table>
    </div>
</div>
<!--  Treinos -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-12 text-center d-none d-md-block">
            <a href="#" class="thumbnail">
                <img class="img-fluid img-thumbnail"src="../../images/treino.png" width="100%" alt="">
            </a>
        </div>
        <div class="col-xs-12 col-md-12 text-center d-block d-sm-none">
            <a href="#" class="thumbnail">
                <img class="img-fluid img-thumbnail"src="../../images/treino-mini.png" width="100%" alt="">
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <a href="CadastroTreino.php"  style="background-color: #FF7F50;" class="btn btn-dark">Cadastrar Treinos</a>
        </div>
        <div class="col-6">

        </div>
    </div>
    <br>
    <div class="table">
        <table class="table-striped table-responsive-xl" id="minhaTabela">
            <thead>
            <tr>
                <th  class="table-dark" style='width: 20%;background-color: #FF7F50;'>Treino</th>
                <th class="table-dark" style='width: 40%;background-color: #FF7F50;'>Descrição</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>Excluir</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>visualizar</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>Editar</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>Exercicios</th>
            </tr>
            </thead>
            <!-- tras consulta da treinos vinculdas ao usuario-->
            <?php $resultado= buscarTodosTreinos();
            if(isset($resultado)&& $resultado!= null){
                foreach ($resultado as $linhas){
                    ?>
                    <tbody>
                    <tr>
                        <td><?=$linhas['nome_treino']?></td>
                        <td><?=$linhas['data_criacao']?></td>
                        <td class="text-center"><a href="../Controller/ControllerTreino.php?id=<?=$linhas['id_treino']?>&acao=excluir"><img  title="Excluir Avaliacao" src="../../images/delete.png"></a>&nbsp;</td>
                        <td class="text-center"> <a href="../view/VisualizarTreino.php?id=<?=$linhas['id_treino']?>"><img title="Visualizar Avaliacao"src="../../images/visualizar.png"></a>&nbsp;</td>
                        <td class="text-center">  <a href="../Controller/ControllerTreino.php?id=<?=$linhas['id_treino']?>&acao=editar"><img title="editar Avaliacao"src="../../images/editar.png"></a></td>
                        <td class="text-center">  <a href="../view/CadastroExercicio.php?id=<?=$linhas['id_treino']?>"><img title="editar Avaliacao"src="../../images/adcionar.png"></a></td>

                    </tr>
                    </tbody>

                <?php }}?>
        </table>
    </div>
</div>
<!-- Dietas -->
<div class="container-fluid ">
    <div class="row ">
        <div class="col-xs-12 col-md-12 text-center d-none d-md-block">
            <a href="#" class="thumbnail">
                <img class="img-fluid img-thumbnail"src="../../images/dieta.png" width="100%" alt="">
            </a>
        </div>
        <div class="col-xs-12 col-md-12 text-center d-block d-sm-none">
            <a href="#" class="thumbnail">
                <img class="img-fluid img-thumbnail"src="../../images/dieta-mini.png" width="100%" alt="">
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <a href="CadastroRefeicao.php" style="background-color: #FF7F50;" class="btn btn-dark">Cadastrar Dietas</a>
        </div>
        <div class="col-6">

        </div>
    </div>
    <br>
    <div class="table">
        <table class="table-striped table-responsive-xl" id="minhaTabela">

            <thead>
            <tr>
                <th  class="table-dark" style='width: 20%;background-color: #FF7F50;'>Dieta</th>
                <th  class="table-dark" style='width: 40%;background-color: #FF7F50;'>Data</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>Excluir</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>visualizar</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>Editar</th>
                <th class="table-dark" style='width: 1%;background-color: #FF7F50;'>Alimento</th>
            </tr>
            </thead>
            <!-- tras consulta das dietas dos alunos -->
            <?php $resultado=buscarTodasRefeicao();
            if(isset($resultado) && $resultado!= null){
                foreach ($resultado as $linhas){
                    ?>
                    <tbody>
                    <tr>

                        <td><?=$linhas['nome_refeicao']?></td>
                        <td><?=$linhas['data_criacao']?></td>
                        <td class="text-center"><a href="../Controller/ControllerRefeicao.php?id=<?=$linhas['id_refeicao']?>&acao=excluir"><img  title="Excluir Avaliacao" src="../../images/delete.png"></a>&nbsp;</td>
                        <td class="text-center"> <a href="../view/VisualizaDieta.php?id=<?=$linhas['id_refeicao']?>"><img title="Visualizar Avaliacao"src="../../images/visualizar.png"></a>&nbsp;</td>
                        <td class="text-center">  <a href="../Controller/ControllerRefeicao.php?id=<?=$linhas['id_refeicao']?>&acao=editar"><img title="editar Avaliacao"src="../../images/editar.png"></a></td>
                        <td class="text-center">  <a href="../view/CadastroAlimento.php?id=<?=$linhas['id_refeicao']?>"><img title="editar Avaliacao"src="../../images/adcionar.png"></a></td>

                        <!--<td><a href="../Controller/ControllerProfessorUsuario.php?id=<?//=$linhas['id_usuario']?>" class="btn btn-secondary">Vincular</a></td>-->
                    </tr>
                    </tbody>

                <?php }}?>
        </table>
    </div>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

