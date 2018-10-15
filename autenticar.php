<?php
require_once("classes/usuario.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $status= $_POST["status"];
    $log = $_POST["log"];
    $confirmar_senha = $_POST["confirmar_senha"];

if($senha == $confirmar_senha){

    $user = new Usuario();
    $cadastro_valido = $user->cadastrar_usuario($email, $senha, $status, $log); 

        if($cadastro_valido){
            echo"<script>   
            alert('Usuário cadastrado com sucesso!');
            window.location.href='header.php';
            </script>";
           
        }else{
            echo"<script>   
            alert('Erro ao cadastrar!');
            window.location.href='header.php';
            </script>";
            
        }

}else{

    echo"<script>   
            alert('Senhas diferentes!');
            window.location.href='header.php';
            </script>";
   
}





?>