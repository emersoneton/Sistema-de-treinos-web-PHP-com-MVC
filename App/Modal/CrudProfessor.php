<?php

require_once 'Conexao.php';

function findall($pdo){

    $sql = "select * from professor";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);
}

// cadastra o professor  no sistema
function salveProfessor($nome,$sobrenome,$email,$senha,$endereco,$numero,$cep,$complemento,$pais,$cidade,$estado,$cref,$telefone){
    try {
        $pdo=conexao();

        $inserir = $pdo->prepare("INSERT INTO professor (nome_professor,sobrenome_professor,email_professor,senha_professor,endereco,numero,cep,complemento,pais,cidade,estado,cref_professor,telefone) 
VALUES (:valor1,:valor2,:valor3,:valor4,:valor5,:valor6,:valor7,:valor8,:valor9,:valor10,:valor11,:valor12,:valor13)");

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
        $inserir->bindValue(":valor12",$cref);
        $inserir->bindValue(":valor13",$telefone);

        $inserir->execute();

        return " Cadastro Efetuado com sucesso";

    }catch (PDOException $e){

        return $e->getMessage();
    }
}

// recupera a  senha do professor
function RecuperaSenhaProfessor($nome,$email,$senha){

    try {

        $pdo=conexao();

        $atualizar = $pdo->prepare("UPDATE professor SET senha_professor =:senha WHERE email_professor =:email");

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

// busca o email do professor
function BuscaEmailProfessor($nome,$email,$teste){
    try {

        $pdo=conexao();
        $stmt = $pdo->query("SELECT * FROM professor where email_professor = '$email';");

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

// atualiza as informações do professor
function atualizar($pdo,$usuario,$senha,$id){

    try {
        $atualizar = $pdo->prepare("UPDATE usuario SET user_name =:usuario , user_password=:senha WHERE id_user =:id");


    $atualizar->bindValue(":usuario", $usuario);

    $atualizar->bindValue(":senha", $senha);

    $atualizar->bindValue(":id", $id);

    $atualizar->execute();

    return "Atualizado com Sucesso";

    }catch (PDOException $e){

        return $e->getMessage();
    }
}


function  quantidadeProfessorTotal(){
    $pdo=conexao();
    $stmt = $pdo->prepare("SELECT * FROM Professor ");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total = count($users);

    if($total!= NULL){
        return intval($total);
    }else{
        return 0;
    }
}
