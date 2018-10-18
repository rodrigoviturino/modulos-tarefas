<?php

ini_set('display_errors', 1);

error_reporting(E_ALL);

$from = "viturino_souza@outlook.com";

$to = "suporte@cavernadoti.com";

$subject = "Verificando o correio do PHP";

$message = "O correio do PHP funciona bem";

$headers = "De: Fulano ". $from;

mail($to, $subject, $message, $headers);

echo "A mensagem de e-mail foi enviada.";

?>