<?php
require_once 'Session.php';
require_once '../Modal/LoginProfessorCrud.php';
$usuario =$_POST['usuario'];
$senha = md5($_POST['senha']);


if(isset($usuario) && isset($senha)){

    $resultado=logarProfessor($usuario,$senha);


    if($usuario == $resultado[0] && $senha == $resultado[1]){


        $_SESSION['logado']=true;
        $_SESSION['usuario']=$resultado[2];
        $_SESSION['sobrenome_usuario']=$resultado[3];

        //controla o acesso o tipo de acesso no menu do sistema
        $_SESSION['acesso']="professor";
        $_SESSION['id_usuario']=$resultado[4];
        header("Location:../view/PainelAdm.php");
    }else{
        $_SESSION['mensagem']=$resultado;
        header("Location:../view/LoginProfessor.php");
    }
}







