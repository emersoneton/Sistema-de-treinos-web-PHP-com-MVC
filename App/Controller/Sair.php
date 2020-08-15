<?php
session_start();
session_destroy();
header("Location:http://localhost/Projeto_Academia/index.php");
