<?php

require_once 'Conexao.php';
// cadastro de treino de usuarios
function salvarExercicio($nome_exercicio,$serie,$repeticao,$descricao_exercicio,$id_treino){
    try {
        $pdo=conexao();

        $inserir = $pdo->prepare("INSERT INTO exercicio (nome_exercicio,serie,repeticao,descricao_exercicio,id_treino) VALUES(:valor1,:valor2,:valor3,:valor4,:valor5)");

        $inserir->bindValue(":valor1",$nome_exercicio);
        $inserir->bindValue(":valor2",$serie);
        $inserir->bindValue(":valor3",$repeticao);
        $inserir->bindValue(":valor4",$descricao_exercicio);
        $inserir->bindValue(":valor5",$id_treino);
        $inserir->execute();

        return true;

    }catch (PDOException $e){

        return $e->getMessage();
    }
}
//buscar todos os exercicios do treino
function buscarTodosExercicio($id_treino){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM exercicio WHERE id_treino=:valor1");
    $stmt->bindValue(":valor1",$id_treino);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = count($users);

    if($total!= NULL){
        return $users;
    }else{
        return null;
    }
}

// função para excluir um exercicio pelo id do exercicio
function deletarExercicio($id_exercicio){

    $pdo=conexao();
    $stmt = $pdo->prepare("DELETE FROM exercicio WHERE id_exercicio=:valor1");
    $stmt->bindValue(":valor1",$id_exercicio);
    $stmt->execute();

    return true;

}


// função para excluir um exercicio pelo id do treino
function deletarExercicioIdTreino($id_treino){

    $pdo=conexao();
    $stmt = $pdo->prepare("DELETE FROM exercicio WHERE id_treino=:valor1");
    $stmt->bindValue(":valor1",$id_treino);
    $stmt->execute();

    return true;

}

function buscarExercicioId($id_exercicio){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT nome_exercicio,serie,repeticao,descricao_exercicio FROM exercicio WHERE id_exercicio=:valor1 limit 1");
    $stmt->bindValue(":valor1",$id_exercicio);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach( $users as $user){
        $nome_exercicio=$user['nome_exercicio'];
        $serie=$user['serie'];
        $repeticao=$user['repeticao'];
        $descricao_descricao=$user['descricao_exercicio'];
    }

    if($users!= NULL){
        return array($nome_exercicio,$serie,$repeticao,$descricao_descricao);
    }

}

function atualizarExercicio($id_exercicio,$nome_exercicio,$serie,$repeticao,$descricao_exercicio){

    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE exercicio SET nome_exercicio=:valor1,serie=:valor2,repeticao=:valor3,descricao_exercicio=:valor4  WHERE id_exercicio=:valor5");

    $stmt->bindParam(':valor1', $nome_exercicio);
    $stmt->bindParam(':valor2', $serie);
    $stmt->bindParam(':valor3', $repeticao);
    $stmt->bindParam(':valor4', $descricao_exercicio);
    $stmt->bindParam(':valor5', $id_exercicio);
    $stmt->execute();
    if($stmt != NULL){
        return true;
    }

}