<?php
require_once 'Session.php';
require_once '../Modal/CrudUsuario.php';

if(isset($_POST['nome'])&& isset($_POST['email'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $teste = false;
}

// cadastra os usuarios no sitema
if(isset($_GET['acao']) && $_GET['acao'] == "cadastrar"){
    $nome =strval($_POST['nome']);
    $sobrenome =strval( $_POST['sobrenome']);
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $cep = $_POST['cep'];
    $complemento = $_POST['complemento'];
    $pais = $_POST['pais'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];



    BuscaEmailAluno($nome,$email,$teste);
    $teste1 = BuscaEmailAluno($nome,$email,$teste);
    if ($teste1 == 2){
        echo "E-mail ja cadastrado para outro usuario";
    }else if ("USUÁRIO NÃO CONSTA CADASTRADO NA NOSSA BASE DE DADOS!"){
        $_SESSION['mensagem']=salveUsuario($nome,$sobrenome,$email,$senha,$endereco,$numero,$cep,$complemento,$pais,$cidade,$estado,$telefone);
        header("Location:../view/LoginUsuario.php");
    }

}

// mostra os alunos vinculados ao professor
function meuAluno(){
    $id_professor=$_SESSION['id_usuario'];
    $resultado =  buscarUsuario($id_professor);
 return $resultado;
}
// mostra quantidade de alunos cadastrados no sistema
function quantidadeUsuariosCadastrados(){

   $resultado= quantidadeUsuariosTotal();

    return $resultado;
}










