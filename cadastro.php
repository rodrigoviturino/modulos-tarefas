<?php 
require_once('header.php');
?>


<form method="post" action="autenticar.php " >
    <label>E-mail</label><br/>
    <input type="text" name="email"/><br/>
    <label>Senha</label><br/>
    <input type="password" name="senha"/><br/>
    <label>Confirmar Senha</label><br/>
    <input type="password" name="confirmar_senha"/><br/>
    <input  type="submit" name="enviar" value="Cadastrar"/><br/>
</form> 
