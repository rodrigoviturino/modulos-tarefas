<?php
require_once('classes/database.php');

class Usuario
{
    private $email;
    private $senha;
    private $status;
    private $log;

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($password) {
        $this->senha = $password;
    }

    public function autenticar_usuario($email = "", $pass = ""){
        $boolean = false;

        if($email == "" || $pass == "") {
            return false;
        }

        $database = new Database();
        $connection = $database->conectar();

        $pass = $connection->real_escape_string($pass);

        /*
        Encriptografando a senha 
        $pass = password_hash('$email',PASSWORD_DEFAULT);
        */

        $this->setEmail($email);
        $this->setSenha($pass);   
        
        $sql = "SELECT * FROM usuario WHERE email = '$this->email' AND senha = '$this->senha'";
        $query = $connection->query($sql);

        if($query->num_rows > 0) {
            $boolean = true;
        }

        return $boolean;

    }
}
