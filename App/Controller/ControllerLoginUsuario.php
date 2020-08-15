<?php
require_once 'Session.php';
require_once '../Modal/LoginUsuarioCrud.php';
require_once '../Modal/CrudFicha.php';

$usuario =$_POST['usuario'];
$senha = md5($_POST['senha']);

if(isset($usuario) && isset($senha)){
        // funcao para buscar dados do usuario
    $resultado=logarUsuario($usuario,$senha);

    //verifica se usuario  existe no sistema
    if($usuario == $resultado[0] && $senha == $resultado[1]){
        $_SESSION['logado']=true;
        $_SESSION['usuario']=$resultado[2];
        $_SESSION['sobrenome_usuario']=$resultado[3];
        //controla o acesso o tipo de acesso no menu do sistema
        $_SESSION['acesso']="usuario";
        $_SESSION['id_usuario']=$resultado[4];

        //pega o id do usuario  e vai verificar se ja tem uma ficha criada
        //se não tiver ele cria
        $idUsuario=$resultado[4];
        $id=buscaFichaAluno($idUsuario);
        if(!isset($id[0])){
            //cria ficha do usuario no sistema
            criarFichaAluno($idUsuario);
        }
        //busca o id da ficha do usuario
        $id=buscaFichaAluno($idUsuario);

        // pega o id da ficha e salva na session
        $_SESSION['id_ficha']=$id[1];
        header("Location:../view/MinhafichaAluno.php");

    }else{
        $_SESSION['mensagem']=$resultado;
        header("Location:../view/LoginUsuario.php");
    }
}








