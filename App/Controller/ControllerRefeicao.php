<?php
require_once 'Session.php';
require_once '../Modal/CrudRefeicao.php';
require_once '../Modal/CrudAlimento.php';

//cadastro de refeicao
if(isset($_GET['acao']) && $_GET['acao']=="cadastrar"){
$nome_refeicao=$_POST['nomeRefeicao'];
$descricao_refeicao=$_POST['descricaoRefeicao'];
$data_criacao= date('y/m/d');
$id_ficha=$_SESSION['id_ficha'];
$resultado= cadastraRefeicao($nome_refeicao,$descricao_refeicao,$data_criacao,$id_ficha);

if($resultado==True){

    $resultado=buscarRefeicao($nome_refeicao,$descricao_refeicao,$data_criacao,$id_ficha);
    header("Location:../view/CadastroAlimento.php?id=$resultado");
}
}elseif (isset($_GET['acao']) && $_GET['acao']=="editar"){
    $id_refeicao= $_GET['id'];

    header("Location:../view/EditarDieta.php?id=$id_refeicao");

}elseif (isset($_GET['acao']) && $_GET['acao']=="atualizar"){
   $id_refeicao=$_GET['id'];
    $nome_refeicao=$_POST['nomeReceicao'];
    $descricao_refeicao=$_POST['descricaoRefeicao'];
    $data_criacao= date('y/m/d');

    $resultado=atualizarRefeicao($id_refeicao,$nome_refeicao,$descricao_refeicao,$data_criacao);

    if($resultado== true){
        $_SESSION['mensagem_avaliacao']="Atualizado o dado com sucesso";

        header("Location:../view/FichaAluno.php");
    }
}elseif (isset($_GET['acao']) && $_GET['acao']=="excluir"){
    $id_refeicao=$_GET['id'];

    $resultado=deletaAlimentoIdRefeicao($id_refeicao);

    if($resultado == true){
        deletarAlimentoIdRefeicao($id_refeicao);
        $_SESSION['mensagem_avaliacao']="Deletado com sucesso";
        header("Location:../view/FichaAluno.php");
    }

}

// busca todas as refeições
function buscarTodasRefeicao(){
    $id_ficha=$_SESSION['id_ficha'];
    $resultado= buscarIdTodasRefeicoes($id_ficha);
    return $resultado;
}

function buscarTodoIdRefeicao($id_refeicao){
    $id_ficha=$_SESSION['id_ficha'];
    $resultado= buscarTodoRefeicaoId($id_refeicao);
    return $resultado;
}


