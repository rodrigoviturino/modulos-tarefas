<?php
require_once('classes/database.php');

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

    public function cadastrar_usuario ($email = "", $senha = "", $status = "", $log=""){
        $retorno = false;
        if($email == "" || $senha  == ""){
            return false;
        }
 
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setStatus($status);
        $this->setLog($log);
        $database = new Database();
        $conn = $database->conectar();  
        $criptografia = md5($senha);      
        $sql = "INSERT INTO `usuario` (`id`, `email`, `senha`, `status`, `log`) VALUES (NULL,'".$email."','".$criptografia."',0,'".$email."')";
        $result = $conn->query($sql);
        $conn->close();
        if($result === TRUE){
            $retorno = true;
        }
        return  $retorno;
    
    }
}
