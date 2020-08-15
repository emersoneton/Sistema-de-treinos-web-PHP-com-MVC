<?php
require_once 'Session.php';
require_once '../Modal/CrudAlimento.php';

//cadastra alimentos da dieta
if(isset($_GET['acao']) && $_GET['acao']=="cadastro"){
    $id_refeicao=$_GET['id'];
$nome_alimento= $_POST['nomeAlimento'];
$quantidade= $_POST['quantidade'];
$horario= $_POST['horario'];

  CadastroAlimento($nome_alimento,$quantidade,$horario,$id_refeicao);

    header("Location:../view/CadastroAlimento.php?id=$id_refeicao");
}elseif (isset($_GET['acao']) && $_GET['acao']=="editar"){
    $id_alimento=$_GET['id'];

    header("Location:../view/EditarAlimento.php?id=$id_alimento");

}elseif (isset($_GET['acao']) && $_GET['acao']=="atualizar"){

    $id_alimento=$_GET['id'];
    $nome_alimento= $_POST['nomeAlimento'];
    $quantidade= $_POST['quantidade'];
    $horario= $_POST['horario'];

    atualizarAlimento($id_alimento,$nome_alimento,$quantidade,$horario);

    $id_refeicao= $_SESSION['id_refeicao'];

    header("Location:../view/CadastroAlimento.php?id=$id_refeicao");

}elseif (isset($_GET['acao']) && $_GET['acao']=="excluir"){
    $id_alimento=$_GET['id'];
    deletarAlimentoId($id_alimento);
    $id_refeicao= $_SESSION['id_refeicao'];
    header("Location:../view/CadastroAlimento.php?id=$id_refeicao");
}



//busca todos os alimentos cadastrados na Dieta
function buscarAlimentos($id_refeicao){
    $resultado=buscarTodosAlimentos($id_refeicao);
    return $resultado;
}

function  buscarIdAlimento($id_alimento){

    $resultado = buscarAlimentoId($id_alimento);
    return $resultado;
}
