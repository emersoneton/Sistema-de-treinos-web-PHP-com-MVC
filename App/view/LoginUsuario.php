<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="../Controller/ControllerLoginUsuario.php" method="POST" >
					<span class="login100-form-title p-b-43">
						<h3> <b> <u>Acesso Aluno</u> </b> </h3>
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="usuario">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>

					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="senha" id="senha">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Senha</span>
                    </div>

                    <br>



					<div class="container-login100-form-btn">

                        <input class="btn btn-dark btn-lg btn-block"  style="background-color: #FF7F50;" type=submit value="Login">

					</div>

                    <br>

                   <div class="container-login100-form-btn">
                        <a href="CadastraUsuario.php" class="btn btn-dark btn-lg btn-block" style="background-color: #FF7F50;" type=submit>CADASTRE-SE</a>
                       </div>

                    <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
                            <?php
                            if(isset($_SESSION['mensagem']))
                            {
                                echo "<a href=\"RecuperaSenhaAluno.php\" type=submit> <b> <u>Esqueceu sua Senha?</u> </b> </a>";
                                echo "<br>";
                            }
                            ?>

                        </span>
                    </div>
                    <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
                            <h3><?php
                                if(isset($_SESSION['mensagem']))
                                {
                                    echo $_SESSION['mensagem'];
                                    unset($_SESSION['mensagem']);
                                }
                                ?></h3>
						</span>
                    </div>



					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../../images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/bootstrap/js/popper.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/daterangepicker/moment.min.js"></script>
	<script src="../../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../js/main.js"></script>

</body>
</html>