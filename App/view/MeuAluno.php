<?php
require_once '../Controller/Session.php';
require_once '../Controller/ControllerCrudUsuario.php';
?>
<!doctype html>
<html lang="br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Usuário</title>
</head>
<body>
<?php include('../view/Menu.php') ?>
<br>
<br>
<br>
<br>
<?php
if(isset($_SESSION['mensagem'])) {
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php
        echo $_SESSION['mensagem'];
        unset($_SESSION['mensagem']);

        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>
<div class="text-center">
    <h2>Meus Alunos </h2>
</div>
<div class="container-fluid">
    <div class="table">
        <table class="table-striped table-responsive-xl" id="minhaTabela">

            <thead>
            <tr>
                <th scope="col" style='width: 5%;background-color: #FF7F50;'>Nome usuario</th>
                <th scope="col" style='width: 5%;background-color: #FF7F50;'>Email usuario</th>
                <th scope="col " style='width: 1%;background-color: #FF7F50;'>Ficha Aluno</th>
                <th scope="col " style='width: 1%;background-color: #FF7F50;'>Desvincular</th>
            </tr>
            </thead>
            <!-- tras consulta do usuarios não vinculados ao professor-->
            <?php $resultado=meuAluno();
            if(isset($resultado)){
                foreach ($resultado as $linhas){
                    ?>
                    <tbody>
                    <tr>
                        <td><?=$linhas['nome_usuario']?></td>
                        <td><?=$linhas['email_usuario']?></td>
                        <td ><a href="../Controller/ControllerFichaUsuario.php?acao=index&id=<?=$linhas['id_usuario']?>" ><img title="Ficha do Aluno"src="../../images/ficha_usuario.png"></a></td>
                        <td ><a href="../Controller/ControllerFichaUsuario.php?acao=excluir&id=<?=$linhas['id_usuario']?>" ><img title="Desvincular aluno ao Professor"src="../../images/desvinculo.png"></a></td>
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
                { "width": "70%", "targets":6 }
            ]
        } );
    });
</script>
</body>
</html>