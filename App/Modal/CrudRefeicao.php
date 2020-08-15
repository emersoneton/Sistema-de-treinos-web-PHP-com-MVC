<?php

require_once 'Conexao.php';
//cadastra todas as dietas
function cadastraRefeicao($nome_refeicao,$descricao_refeicao,$data_criacao,$id_ficha){
        try {
            $pdo=conexao();

            $inserir = $pdo->prepare("INSERT INTO refeicao (nome_refeicao,descricao_refeicao,data_criacao,id_ficha) VALUES(:valor1,:valor2,:valor3,:valor4)");

            $inserir->bindValue(":valor1",$nome_refeicao);
            $inserir->bindValue(":valor2",$descricao_refeicao);
            $inserir->bindValue(":valor3",$data_criacao);
            $inserir->bindValue(":valor4",$id_ficha);
            $inserir->execute();

            return true;

        }catch (PDOException $e){

            return $e->getMessage();
        }
}

//busca todas as dietas
function  buscarRefeicao($nome_refeicao,$descricao_refeicao,$data_criacao,$id_ficha){
    try {
        $pdo=conexao();
        $stmt = $pdo->prepare("SELECT id_refeicao FROM refeicao WHERE nome_refeicao=:valor1 AND descricao_refeicao=:valor2 AND id_ficha=:valor3 AND data_criacao=:valor4 LIMIT 1");
        $stmt->bindValue(":valor1",$nome_refeicao);
        $stmt->bindValue(":valor2",$descricao_refeicao);
        $stmt->bindValue(":valor3",$id_ficha);
        $stmt->bindValue(":valor4",$data_criacao);

        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach( $users as $user){
            $id_refeicao=$user['id_refeicao'];

        }
        if($users!= NULL){
            return $id_refeicao;
        }


    }catch (PDOException $ex){

        return $ex;
    }
}

// busca todas as refeições pela o id da ficha
function buscarIdTodasRefeicoes($id_ficha){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM refeicao WHERE id_ficha=:valor1");
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

function buscarTodoRefeicaoId($id_refeicao){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM refeicao WHERE id_refeicao=:valor1");
    $stmt->bindValue(":valor1",$id_refeicao);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach( $users as $user){
        $nome_refeicao=$user['nome_refeicao'];
        $descricao_refeicao=$user['descricao_refeicao'];
    }
    if($users!= NULL){
        return array($nome_refeicao,$descricao_refeicao);
    }
}


function  atualizarRefeicao($id_refeicao,$nome_refeicao,$descricao_refeicao,$data_criacao){
    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE refeicao SET nome_refeicao=:valor1,descricao_refeicao=:valor2,data_criacao=:valor3  WHERE id_refeicao=:valor4");

    $stmt->bindParam(':valor1', $nome_refeicao);
    $stmt->bindParam(':valor2', $descricao_refeicao);
    $stmt->bindParam(':valor3', $data_criacao);
    $stmt->bindParam(':valor4', $id_refeicao);
    $stmt->execute();
    if($stmt != NULL){
        return true;
    }else{
        return false;
    }
}

// função a onde deleta a refeicao pelo Id Refeicao
function deletarAlimentoIdRefeicao($id_refeicao){

    $pdo=conexao();
    $stmt = $pdo->prepare("DELETE FROM refeicao WHERE id_refeicao=:valor1");
    $stmt->bindValue(":valor1",$id_refeicao);
    $stmt->execute();

    return true;

}