<?php
require_once 'Session.php';
require_once '../Modal/CrudExercicio.php';

if( isset($_GET['acao']) && $_GET['acao'] == "cadastro" ){
   $id_treino= $_GET['id'];
   $nome_exercicio=$_POST['nomeExercicio'];
   $serie=$_POST['serie'];
    $repeticao=$_POST['repeticao'];
   $descricao_exercicio=$_POST['descricaoExercicio'];

    salvarExercicio($nome_exercicio,$serie,$repeticao,$descricao_exercicio,$id_treino);
    header("Location:../view/CadastroExercicio.php?id=$id_treino");
}elseif (isset($_GET['acao']) && $_GET['acao'] == "excluir" ){
    $id=$_GET['id'];
    deletarExercicio($id);

    $id_treino=$_SESSION['id_treino'];
   header("Location:../view/CadastroExercicio.php?id=$id_treino");

}elseif(isset($_GET['acao']) && $_GET['acao'] == "editar" ){
    $id_exercicio=$_GET['id'];

    header("Location:../view/EditarExercicio.php?id=$id_exercicio");

}elseif (isset($_GET['acao']) && $_GET['acao'] == "atualizar"){
    $id_exercicio=$_GET['id'];
    $nome_exercicio=$_POST['nomeExercicio'];
    $serie=$_POST['serie'];
    $repeticao=$_POST['repeticao'];
    $descricao_exercicio=$_POST['descricaoExercicio'];

    atualizarExercicio($id_exercicio,$nome_exercicio,$serie,$repeticao,$descricao_exercicio);
    $id_treino=$_SESSION['id_treino'];

    header("Location:../view/CadastroExercicio.php?id=$id_treino");
}


function buscarExercicio($id_treino){
   $resultado=buscarTodosExercicio($id_treino);
    return $resultado;
}

function buscarIdExercicio($id_exercicio){
    $resultado=buscarExercicioId($id_exercicio);

    return $resultado;

}

