<?php
require_once('database.php');

class Usuario
{
    private $email;
    private $senha;
    private $status;
    private $log;

    public function setEmail($email){
        $this->email;
    }
    public function setSenha($senha){
        $this->senha;
    }
    public function setStatus($status){
        $this->status;
    }
    public function setLog($log){
        $this->log;
    }

    public function cadastrar_usuario($email = "", $senha = "", $status = "", $log=""){
        $retorno = false;
        if($email == "" || $senha  == ""){
            return false;
        }
 
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setStatus($status);
        $this->setLog($log);
        $database = new Database();
        $criptografia = md5($senha);      
        $sql = "INSERT INTO `usuario` (`id`, `email`, `senha`, `status`, `log`)
         VALUES (NULL,'".$email."','".$criptografia."',0,'".$email."')";
        $result = $database->executar($sql);
        
        if($result === TRUE){
            $retorno = true;
        }
        return  $retorno;
   
    }
    public function autenticar_usuario($email = "", $pass = ""){
        $boolean = false;

        if($email == "" || $pass == "") {
            return false;
        }

        $database = new Database();
        $pass = md5($pass);

        $this->setEmail($email);
        
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$pass'";
        
        $query = $database->executar($sql);
        
        if($query->num_rows > 0) {
            $boolean = true;
        }
        return $boolean;
    }

}
