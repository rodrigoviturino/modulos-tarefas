<?php 
require_once('header.php');
require_once('classes/usuario.php');
$email = $_POST["email"];
$senha = $_POST["senha"];
$status= $_POST["status"];
$log = $_POST["log"];
$confirmar_senha = $_POST["confirmar_senha"];
if($email!=''&& $senha != '') {
    if($senha == $confirmar_senha){
        $user = new Usuario();
        $cadastro_valido = $user->cadastrar_usuario($email, $senha, $status, $log);
        if($cadastro_valido){
            echo "<script>alert('Deu Bom');</script>";
            header('Location:index.php');
        }else{
                echo "<script>alert('algo deu errado');</script>";
        }
    
    }else{
        echo "<script>alert('senhas diferentes');</script>";
    }
}


?>
<div class="jumbotron">
<div class="container">
<form method="post" class="" action="cadastro.php " >
    <div class="form-group"> 
    <label>E-mail</label><br/>
    <input class="form-control" type="text" name="email"/><br/>
    <label>Senha</label><br/>
    <input type="password" class="form-control" name="senha"/><br/>
    <label>Confirmar Senha</label><br/>
    <input type="password" class="form-control" name="confirmar_senha"/><br/>
    <input  type="submit" class="form-control" name="enviar" value="Cadastrar"/><br/>
    </div> 
</form>
</div>
</div> 
        