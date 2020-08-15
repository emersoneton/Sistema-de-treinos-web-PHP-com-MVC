<?php
require_once 'Session.php';
require_once '../Modal/CrudUsuario.php';
//require 'mailer/PHPMailerAutoload.php';

$nome = $_POST['nome'];
$email = $_POST['email'];

$novaSenha = generatePassword(6);
$senha = md5($novaSenha);

$teste = false;


BuscaEmailAluno($nome,$email,$teste);
$resultado = BuscaEmailAluno($nome,$email,$teste);
 if ($resultado == 2){

     // Incluir classe PHPMailer
     include_once 'PHPMailer/class.smtp.php';
     include_once 'PHPMailer/class.phpmailer.php';

     // Enviando o email
     $Mailer = new PHPMailer();
        $Mailer->CharSet = 'utf8';
        $Mailer->SMTPDebug = 3;
        $Mailer->Debugoutput = 'html';
        $Mailer->IsSMTP();
        $Mailer->Host = "smtp.gmail.com";
        $Mailer->SMTPAuth = true;
        $Mailer->Username = "treinosweb@gmail.com";
        $Mailer->Password = "treinos123456";
        $Mailer->SMTPSecure = "tls";
        $Mailer->Port = 587;
        $Mailer->FromName = "Sistema De Treinos WEB";
        $Mailer->From = "treinosweb@gmail.com";
        $Mailer->AddAddress($email);
        $Mailer->IsHTML(true);
        $Mailer->Subject = "Nova Senha";
        $Mailer->Body = "Senhor(a) <b>$nome</b>"." Uma nova senha foi gerada para você, sua nova senha é: <b><u>$novaSenha</u></b>"."<br><br> Favor não responder a este e-mail, se possivel trocar sua senha após o login!"."<br><br> Atenciosamente - Equipe De Treinos WEB LTDA <br>";

        if ($Mailer->Send()){
            $erro = false;
            $_SESSION['mensagem']=RecuperaSenhaAluno($nome,$email,$senha);
            header("Location:../view/LoginUsuario.php");
        } else {
            $_SESSION['mensagem']="Problema para Enviar o E-mail";
            header("Location:../view/RecuperaSenhaAluno.php");
        }

 }else if ($resultado == 1){

     $_SESSION['mensagem']="Usuário não Cadastrado no Sistema";
     header("Location:../view/RecuperaSenhaAluno.php");
 }

function generatePassword($qtyCaraceters = 8){

    //Letras minúsculas embaralhadas
    $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

    //Letras maiúsculas embaralhadas
    $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

    //Números aleatórios
    $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
    $numbers .= 1234567890;

    //Caracteres Especiais
    $specialCharacters = str_shuffle('!@#$%*-');

    //Junta tudo
    $characters = $capitalLetters.$smallLetters.$numbers;

    //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
    $password = substr(str_shuffle($characters), 0, $qtyCaraceters);

    //Retorna a senha
    return $password;

}