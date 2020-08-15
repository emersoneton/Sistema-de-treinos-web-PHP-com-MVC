<?php

require_once 'Conexao.php';

function logarProfessor($usuario,$senha){

    $pdo=conexao();

    $stmt = $pdo->prepare("SELECT id_professor,nome_professor,sobrenome_professor,senha_professor,email_professor FROM professor WHERE email_professor=:usuario AND senha_professor=:senha LIMIT 1");

    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach( $users as $user){
        $idUsuario=$user['id_professor'];
        $usuario=$user['email_professor'];
        $senha= $user['senha_professor'];
        $nomelogin = $user['nome_professor'];
        $sobrenomelogin = $user['sobrenome_professor'];
    }

    if($users!= NULL){
        return array($usuario,$senha,$nomelogin,$sobrenomelogin,$idUsuario);
    }else{

        return "Usuario ou senha incorretos";
    }

}