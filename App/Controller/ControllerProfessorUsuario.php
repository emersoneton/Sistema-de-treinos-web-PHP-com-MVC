<?php

require_once 'Session.php';
require_once '../Modal/ProfessorUsuarioCrud.php';

//vincula o professor ao alunol
if(isset($_GET['id'])){
    $idUsuario=$_GET['id'];
    $idProfessor=$_SESSION['id_usuario'];
    $resultado= vincularAlunoProfessor($idProfessor,$idUsuario);
    $_SESSION['mensagem']=$resultado;
    header("Location:../view/UsuarioProfessor.php");
}

// busca o usuario que não esta vinculado com algum professor
function usuariosNaoVinculado(){
    $resultado=buscarAlunoNaoAssociado();
     return $resultado;
};

function totalUsuarioVinculadoProfessor(){
    $id_professor=$_SESSION['id_usuario'];
    $resultado=usuariosViculadoProfessor($id_professor);
    return $resultado;
}