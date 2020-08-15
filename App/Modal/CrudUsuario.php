<?php

require_once 'Conexao.php';


// salva usuario no sistema
function salveUsuario($nome,$sobrenome,$email,$senha,$endereco,$numero,$cep,$complemento,$pais,$cidade,$estado,$telefone){
    try {
        $pdo=conexao();

        $inserir = $pdo->prepare("INSERT INTO usuario (nome_usuario,sobrenome_usuario,email_usuario,senha_usuario,endereco,numero,cep,complemento,pais,cidade,estado,telefone) 
VALUES (:valor1,:valor2,:valor3,:valor4,:valor5,:valor6,:valor7,:valor8,:valor9,:valor10,:valor11,:valor12)");

        $inserir->bindValue(":valor1",$nome);
        $inserir->bindValue(":valor2",$sobrenome);
        $inserir->bindValue(":valor3",$email);
        $inserir->bindValue(":valor4",$senha);
        $inserir->bindValue(":valor5",$endereco);
        $inserir->bindValue(":valor6",$numero);
        $inserir->bindValue(":valor7",$cep);
        $inserir->bindValue(":valor8",$complemento);
        $inserir->bindValue(":valor9",$pais);
        $inserir->bindValue(":valor10",$cidade);
        $inserir->bindValue(":valor11",$estado);
        $inserir->bindValue(":valor12",$telefone);

       $inserir->execute();

        return "Usuario Cadastrado com Sucesso";

    }catch (PDOException $e){
        return $e->getMessage();
    }
}
// recupera senha do aluno
function RecuperaSenhaAluno($nome,$email,$senha){

    try {

        $pdo=conexao();

        $atualizar = $pdo->prepare("UPDATE usuario SET senha_usuario =:senha WHERE email_usuario =:email");

       // $atualizar = $pdo->prepare("UPDATE usuario SET senha_usuario =:senha WHERE nome_usuario =:usuario and email_usuario =:email");
       // $atualizar->bindValue(":usuario", $nome);

        $atualizar->bindValue(":email", $email);

        $atualizar->bindValue(":senha", $senha);

        $atualizar->execute();

        return "A nova senha foi enviada para o seu e-mail";

    }catch (PDOException $e){
        return $e->getMessage();
    }

}
// busca o email cadastrado do aluno
function BuscaEmailAluno($nome,$email,$teste){
    try {

        $pdo=conexao();
        $stmt = $pdo->query("SELECT * FROM usuario where email_usuario = '$email';");

        foreach ($stmt as $row){
            $teste = true;
        }


        if ( $teste == false){
            return "1";
        }else if ( $teste == true){
            return "2";
        }


    } catch (PDOException $e){
        return $e->getMessage();
    }
}

// busca os alunos do professor logado ao sistema
function buscarUsuario($id_professor){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT u.id_usuario,u.nome_usuario,u.email_usuario FROM usuario AS u JOIN professor_usuario AS pu ON u.id_usuario = pu.id_usuario WHERE  id_professor=:id_professor;");
    $stmt->bindValue(":id_professor",$id_professor);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($users!= NULL){
        return $users;
    }
}

// busca usuario pelo id do usuario
function buscarUsuarioId($id){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT nome_usuario,sobrenome_usuario  FROM usuario  WHERE id_usuario=:id_usuario");
    $stmt->bindValue(":id_usuario",$id);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach( $users as $user){
        $nome_usuario=$user['nome_usuario'];
        $sobrenome_usuario=$user['sobrenome_usuario'];
    }
    if($users!= NULL){
        return array($nome_usuario,$sobrenome_usuario);
    }


}

// retorna a quantidade  total de usuarios cadastrado no sistema
function  quantidadeUsuariosTotal(){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM usuario ");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = count($users);

    if($total!= NULL){
        return intval($total);
    }else{
        return 0;
    }
}

function desvincularProfessorUsuario($id){
    try {

        $pdo=conexao();
        $stmt = $pdo->prepare("DELETE FROM professor_usuario WHERE id_usuario=:id");
        $stmt->bindValue(":id",$id);
        $stmt->execute();

        return true;
    }catch (PDOException $ex){

        return $ex;
    }
}
