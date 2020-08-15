<?php

require_once 'Conexao.php';
// cadastro de avaliações de usuarios
function salvarAvaliacao($his_clinico,$peso,$altura,$imc,$torax,$cintura,$abdomen,$quadril,$antebraco_esquerdo,$antebraco_direito,$braco_esquerdo,$braco_direito,$coxa_esquerda,$coxa_direita,$panturrilha_esquerda,$panturrilha_direita,$data,$id_ficha){
    try {
        $pdo=conexao();

        $inserir = $pdo->prepare("INSERT INTO avaliacao (his_clinico,peso,altura,imc,torax,cintura,abdomen,quadril,antebraco_esquerdo,antebraco_direito,braco_esquerdo,braco_direito,coxa_esquerdo,coxa_direito,panturrilha_esquerda,panturrilha_direita,data_avaliacao,id_ficha) 
        VALUES(:valor1,:valor2,:valor3,:valor4,:valor5,:valor6,:valor7,:valor8,:valor9,:valor10,:valor11,:valor12,:valor13,:valor14,:valor15,:valor16,:valor17,:valor18)");

        $inserir->bindValue(":valor1",$his_clinico);
        $inserir->bindValue(":valor2",$peso);
        $inserir->bindValue(":valor3",$altura);
        $inserir->bindValue(":valor4",$imc);
        $inserir->bindValue(":valor5",$torax);
        $inserir->bindValue(":valor6",$cintura);
        $inserir->bindValue(":valor7",$abdomen);
       $inserir->bindValue(":valor8",$quadril);
       $inserir->bindValue(":valor9",$antebraco_esquerdo);
        $inserir->bindValue(":valor10",$antebraco_direito);
        $inserir->bindValue(":valor11",$braco_esquerdo);
        $inserir->bindValue(":valor12",$braco_direito);
        $inserir->bindValue(":valor13",$coxa_esquerda);
        $inserir->bindValue(":valor14",$coxa_direita);
        $inserir->bindValue(":valor15",$panturrilha_esquerda);
        $inserir->bindValue(":valor16",$panturrilha_direita);
        $inserir->bindValue(":valor17",$data);
        $inserir->bindValue(":valor18",$id_ficha);
        $inserir->execute();

            return true;

    }catch (PDOException $e){

        return $e->getMessage();
    }
}

//busca todas as avalições do usuario
function buscarAvaliacaoUsuario($id_ficha){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM avaliacao WHERE id_ficha=:id_ficha");
    $stmt->bindValue(":id_ficha",$id_ficha);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($users!= NULL){
        return $users;
    }
}

 function buscarAvaliacaoEspecifica($id){
     $pdo=conexao();
     $stmt = $pdo->prepare("SELECT * FROM avaliacao WHERE id_avaliacao=:id_avaliacao limit 1");
     $stmt->bindValue(":id_avaliacao",$id);
     $stmt->execute();

     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach( $users as $user){

         $id_avaliação=$user['id_avaliacao'];
         $his_clinico=$user['his_clinico'];
         $peso=$user['peso'];
         $altura=$user['altura'];
         $imc=$user['imc'];
         $torax=$user['torax'];
         $cintura=$user['cintura'];
         $abdomen=$user['abdomen'];
         $quadril=$user['quadril'];
         $antebraco_esquerdo=$user['antebraco_esquerdo'];
         $antebraco_direito=$user['antebraco_direito'];
         $braco_esquerdo=$user['braco_esquerdo'];
         $braco_direito=$user['braco_direito'];
         $coxa_esquerdo=$user['coxa_esquerdo'];
         $coxa_direito=$user['coxa_direito'];
         $panturrilha_esquerda=$user['panturrilha_esquerda'];
         $panturrilha_direita=$user['panturrilha_direita'];
         $data_avaliacao=$user['data_avaliacao'];
         $id_ficha=$user['id_ficha'];


     }
     if($users!= NULL){
         return array( $id_avaliação, $his_clinico, $peso, $altura, $imc, $torax, $cintura, $abdomen, $quadril,$antebraco_esquerdo,$antebraco_direito,$braco_esquerdo,$braco_direito,$coxa_esquerdo,$coxa_direito,$panturrilha_esquerda,$panturrilha_direita,$data_avaliacao,$id_ficha);
     }

}

function atualizarAvaliacao($id,$his_clinico,$peso,$altura,$imc,$torax,$cintura,$abdomen,$quadril,$antebraco_esquerdo,$antebraco_direito,$braco_esquerdo,$braco_direito,$coxa_esquerda,$coxa_direita,$panturrilha_esquerda,$panturrilha_direita,$data){
    $pdo=conexao();
    $stmt = $pdo->prepare("UPDATE avaliacao SET his_clinico=:his_clinico,
                peso=:peso, altura=:altura,imc=:imc,torax=:torax,cintura=:cintura,abdomen=:abdomen,quadril=:quadril,
                antebraco_esquerdo=:antebraco_esquerdo,antebraco_direito=:antebraco_direito,
                braco_esquerdo=:braco_esquerdo,braco_direito=:braco_direito,
                coxa_esquerdo=:coxa_esquerdo,coxa_direito=:coxa_esquerdo,
                panturrilha_esquerda=:panturrilha_esquerda,panturrilha_direita=:panturrilha_direita,
                data_avaliacao=:data_avaliacao WHERE id_avaliacao=:id_avaliacao");


    $stmt->bindParam(':id_avaliacao', $id);
    $stmt->bindParam(':his_clinico', $his_clinico);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':imc', $imc);
    $stmt->bindParam(':torax', $torax);
    $stmt->bindParam(':cintura', $cintura);
    $stmt->bindParam(':abdomen', $abdomen);
    $stmt->bindParam(':quadril', $quadril);
    $stmt->bindParam(':antebraco_esquerdo', $antebraco_esquerdo);
    $stmt->bindParam(':antebraco_direito', $antebraco_direito);
    $stmt->bindParam(':braco_esquerdo', $braco_esquerdo);
    $stmt->bindParam(':braco_direito', $braco_direito);
    $stmt->bindParam(':coxa_esquerdo', $coxa_esquerda);
    $stmt->bindParam(':coxa_direito', $coxa_direita);
    $stmt->bindParam(':panturrilha_esquerda', $panturrilha_esquerda);
    $stmt->bindParam(':panturrilha_direita', $panturrilha_direita);
    $stmt->bindParam(':data_avaliacao', $data);
    $stmt->execute();
    if($stmt != NULL){
        return true;
    }


}


//function para deletar avaliações referente ao usuario
function deletaAvaliacao($id_delete){
    $pdo=conexao();
    $stmt = $pdo->prepare("DELETE FROM avaliacao WHERE id_avaliacao=:id_delete");
    $stmt->bindValue(":id_delete",$id_delete);
    $stmt->execute();

        return true;
}