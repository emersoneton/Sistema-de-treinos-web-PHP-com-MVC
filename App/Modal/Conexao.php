<?php

 function conexao (){
     $user = 'root';
     $pass = '';
     try {
         return $pdo =  new PDO('mysql:host=localhost;dbname=academia', $user, $pass);
     } catch (PDOException $e) {
         echo 'Erro: '.$e->getMessage();
     }
 }





