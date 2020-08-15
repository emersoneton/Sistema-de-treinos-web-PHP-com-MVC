<?php
require_once 'Session.php';
require_once '../Modal/CrudPerfil.php';


//carrega o perfil para sistema
function carregaPerfil($id,$usuario){

    if($usuario == "usuario"){

        $perfil=perfilUsuario($id);

        return $perfil;

    }elseif($usuario == "professor"){

        $perfil=perfilProfessor($id);
        return $perfil;

    }

}
// verifica se é usuario ou professor e altera senha
if(isset($_POST['senha'])){

    $senha = md5($_POST['senha']);

    if($_SESSION['acesso']== "usuario"){

        $_SESSION['mensagem-alterar']=alterarSenhaUsuario($senha,$_SESSION['id_usuario']);
        header("Location:../view/Perfil.php");

    }elseif($_SESSION['acesso'] == "professor"){
        $_SESSION['mensagem-alterar']=alterarSenhaProfessor($senha,$_SESSION['id_usuario']);
        header("Location:../view/Perfil.php");

    }

}
// atualiza o cadastro do usuario
if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email'])) {
    $id = $_SESSION['id_usuario'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $compl = $_POST['complemento'];
    $pais = $_POST['pais'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    if ($_SESSION['acesso'] == "usuario") {

        $_SESSION['mensagem-alterar']= atualizarUsuario($id, $nome, $sobrenome, $email, $telefone, $endereco, $numero, $cep, $compl, $pais, $cidade, $estado);
        header("Location:../view/Perfil.php");
    } elseif ($_SESSION['acesso']=="professor") {

        $_SESSION['mensagem-alterar']= atualizarProfessor($id, $nome, $sobrenome, $email, $telefone, $endereco, $numero, $cep, $compl, $pais, $cidade, $estado);
        header("Location:../view/Perfil.php");

    }
}