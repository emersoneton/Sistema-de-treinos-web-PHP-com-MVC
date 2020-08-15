<?php

require_once 'Conexao.php';
// cadastro de treino de usuarios
function salvarTreino($nome_treino,$descricao_treino,$data_criacao,$id_ficha){
    try {
        $pdo=conexao();

        $inserir = $pdo->prepare("INSERT INTO treino (nome_treino,descricao_treino,data_criacao,id_ficha) VALUES(:valor1,:valor2,:valor3,:valor4)");

        $inserir->bindValue(":valor1",$nome_treino);
        $inserir->bindValue(":valor2",$descricao_treino);
        $inserir->bindValue(":valor3",$data_criacao);
        $inserir->bindValue(":valor4",$id_ficha);
        $inserir->execute();

        return true;

    }catch (PDOException $e){

        return $e->getMessage();
    }
}

// busca o id do treino
function buscarIdTreino($nome_treino,$descricao_treino,$id_ficha){

    try {
        $pdo=conexao();
        $stmt = $pdo->prepare("SELECT id_treino FROM treino WHERE nome_treino=:valor1 AND descricao_treino=:valor2 AND id_ficha=:valor3 LIMIT 1");
        $stmt->bindValue(":valor1",$nome_treino);
        $stmt->bindValue(":valor2",$descricao_treino);
        $stmt->bindValue(":valor3",$id_ficha);

        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach( $users as $user){
            $id_treino=$user['id_treino'];

        }
        if($users!= NULL){
            return $id_treino;
        }


    }catch (PDOException $ex){

        return $ex;
    }
}

//realiza a busca de todos os treinos cadastrados com id da ficha do aluno
function buscarIdTodosTreinos($id_ficha){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM treino WHERE id_ficha=:valor1");
    $stmt->bindValue(":valor1",$id_ficha);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $registros = count($users);
    if($registros!= NULL){
        return $users;
    }else{
        return false;
    }
}
// realiza a busca de um especifico treino
function buscarTreinoId($id_treino){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT nome_treino,descricao_treino  FROM  treino WHERE id_treino=:valor1");
    $stmt->bindValue(":valor1",$id_treino);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach( $users as $user){
        $nome_treino=$user['nome_treino'];
        $descricao_treino=$user['descricao_treino'];
    }
    if($users!= NULL){
        return array($nome_treino,$descricao_treino);
    }
}
// atualiza o  dados do treinos
function  atualizarTreino($id_treino,$nome_treino,$descricao_treino,$data_criacao){
    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE treino SET nome_treino=:valor1,descricao_treino=:valor2,data_criacao=:valor3  WHERE id_treino=:valor4");

    $stmt->bindParam(':valor1', $nome_treino);
    $stmt->bindParam(':valor2', $descricao_treino);
    $stmt->bindParam(':valor3', $data_criacao);
    $stmt->bindParam(':valor4', $id_treino);
    $stmt->execute();
    if($stmt != NULL){
        return true;
    }
}

// função para excluir um treino pelo id do treino
function deletarTreinoId($id_treino){

    $pdo=conexao();
    $stmt = $pdo->prepare("DELETE FROM treino WHERE id_treino=:valor1");
    $stmt->bindValue(":valor1",$id_treino);
    $stmt->execute();

    return true;

}


