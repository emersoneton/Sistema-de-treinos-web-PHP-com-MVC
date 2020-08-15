<?php
require_once '../Controller/Session.php';
require_once '../Controller/Seguranca.php';
require_once '../Controller/ControllerPerfil.php';

?>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark"  style="background-color: #FF7F50;">
    <?php
    // dependendo do tipo de acesso ele te direciona para painel adm diferente.
    if($_SESSION['acesso']=="usuario"){
        $painel="PainelAluno.php";
    }else{
        $painel="PainelAdm.php";
    }
    ?>
    <a class="navbar-brand" href="<?=$painel?>"><img src="../../images/Logo-sistema.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <!-- nivel de acesso do sistema para alunos e professores -->

            <?php
            if($_SESSION['acesso']=="professor"){
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../view/UsuarioProfessor.php">Alunos</a>
                </li>
                <?php
            }
            ?>
            <?php
            if($_SESSION['acesso']=="professor"){
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../view/MeuAluno.php">Meus Alunos </a>
                </li>
                <?php
            }
            ?>
            <?php
            /**if($_SESSION['acesso']=="usuario"){
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../view/AvaliacaoUsuario.php">Avaliações</a>
                </li>
                <?php
            }**/
            ?>
            <?php
            if($_SESSION['acesso']=="usuario"){
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="../view/MinhaFichaAluno.php">Minha Ficha</a>
                </li>
                <?php
            }
            ?>

        </ul>
        <div class="btn-group dropleft">
            <button type="button" class="btn btn-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                if(isset($_SESSION['usuario']) && isset($_SESSION['sobrenome_usuario'])){
                    echo $_SESSION['usuario']," ",$_SESSION['sobrenome_usuario'];
                }
                ?>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="Perfil.php">Perfil</a>
                <a class="dropdown-item" href="../Controller/Sair.php">Sair</a>
            </div>
        </div>
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;
        &nbsp;

    </div>
</nav>

