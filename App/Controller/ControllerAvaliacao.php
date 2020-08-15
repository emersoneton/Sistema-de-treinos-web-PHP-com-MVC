<?php
require_once 'Session.php';
require_once 'Seguranca.php';
require_once '../Modal/CrudAvaliacao.php';

// valida se a acao do formulario esta valida e se esta passando o id pela url
   if(isset($_GET['acao']) && $_GET['acao']=="excluir" && isset($_GET['id'])){
       //pega o id
       $id=$_GET['id'];
       //  função deleta a avaliação
       $resultado=deletaAvaliacao($id);
       // valida se conseguiu validar
       if($resultado==true){
           $_SESSION['mensagem_avaliacao']="Deletado Avaliacao Com Sucesso";
            //valida de se esta deletando o usuario ou professor referente a avaliação
           if(isset($_GET['tela']) && $_GET['tela']==1 ){
               header("Location:../view/AvaliacaoUsuario.php");
           }else{
               header("Location:../view/FichaAluno.php");
           }

       }
   }elseif (isset($_GET['acao']) && $_GET['acao']=="visualizar" && isset($_GET['id'])){
       //pega o id
       $id=$_GET['id'];
       //direciona para url e  passando o id para que possa processar dados da pagina
       header("Location:../view/VisualizarAvaliacao.php?id=$id");

   }elseif (isset($_GET['acao']) && $_GET['acao']=="editar" && isset($_GET['id'])){
       //pega o id
       $id=$_GET['id'];
       //direciona para url e  passando o id para que possa processar dados da pagina
      header("Location:../view/EditaAvaliacao.php?id=$id");

   }elseif(isset($_GET['acao']) && $_GET['acao'] =='atualizar' && isset($_GET['id'])){
       // pega o id
       $id=$_GET['id'];

       // pega os dados enviados pelo formulario e salva nas variaveis
       $his_clinico= $_POST['historicoClinico'];
       $peso = doubleval($_POST['peso']);
       $altura = doubleval($_POST['altura']);
       $torax = doubleval($_POST['torax']);
       $cintura = doubleval($_POST['cintura']);
       $abdomen= doubleval($_POST['abdomen']);
       $quadril =doubleval( $_POST['quadril']);
       $antebraco_esquerdo= doubleval($_POST['antebracoEsquerdo']);
       $antebraco_direito= doubleval($_POST['antebracoDireito']);
       $braco_esquerdo=doubleval($_POST['bracoEsquerdo']);
       $braco_direito=doubleval($_POST['bracoDireito']);
       $coxa_esquerda=doubleval($_POST['coxaEsquerda']);
       $coxa_direita=doubleval($_POST['coxaDireita']);
       $panturrilha_esquerda=doubleval($_POST['panturrilhaEsquerda']);
       $panturrilha_direita=doubleval($_POST['pantirrilhaDireita']);

       // pega data atual da maquina
       $data= date('y/m/d');

       //calcula o imc do usuario
       $imc=calculoIMC($peso,$altura);
       // função para  atualizar dados da avalização
       $resultado=atualizarAvaliacao($id,$his_clinico,$peso,$altura,$imc,$torax,$cintura,$abdomen,$quadril,$antebraco_esquerdo,$antebraco_direito,$braco_esquerdo,$braco_direito,$coxa_esquerda,$coxa_direita,$panturrilha_esquerda,$panturrilha_direita,$data);

       //verifica se  conseguiu salvar no banco
       if($resultado==true){

           $_SESSION['mensagem_avaliacao']="Atualizado Avaliacao Com Sucesso";

           // valida se acao esta sendo executada pelo usuario ou professor

           if(isset($_GET['tela']) && $_GET['tela']=="1" ){
               header("Location:../view/AvaliacaoUsuario.php");
           }else{
               header("Location:../view/FichaAluno.php");
           }
       }
   }

//função que cadastra avaliacao do usuario .
if(isset($_GET['acao']) && $_GET['acao'] =='cadastro'  ){
    $his_clinico= $_POST['historicoClinico'];
    $peso = doubleval($_POST['peso']);
    $altura = doubleval($_POST['altura']);
    $torax = doubleval($_POST['torax']);
    $cintura = doubleval($_POST['cintura']);
    $abdomen= doubleval($_POST['abdomen']);
    $quadril =doubleval( $_POST['quadril']);
    $antebraco_esquerdo= doubleval($_POST['antebracoEsquerdo']);
    $antebraco_direito= doubleval($_POST['antebracoDireito']);
    $braco_esquerdo=doubleval($_POST['bracoEsquerdo']);
    $braco_direito=doubleval($_POST['bracoDireito']);
    $coxa_esquerda=doubleval($_POST['coxaEsquerda']);
    $coxa_direita=doubleval($_POST['coxaDireita']);
    $panturrilha_esquerda=doubleval($_POST['panturrilhaEsquerda']);
    $panturrilha_direita=doubleval($_POST['pantirrilhaDireita']);
    $id_ficha=intval($_SESSION['id_ficha']);

    $data= date('y/m/d');
    // faz o calculo do imc e retorna para salvar na banco o resultado
    $imc=calculoIMC($peso,$altura);
        // salva no banco
 $resultado=salvarAvaliacao($his_clinico,$peso,$altura,$imc,$torax,$cintura,$abdomen,$quadril,$panturrilha_esquerda,$antebraco_direito,$braco_esquerdo,$braco_direito,$coxa_esquerda,$coxa_direita,$panturrilha_esquerda,$panturrilha_direita,$data,$id_ficha);
 // verifica se foi salvo no banco
 if($resultado==true){

     $_SESSION['mensagem_avaliacao']="Cadastrado Avaliacao Com Sucesso";

     //verifica se esta sendo manipulado a tela por usuario ou professor
     if(isset($_GET['tela']) && $_GET['tela']=="1" ){
         header("Location:../view/AvaliacaoUsuario.php");
     }else{
         header("Location:../view/FichaAluno.php");
     }
}
}

//funcção de calcular o imc
function calculoIMC($peso,$altura){
    //converte string para double
    $peso= doubleval($peso);
    //converte string para double
    $altura=doubleval($altura);
    //calculo para descobrir imc
    $resultado=$peso/($altura*$altura);
    //formata o  resultado para duas casas decimais
    $resultado= number_format($resultado, 1, ',', ' ');
    // returna o resultado
    return $resultado;
}
// busca a avaliação do usuario pelo id da ficha do usario
function buscarAvaliacao(){
    $id_ficha=$_SESSION['id_ficha'];
   $resultado=buscarAvaliacaoUsuario($id_ficha);
    return $resultado;
}
//busca a avalização pelo id da da avalização 
function buscaAvaliacao($id_avaliacao){
    $resultado = buscarAvaliacaoEspecifica($id_avaliacao);
    return $resultado;
}


