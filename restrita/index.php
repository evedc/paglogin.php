<?php
require_once('../class/config.php');
require_once('../autoload.php');

$login = new Login();
$login->isAuth($_SESSION['token']);

echo "<h1>Bem vindo $login->nome!<br>Email: $login->email";
