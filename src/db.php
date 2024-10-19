<?php
$hostname = "127.0.0.1";
$bancodados = "app";
$usuario = "admin";
$senha = "1234";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodados);

if ($mysqli->connect_errno){
    echo $mysqli->connect_errno;
}