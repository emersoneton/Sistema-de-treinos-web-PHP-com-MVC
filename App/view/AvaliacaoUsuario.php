<?php
require_once '../Controller/Session.php';
require_once '../Controller/ControllerAvaliacao.php';
?>
<!doctype html>
<html lang="br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Avaliação</title>
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
<div class="text-center">
    <h2>Avaliações</h2>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
          <a href="CadastraAvaliacao.php"  style="background-color: #FF7F50;" class="btn btn-dark">Cadastrar</a>
        </div>
        <div class="col-6">

        </div>
    </div>
    <br>
    <div class="table">
        <table class="table-striped table-responsive-xl" id="minhaTabela">

            <thead>
            <tr>

                <th style='width: 20%;'>Avaliacao</th>
                <th style='width: 40%;'>Data Avaliacao</th>
                <th style='width: 1%;'>Excluir</th>
                <th style='width: 1%;'>visualizar</th>
                <th style='width: 1%;'>Editar</th>
            </tr>
            </thead>
            <!-- tras consulta do usuarios não vinculados ao professor-->
            <?php $resultado=buscarAvaliacao();
            if(isset($resultado)){
                foreach ($resultado as $linhas){
                    ?>
                    <tbody>
                    <tr>
                        <td><?=$_SESSION['usuario'],"",$_SESSION['sobrenome_usuario']?></td>
                        <td><?=$linhas['data_avaliacao']?></td>
                        <td><a href="../Controller/ControllerAvaliacao.php?tela=1&id=<?=$linhas['id_avaliacao']?>&acao=excluir"><img  title="Excluir Avaliacao" src="../../images/delete.png"></a>&nbsp;</td>
                        <td> <a href="../Controller/ControllerAvaliacao.php?tela=1&id=<?=$linhas['id_avaliacao']?>&acao=visualizar"><img title="Visualizar Avaliacao"src="../../images/visualizar.png"></a>&nbsp;</td>
                        <td>  <a href="../Controller/ControllerAvaliacao.php?tela=1&id=<?=$linhas['id_avaliacao']?>&acao=editar"><img title="editar Avaliacao"src="../../images/editar.png"></a></td>
                       </td>

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


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function(){
        $('#minhaTabela').DataTable({
            "language": {
                "info":"Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty":"Mostrando 0 a 0 de 0 Registros",
                "search":"Procurar:",
                "lengthMenu":     "Mostrando _MENU_ Registros",
                "zeroRecords":"Não foi encontrado nenhum registro",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Proximo",
                    "previous":   "Anterior"
                },
            }
        });

        $('#minhaTabela').DataTable( {
            "ajax": baseURL,
            "deferRender": true,
            "order": [[ 0, "asc" ]],
            "pageLength": 300,
            "columnDefs": [
                { "width": "40%", "targets":2 }
            ]
        } );
    });
</script>
</body>
</html>
