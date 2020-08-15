<?php
require_once 'Conexao.php';


//cadastro de alimentos da dieta
function CadastroAlimento($nome_aliemento,$quantidade,$horario,$id_refeicao){

    try {
        $pdo=conexao();

        $inserir = $pdo->prepare("INSERT INTO alimento(alimento,quantidade,horario_refeicao,id_refeicao) VALUES(:valor1,:valor2,:valor3,:valor4)");

        $inserir->bindValue(":valor1",$nome_aliemento);
        $inserir->bindValue(":valor2",$quantidade);
        $inserir->bindValue(":valor3",$horario);
        $inserir->bindValue(":valor4",$id_refeicao);
        $inserir->execute();

        return true;

    }catch (PDOException $e){

        return $e->getMessage();
    }


}
// busca todos os alimentos
function buscarTodosAlimentos($id_refeicao){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM alimento WHERE id_refeicao=:valor1 order by horario_refeicao ");
    $stmt->bindValue(":valor1",$id_refeicao);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = count($users);

    if($total!= NULL){
        return $users;
    }else{
        return null;
    }
}


function buscarAlimentoId($id_alimento){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT alimento,quantidade,horario_refeicao FROM alimento WHERE id_alimento=:valor1 limit 1");
    $stmt->bindValue(":valor1",$id_alimento);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach( $users as $user){
        $alimento=$user['alimento'];
        $quantidade=$user['quantidade'];
        $horario=$user['horario_refeicao'];

    }

    if($users!= NULL){
        return array($alimento,$quantidade,$horario);
    }


}


function atualizarAlimento($id_alimento,$nome_alimento,$quantidade,$horario){
    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE alimento SET alimento=:valor1,quantidade=:valor2,horario_refeicao=:valor3  WHERE id_alimento=:valor4");

    $stmt->bindParam(':valor1', $nome_alimento);
    $stmt->bindParam(':valor2', $quantidade);
    $stmt->bindParam(':valor3', $horario);
    $stmt->bindParam(':valor4', $id_alimento);

    $stmt->execute();
    if($stmt != NULL){
        return true;
    }


}

// função a onde deleta o alimento pelo Id Refeicao
function deletaAlimentoIdRefeicao($id_refeicao){
    $pdo=conexao();
    $stmt = $pdo->prepare("DELETE FROM alimento WHERE id_refeicao=:valor1");
    $stmt->bindValue(":valor1",$id_refeicao);
    $stmt->execute();

    return true;

}

// função a onde deleta o alimento pelo Id Alimento
function deletarAlimentoId($id_alimento){

    $pdo=conexao();
    $stmt = $pdo->prepare("DELETE FROM alimento WHERE id_alimento=:valor1");
    $stmt->bindValue(":valor1",$id_alimento);
    $stmt->execute();

    return true;

}
