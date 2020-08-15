<?php

require_once 'Conexao.php';

function perfilUsuario($id_usuario){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario=:id_usuario LIMIT 1");

    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach( $users as $user){

        $nome=$user['nome_usuario'];
        $sobrenome=$user['sobrenome_usuario'];
        $telefone=$user['telefone'];
        $email=$user['email_usuario'];
        $endereco=$user['endereco'];
        $numero=$user['numero'];
        $cep=$user['cep'];
        $complemento=$user['complemento'];
        $pais=$user['pais'];
        $cidade=$user['cidade'];
        $estado=$user['estado'];
    }
    if($users!= NULL){
        return array($nome,$sobrenome,$telefone,$email,$endereco,$numero,$cep,$complemento,$pais,$cidade,$estado);
    }


}

function perfilProfessor($id_professor){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM professor WHERE id_professor=:id_professor LIMIT 1");

    $stmt->bindParam(':id_professor', $id_professor);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {

        $nome=$user['nome_professor'];
        $sobrenome=$user['sobrenome_professor'];
        $telefone=$user['telefone'];
        $email=$user['email_professor'];
        $endereco=$user['endereco'];
        $numero=$user['numero'];
        $cep=$user['cep'];
        $complemento=$user['complemento'];
        $pais=$user['pais'];
        $cidade=$user['cidade'];
        $estado=$user['estado'];
    }
    if ($users != NULL) {
        return array($nome,$sobrenome,$telefone,$email,$endereco,$numero,$cep,$complemento,$pais,$cidade,$estado);
    }
}

function alterarSenhaUsuario($senha,$id_usuario){
$pdo=conexao();
$stmt = $pdo->prepare("UPDATE usuario SET senha_usuario=:senha WHERE id_usuario=:id_usuario");

$stmt->bindParam(':senha', $senha);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
    if($stmt != NULL){
        return "Alterado com Sucesso";
    }
}


function alterarSenhaProfessor($senha,$id_professor){
    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE professor SET senha_professor=:senha WHERE id_professor=:id_professor");

    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':id_professor', $id_professor);
    $stmt->execute();

    if($stmt!= NULL){
       return "Alterado com Sucesso";
    }
}

function atualizarUsuario($id_usuario,$nome,$sobrenome,$email,$telefone,$endereco,$numero,$cep,$complemento,$pais,$cidade,$estado){
    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE Usuario SET nome_usuario=:nome,sobrenome_usuario=:sobrenome,email_usuario=:email,telefone=:telefone,endereco=:endereco,numero=:numero,cep=:cep,complemento=:complemento,pais=:pais,cidade=:cidade,estado=:estado WHERE id_usuario=:id_usuario");

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':pais', $pais);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id_usuario', $id_usuario);

    $stmt->execute();

    if($stmt!= NULL){
        return "Alterado com Sucesso";
    }


}


function atualizarProfessor($id_professor,$nome,$sobrenome,$email,$telefone,$endereco,$numero,$cep,$complemento,$pais,$cidade,$estado){
    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE professor SET nome_professor=:nome,sobrenome_professor=:sobrenome,email_professor=:email,telefone=:telefone,endereco=:endereco,numero=:numero,cep=:cep,complemento=:complemento,pais=:pais,cidade=:cidade,estado=:estado WHERE id_professor=:id_professor");

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':complemento', $complemento);
    $stmt->bindParam(':pais', $pais);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id_professor', $id_professor);

    $stmt->execute();

    if($stmt!= NULL){
        return "Alterado com Sucesso";
    }


}


