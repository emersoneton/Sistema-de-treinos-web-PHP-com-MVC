<?php

require_once 'Conexao.php';

 function logarUsuario($usuario,$senha){
     $pdo=conexao();

    $stmt = $pdo->prepare("SELECT id_usuario,email_usuario,senha_usuario,nome_usuario,sobrenome_usuario FROM usuario WHERE email_usuario=:usuario AND senha_usuario =:senha LIMIT 1");

    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach( $users as $user){
        $idUsuario=$user['id_usuario'];
        $usuario=$user['email_usuario'];
        $senha= $user['senha_usuario'];
        $nomelogin=$user['nome_usuario'];
        $sobrenomelogin=$user['sobrenome_usuario'];
    }

    if($users!= NULL){
        return array($usuario,$senha,$nomelogin,$sobrenomelogin,$idUsuario);
    }else{

        return "Usuario ou senha incorretos";
    }

}


