<?php

require_once("classes/usuario.php");


$id = $_GET['id'];
$email = $_POST['email'];

$recuperarSenha = new Usuario();

$recuperarSenha->setId;
$recuperarSenha->setEmail($email);

header('location:recuperar_senha.php');