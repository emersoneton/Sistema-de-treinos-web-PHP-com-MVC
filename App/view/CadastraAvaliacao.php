<?php
require_once '../Controller/Session.php';
require_once '../Controller/Seguranca.php';
require_once '../Controller/ControllerPerfil.php';
?>
<!doctype html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Avaliação</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
</head>
<body>
<?php include('../view/Menu.php') ?>
<br>
<br>
<br>

<?php
// verifica o acesso do usuario para que o retorno de dela seja direcionado conforme o tipo de acesso
$_SESSION['acesso']=="usuario" ? $valor="1" : $valor="2";
?>
<form name="form1" action="../Controller/ControllerAvaliacao.php?tela=<?=$valor?>&acao=cadastro" method="post">
    <div align="center">
        <br><br>
        <h2> Nova Avaliação </h2>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Historico clinico </label>
                <textarea name="historicoClinico" required   class="form-control"  ></textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Peso: </label>
                <input name="peso" type="text"  required class="form-control" id="peso" >
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Altura: </label>
                <input name="altura"  required type="text" class="form-control"  id="altura">
            </div>

            <div class="form-group col-md-4">
                <label for="inputEmail4">Imc : </label>
                <fieldset disabled>
                <input name="imc"   value=" Gerado pelo sistema" class="form-control">
                </fieldset>
            </div>

            <div class="form-group col-md-12">
                <h4 class="text-center"> Perimentros</h4>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="inputPassword4">Torax : </label>
                <input name="torax"  required type="text" class="form-control"  id="torax">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Cintura: </label>
                <input name="cintura"  required type="text" class="form-control" id="cintura" >
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Abdomen: </label>
                <input name="abdomen"  required type="text" class="form-control" id="abdomen" >
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Quadril: </label>
                <input name="quadril"  required type="text" class="form-control"  id="quadril">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Antebraço Esquerdo: </label>
                        <input name="antebracoEsquerdo"  required type="text" class="form-control" id="antebracoesquerdo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Antebraço Direito: </label>
                        <input name="antebracoDireito"  required type="text" class="form-control" id="antebracodireito">
                    </div>

                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Braço Esquerdo: </label>
                        <input name="bracoEsquerdo"  required type="text" class="form-control" id="bracoesquerdo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Braço Direito: </label>
                        <input name="bracoDireito"  required type="text" class="form-control" id="bracodireito">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Coxa Esquerdo: </label>
                        <input name="coxaEsquerda"  required type="text" class="form-control" id="coxaesquerdo" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Coxa Direito: </label>
                        <input name="coxaDireita"  required type="text" class="form-control" id="coxadireita">
                    </div>
                </div>

            </div>
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Panturrilha Esquerdo: </label>
                        <input name="panturrilhaEsquerda"  required type="text" class="form-control" id="panturrilhaesquerda" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Panturrilha Direito: </label>
                        <input name="pantirrilhaDireita"  required type="text" class="form-control" id="panturrilhadireita">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
            </div>
            <div class="form-group col-md-4">
                <button type="submit"  style="background-color: #FF7F50;" class="btn btn-dark btn-lg btn-block"  >Cadastrar</button>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#altura").mask("0.00");
        $("#peso").mask("000.00");
        $("#torax").mask("000.00");
        $("#cintura").mask("000.00");
        $("#quadril").mask("000.00");
        $("#abdomen").mask("000.00");
        $("#antebracodireito").mask("00.00");
        $("#antebracoesquerdo").mask("00.00");
        $("#bracoesquerdo").mask("00.00");
        $("#bracodireito").mask("00.00");
        $("#coxadireita").mask("00.00");
        $("#coxaesquerdo").mask("00.00");
        $("#panturrilhadireita").mask("00.00");
        $("#panturrilhaesquerda").mask("00.00");
    </script>
</form>



<?php include('../view/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



