<?php

require_once('classes/usuario.php');

$email = $_POST["email"];
$senha = $_POST["senha"];

$user = new Usuario();
$valid_user = $user->autenticar_usuario($email,$senha);

if($valid_user) {
    header('location:index.php?login=1');
}else {
    header('location:login.php?erro=171');
}



?>