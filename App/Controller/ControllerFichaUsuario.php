<?php
require_once 'Session.php';
require_once 'Seguranca.php';
require_once '../Modal/CrudFichaUsuario.php';
require_once '../Modal/CrudFicha.php';
require_once '../Modal/CrudUsuario.php';

// valida se o acao e  se esta passando pela url o id
if(isset($_GET['acao']) && $_GET['acao']== "index" && isset($_GET['id'])){
        // pega  o id
       $id=$_GET['id'];
       // função busca o id da ficha do aluno
        $id=buscaFichaAluno($id);
        // grava id da ficha do aluno para que possa fazer varias consultas atraves da ficha do aluno
        $_SESSION['id_ficha']=$id[1];
        $_SESSION['id_aluno_ficha']=$id[0];


        // retorna para tela de ficha do aluno para que ele possa mostrar as avaliações e treinos e dietas atraves do id do aluno
       header("Location:../view/FichaAluno.php");

}elseif(isset($_GET['acao'])&& $_GET['acao']=="excluir"){
    $id=$_GET['id'];

    $resultado=desvincularProfessorUsuario($id);

if($resultado == true){
    $_SESSION['mensagem']="Desviculado com sucesso";
    header("Location:../view/MeuAluno.php");
}
    $_SESSION['teste']=$resultado;
    header("Location:../view/MeuAluno.php");
}

function dadosusuario(){
    if(isset($_SESSION['id_aluno_ficha'])){
        $id=$_SESSION['id_aluno_ficha'];
    }else{
        $id=$_SESSION['id_usuario'];
    }
 $resultado= buscarUsuarioId($id);
return $resultado;
}



