<?php
require_once '../Controller/Session.php';
require_once '../Controller/Seguranca.php';
require_once '../Controller/ControllerPerfil.php';
require_once '../Controller/ControllerAvaliacao.php';
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
if(isset($_GET['id'])){
    $id_avaliacao=$_GET['id'];
    $resultado=buscaAvaliacao($id_avaliacao);

}
?>
<form name="form1" action="../Controller/ControllerAvaliacao.php?acao=atualizar&id=<?=$resultado[0]?>" method="post">
    <div align="center">
        <br><br>
        <h2> Visualização da  Avaliação </h2>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputEmail4">Historico clinico </label>
                <fieldset disabled>
                <textarea name="historicoClinico"   required   class="form-control"  ><?=$resultado[1]?></textarea>
                    </fieldset>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Peso: </label>
                <fieldset disabled>
                <input name="peso" type="text" value="<?=$resultado[2]?>" required class="form-control" id="peso" >
                </fieldset>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Altura: </label>
                <fieldset disabled>
                <input name="altura"  required type="text"   value="<?=$resultado[3]?>" class="form-control"  id="altura">
                </fieldset>
            </div>

            <div class="form-group col-md-4">
                <label for="inputEmail4">Imc : </label>
                <fieldset disabled>
                    <input name="imc"   value="<?=$resultado[4]?>" class="form-control">
                </fieldset>
            </div>

            <div class="form-group col-md-12">
                <h4 class="text-center"> Perimentros</h4>

            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="inputPassword4">Torax : </label>
                <fieldset disabled>
                <input name="torax"  required type="text"  value="<?=$resultado[5]?>" class="form-control"  id="torax">
                </fieldset>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Cintura: </label>
                <fieldset disabled>
                <input name="cintura"  required type="text" value="<?=$resultado[6]?>"class="form-control" id="cintura" >
                </fieldset>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Abdomen: </label>
                <fieldset disabled>
                <input name="abdomen"  required type="text" value="<?=$resultado[7]?>"class="form-control" id="abdomen" >
                </fieldset>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Quadril: </label>
                <fieldset disabled>
                <input name="quadril"  required type="text" value="<?=$resultado[8]?>"class="form-control"  id="quadril">
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Antebraço Esquerdo: </label>
                        <fieldset disabled>
                        <input name="antebracoEsquerdo"  required type="text" value="<?=$resultado[9]?>"class="form-control" id="antebracoesquerdo">
                        </fieldset>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Antebraço Direito: </label>
                        <fieldset disabled>
                        <input name="antebracoDireito"  required type="text"value="<?=$resultado[10]?>" class="form-control" id="antebracodireito">
                        </fieldset>
                    </div>

                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Braço Esquerdo: </label>
                        <fieldset disabled>
                        <input name="bracoEsquerdo"  required type="text" value="<?=$resultado[11]?>"class="form-control" id="bracoesquerdo">
                        </fieldset>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Braço Direito: </label>
                        <fieldset disabled>
                        <input name="bracoDireito"  required type="text"  value="<?=$resultado[12]?>"class="form-control" id="bracodireito">
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Coxa Esquerdo: </label>
                        <fieldset disabled>
                        <input name="coxaEsquerda"  required type="text"  value="<?=$resultado[13]?>"class="form-control" id="coxaesquerdo" >
                            </fieldset>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Coxa Direito: </label>
                        <fieldset disabled>
                        <input name="coxaDireita"  required type="text"value="<?=$resultado[14]?>" class="form-control"  id="coxadireita">
                            </fieldset >
                    </div>
                </div>

            </div>
            <div class="form-group col-md-6">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Panturrilha Esquerdo: </label>
                        <fieldset disabled>
                        <input name="panturrilhaEsquerda"  required type="text"  value="<?=$resultado[15]?>"class="form-control" id="panturrilhaesquerda" >
                        </fieldset>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Panturrilha Direito: </label>
                        <fieldset disabled>
                        <input name="pantirrilhaDireita"  required type="text" value="<?=$resultado[16]?>"class="form-control" id="panturrilhadireita">
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#altura").mask("0.00");
        $("#peso").mask("00.00");
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




