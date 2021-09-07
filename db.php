<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "somente-treino";

$dbconnection = mysqli_connect($server, $user, $pass, $db);

if (!$dbconnection) {
    print "Problemas ao conectar com o Banco";
    exit();
}

?>